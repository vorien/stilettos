
<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * CakePHP MapController
 * @author Michael
 */
//To Do:
//	Add routes
//	Add coordinates for cities and waypoints
//	Add map (with zoom)


class MapController extends AppController {

	public $images_base = "/img/supplyanddemand/";
	public $images_region = "/img/supplyanddemand/backgrounds/";
	public $images_city = "/img/supplyanddemand/cities/";
	public $images_item = "/img/supplyanddemand/items/";
	public $images_route = "/img/supplyanddemand/routes/";

	public function displaysd() {
		
	}

	public function displayroute() {
		
	}

	public function inventories($location_id = null) {
		$this->autoRender = false;
		$this->loadComponent('ItemArray');
		if (empty($location_id)) {
			echo json_encode([]);
			die();
		}
		$data = TableRegistry::get('LocationInventories');
		$query = $data->find();
		$query->where(['LocationInventories.location_id' => $location_id]);
		$inventories = $this->ItemArray->getItemArray($query, 2);
		echo(json_encode($inventories, JSON_NUMERIC_CHECK));
	}

	public function distributions($location_id = null) {
		$this->autoRender = false;
		$this->loadComponent('ItemArray');
		if (empty($location_id)) {
			echo json_encode([]);
			die();
		}
		$data = TableRegistry::get('Distributions');
		$query = $data->find();
		$query->where(['Distributions.location_id' => $location_id]);
		$return = $this->ItemArray->getItemArray($query, 2);
		$distributions = [];
		foreach ($return as $array) {
			$distributions[$array['in_out']][] = $array;
		}
		echo(json_encode($distributions, JSON_NUMERIC_CHECK));
	}

	public function routeinventories($route_id = null) {
		$this->autoRender = false;
		$this->loadComponent('ItemArray');
		if (empty($route_id)) {
			echo json_encode([]);
			die();
		}
		$data = TableRegistry::get('RouteInventories');
		$query = $data->find();
		$query->where(['RouteInventories.route_id' => $route_id]);
		$routeinventories = $this->ItemArray->getItemArray($query, 2);
		echo(json_encode($routeinventories, JSON_NUMERIC_CHECK));
	}

	public function map($user_id = 1, $region_id = 1) {
		$data = TableRegistry::get('UserPreferences');
		$query = $data->find();
		$query->hydrate(false);
		$query->where(['UserPreferences.user_id' => $user_id]);

		$preferences = $query->first();

		$data = TableRegistry::get('Items');
		$query = $data->find();
		$query->hydrate(false);
		$query->select(['icon']);
		$query->where(['Items.user_id' => $user_id]);

		$userimages = $query->all();
		foreach ($userimages as $image) {
			$images[] = $this->images_item . $image['icon'] . ".png";
		}



		$data = TableRegistry::get('Regions');
		$query = $data->find();
		$query->hydrate(false);
		$query->where(['Regions.id' => $region_id, 'Regions.user_id' => $user_id]);
		$query->contain([
			"Locations",
			"Routes" => [
				"Steps" => [
					"conditions" => [
						"Steps.id" => "Routes.step"
					]
				],
				"Locations"
			]
		]);

		$regions = $query->all();


		foreach ($regions as $region) {
			$bg_file = $this->images_region . $region['image'];
			$bg_data = getimagesize(WWW_ROOT . $bg_file);
			$bg_width = $bg_data[0];
			$bg_height = $bg_data[1];
			$background = [
				'src' => $bg_file,
				'width' => $bg_width,
				'height' => $bg_height
			];

			foreach ($region['locations'] as $location) {
				$id = $location['id'];
				$name = $location['name'];
				$src = $this->images_city . $location['icon'];
				$srcid = $name;
				$size = $location['icon_display_size'];
				$iconclass = 'locationicon';
				$divclass = 'locationdiv';
				$left = $bg_width * $location['pct_we'];
				$top = $bg_height * $location['pct_ns'];
				$locations[] = compact('id', 'name', 'src', 'srcid', 'size', 'iconclass', 'divclass', 'left', 'top');
			}
			foreach ($region['routes'] as $route) {
				$id = $route['id'];
				$name = $route['name'];
				$src = $this->images_route . $route['icon'];
				$srcid = $name;
				$size = $route['icon_display_size'];
				$iconclass = 'routeicon';
				$divclass = 'routediv';
				if (!empty($route['location'])) {
					$pct_we = $route['location']["pct_we"];
					$pct_ns = $route['location']["pct_ns"];
				} else {
					$pct_we = $route['pct_we'];
					$pct_ns = $route['pct_ns'];
				}
				$left = $pct_we * $bg_width;
				$top = $pct_ns * $bg_height;
				$routes[] = compact('id', 'name', 'src', 'srcid', 'size', 'iconclass', 'divclass', 'left', 'top', 'location');
			}

			$region_json = json_encode($region, JSON_NUMERIC_CHECK);
			$background_json = json_encode($background, JSON_NUMERIC_CHECK);
			$locations_json = json_encode($locations, JSON_NUMERIC_CHECK);
			$routes_json = json_encode($routes, JSON_NUMERIC_CHECK);
			$images_json = json_encode($images, JSON_NUMERIC_CHECK);
		}
		$this->set(compact('background', 'region_json', 'background_json', 'locations_json', 'routes_json', 'preferences', 'images_json'));
//		$this->render('test');
	}

	public function index() {
		$data = TableRegistry::get('Locations');
		$query = $data->find();

		$query->hydrate(false);

		$query->contain([
			'Xrefs' => [
				'queryBuilder' => function ($q) {
					return $q->order(['Locations.location', 'Directions.direction' => 'DESC', 'Types.type', 'Items.item', 'Grades.grade']);
				},
						"Directions",
						"Items",
						"Items.Types",
						"Locations",
						"Grades"
					]
				]);


				$display = [];
				foreach ($query as $location) {
					foreach ($location['xrefs'] as $xref) {
						$lval = $xref['location']['location'];
						$display[$lval]['ldata'] = ['h' => $xref['location']['pct_from_left'], 'v' => $xref['location']['pct_from_top'], 's' => $xref['location']['size']];
						$dval = $xref['direction']['direction'];
						$tval = $xref['item']['type']['type'];
						$ival = $xref['item']['item'];
						$gval = $xref['grade']['grade'];
						$icon = $xref['item']['icon'] . "_" . $xref['direction']['icon'] . "_" . $xref['grade']['icon'];
						$display[$lval]['sd'][$dval][$tval][$ival][] = ['grade' => $gval, 'icon' => $icon];
					}
				}
				$this->set(compact('display'));
			}

			public function oldtest($user_id = 1, $region_id = 1) {
				$data = TableRegistry::get('Regions');
				$query = $data->find();
				$query->hydrate(false);
				$query->where(['Regions.id' => $region_id, 'Regions.user_id' => $user_id]);
				$query->contain([
					"Locations" => [
						"Warehouses" => [
							"WarehouseInventories" => [
								"Grades",
								"Items.Types",
								"Items"
							],
							"Distributions" => [
								"Grades",
								"Items.Types",
								"Items"
							]
						]
					]
				]);

				$regions = $query->all();
//		debug($regions);


				$data = TableRegistry::get('Regions');
				$query = $data->find();
				$query->hydrate(false);
				$query->where(['Regions.id' => $region_id, 'Regions.user_id' => $user_id]);
				$query->contain([
					"Routes" => [
						"Transports",
						"RouteInventories" => [
							"Grades",
							"Items.Types",
							"Items"
						],
						"Steps" => [
							"Transfers"
						]
					],
				]);

				$routes = $query->all();
				debug($routes);
			}

		}
		
		
		<script>
var locklevel = 1;
var grid = {};
var active_grid = [];
var active_power = "";
var powers = [];
var mods = {"power": [], "range": [], "connection": [], "destination": [], "bearer": [], "interference": [], "visibility": [], "source": [], "target": []};
grid["communication"] = {"power": ["mind link", "clairsentience"], "range": true, "connection": true, "destination": false, "bearer": true, "interference": true, "visibility": false, "source": false, "target": false};
grid["detection"] = {"power": "detect", "range": true, "connection": true, "destination": false, "bearer": true, "interference": true, "visibility": true, "source": false, "target": false};
grid["manipulation"] = {"power": "telekinesis", "range": true, "connection": true, "destination": false, "bearer": true, "interference": true, "visibility": true, "source": true, "target": true};
grid["relocation"] = {"power": "teleportation", "range": true, "connection": true, "destination": true, "bearer": true, "interference": true, "visibility": true, "source": false, "target": false};
grid["transportation"] = {"power": "teleportation", "range": true, "connection": true, "destination": true, "bearer": true, "interference": true, "visibility": true, "source": false, "target": false};
mods["power"]["detect"] = {
	"select": {
		"Action": {
			"Full Action": 2,
			"Half Action": 6,
			"Free Action": 8
		},
		"View": {
			"240 degrees": 4,
			"360 degrees": 6
		}
	},
	"checkbox": {
		"Options": {
			"Discriminatory": 5,
			"Targeting": 7
		}
	}
};
mods["power"]["telekinesis"] = {
	"select": {
		"Max OCV Levels": {
			"1 Level": 3,
			"2 Levels": 5,
			"3 Levels": 7,
			"4 Levels": 9
		},
		"Max Damage Levels": {
			"1 Level": 4,
			"2 Levels": 7,
			"3 Levels": 10
		},
		"Effective STR": {
			"8 STR (1d6 - 1 Damage)": 3,
			"12 STR (1d6 Damage)": 4,
			"13 STR ": 5,
			"16 STR (1d6 + 1 Damage)": 6,
			"17 STR ": 7,
			"21 STR ": 8,
			"23 STR (1 1/2 d6 Damage)": 9,
			"28 STR ": 10
		}
	}
};
mods["power"]["teleportation"] = {
	"select": {
		"Action": {
			"Full Action": 2,
			"Half Action": 5
		},
	}
};
mods["power"]["mind link"] = {
	"select": {
		"Action": {
			"Full Action": 2,
			"Half Action": 5
		},
	}
};
mods["power"]["clairsentience"] = {
	"select": {
		"Action": {
			"Full Action": 2,
			"Half Action": 5
		},
	}
};
mods["range"] = {
	"select": {
		"Area - Distance": {
			"Self / 0 km": 1,
			"Close / 1 km": 4,
			"City / 100 km": 7,
			"NSEW / 1000 km": 8,
			"Known World / 10000 km": 9,
			"Planet / 100000 km": 10
		}
	}
};
mods["connection"] = {
	"select": {
		"Connection": {
			"Touching Primary": 1,
			"Touching Secondary": 4,
			"Not Touching": 7
		}
	}
}
mods["destination"] = {
	"select": {
		"Destination": {
			"Home": 2,
			"Primary": 3,
			"Secondary": 5,
			"Other": 9
		}
	}
}
mods["concentration"] = {
	"select": {
		"Connection": {
			"Blackout": 1,
			"0 DCV": 3,
			"1/2 DCV": 4,
			"Full DCV": 5
		}
	}
}
mods["bearer"] = {
	"select": {
		"Bearer": {
			"Self": 1,
			"None": 4,
			"Assisting": 5,
			"Resisting": 5
		}
	}
}
mods["visibility"] = {
	"select": {
		"Visibility": {
			"Visible": 1,
			"Not Visible": 3
		}
	}
}
mods["source"] = {
	"select": {
		"Source": {
			"Self": 1,
			"Stiletto": 3
		}
	}
}
mods["target"] = {
	"select": {
		"Target": {
			"Self": 2,
			"Other": 6
		}
	}
}
mods["interference"] = {
	"checkbox": {
		"Interference": {
			"Held": 2,
			"Encryption": 3,
			"Limited Access": 4,
			"Static": 5,
			"Solid": 7,
			"Barrier": 9
		}
	}
}
</script>

<style>
	#select_grid, #select_powers{
		float: left;
	}
	#powers{
		display: none;
	}
	#area-distance, #connection, #destination, #bearer, #interference, #visibility, #source, #target, #power{
		display:none;
	}
	.mod{
		width: 200px;
		/*height: 50px;*/
		min-height: 100px;
		float: left;
		border: 1px solid black;
		display: none;
	}
	#locklevel{
		width: 5rem;
	}
	select{
		width: 180px;
		margin: 5px 10px;
	}
	h3{
		width: 100%;
		text-align:center;
	}
	#modifications{
		clear: both;
	}
</style>

		$("#locklevel").val(locklevel);

		$("#grid").change(function () {
			active_power = '';
			$("#powers").hide();
			$(".mod").hide();
			$(".mod").html("");
			var activetype = $("#grid option:selected").text().toLowerCase();
			active_grid = grid[activetype];
			if ($.isArray(active_grid['power'])) {
				showPowerSelect(active_grid['power']);
			} else {
				showMods();
			}
		});

		$("#powers").change(function () {
			console.log("powers change");
			console.log("active_power", active_power);
			$(".mod").hide();
			$(".mod").html("");
			active_power = $("#powers option:selected").text().toLowerCase();
			console.log("active_power", active_power);
			showMods();
		});

		$("#locklevel").change(function () {
			$(".mod").hide();
			$(".mod").html("");
			locklevel = $(this).val();
			showMods();
		});


	});

	function showPowerSelect(powers) {
		var powerstring = '';
//		powerstring += "<div id='select_powers'>";
//		powerstring += "<select id='powers' size=" + (Object.keys(powers).length + 1) + ">";
		powerstring += "<option disabled selected>Select a Power</option>";
		$.each(powers, function (index, value) {
			var optstring = "<option name='" + value + "' value='" + value + "'>" + ucwords(value) + "</option>";
			powerstring += optstring;
		});
//		powerstring += "</select>";
//		powerstring += "</div>";
//		console.log(powerstring);
		$('#powers').html(powerstring);
		$('#powers').attr('size', Object.keys(powers).length + 1);
		$('#powers').show();
	}

	function showMods() {
		console.log("active_power", active_power);
		$.each(active_grid, function (index, value) {
			if (value) {
				console.log("index", index);
				showOptions(index, function () {
					$("#" + index).show();
				});
			}
		});
	}

	function showOptions(option, callback) {
		console.log("active_power", active_power);

		var mod = null;
		if (option == "power") {
			if (active_power != '') {
				mod = mods['power'][active_power];
			} else {
				mod = mods['power'][active_grid['power']];
			}
		} else {
			mod = mods[option];
		}
		$.each(mod, function (index, value) {
//			console.log("mod->index", index, "mod->value", value);
			$.each(mod[index], function (mindex, mvalue) {
				var optstring = "";
//				console.log("mod[index]->mindex", mindex, "mod[index]->mvalue", mvalue);
				switch (index) {
					case "select":
						optstring += "<h3>" + mindex + "</h3><select id='options_" + mindex + "' size=" + (Object.keys(mvalue).length) + ">";
						var selectedindex = getClosestIndex(mvalue, locklevel);
						$.each(mvalue, function (oindex, ovalue) {
							if (ovalue >= selectedindex[1]) {
								optstring += "<option value='" + ovalue + "'" + (oindex == selectedindex[0] ? ' selected' : '') + ">" + oindex + "</option>";
							}
						});
						optstring += "</select>";
						$("#" + option).append(optstring);
						break;
					case "checkbox":
						optstring += "<h3>" + mindex + "</h3>";
						$.each(mvalue, function (oindex, ovalue) {
							optstring += "<input type='checkbox' id='options_" + oindex + "' value='" + ovalue + "'" + (ovalue <= locklevel ? ' checked' : '') + ">"
							optstring += "<b>" + oindex + ": </b>";
							optstring += "<br>";
						});
						$("#" + option).append(optstring);
						break;
					default:
						alert("invalid mod index: " + index);
						break
				}
			});
//			console.log(option, index);
		});

//		console.log(mod);

		callback();
	}


	function getClosestIndex(arr, val) {
		val = parseInt(val);
		var bestindex = '';
		var bestvalue = 0;
		$.each(arr, function (aindex, avalue) {
			if (avalue <= val && avalue > bestvalue) {
				bestindex = aindex;
				bestvalue = avalue;
			}
		});
//		console.log("returning", bestvalue, bestindex);
		return [bestindex, bestvalue];
	}

	function ucwords(str) {
		str = str.toLowerCase().replace(/\b[a-z]/g, function (letter) {
			return letter.toUpperCase();
		});
		return str;
	}
</script>
