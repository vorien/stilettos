<style>
	body{
		overflow-y: scroll;
	}
	#selections{
		margin-bottom: 1rem;
	}
	#select_power, #select_target, #save_settings{
		display: none;
	}
	#select_locklevel{
		margin: 1rem 0;
	}
	input[type='checkbox']{
		width: 1rem;
		margin-left: 1rem;
		float: left;
	}
	input[type='text']{
		/*		width: 5rem;
				float: left;*/
		font-size: 1rem;
		line-height: 1.5rem;
		padding: 0px;
		margin: 0px;
		height: 1.5rem;
	}
	select{
		font-size: 1rem;
		/*height: 2rem;*/
		line-height: 1.2rem;
	}
	.wrapper{
		/*width: 100%;*/
		border: 1px solid black;
		padding: 15px 0;
	}
	h3{
		text-align: center;
	}
	div#accordion.panel-group{
		margin-bottom: 0px;
	}
	div.panel-heading{
		line-height: 2.5em;
		text-align: center;
		font-size: 1.5em;
		font-weight: bold;
		/*text-indent: 2em;*/
		padding: 0px;
		margin: 0px;
	}
	.panel.panel-default{
		padding: 0px;
	}
	.row-calc{
		padding-bottom: 3px;
	}
	.required{
		background-color: lightsalmon;
	}
	.anyrequiresall{
		background-color:#f5e79e;
	}
</style>


<div id="select_locklevel" class="row">
	<div class="col-xs-2">Lock Level</div>
	<div class="col-xs-1"><input id='locklevel' type='text' value='1'></div>
</div>
<div id="selections" class="row">
	<div class="col-xs-3">
		<select id="select_maneuver"></select>
	</div>
	<div class="col-xs-2">
		<select id="select_power"></select>
	</div>
	<div class="col-xs-3">
		<select id="select_target"></select>
	</div>
	<div class="col-xs-2">
		<div id="display_cost"></div>
	</div>
	<div class="col-xs-2">
		<div id="save_settings" class="button">Save Settings</div>
	</div>
</div>
<div id="options_modifiers" class="row">
	<div id="options" class="col-xs-6"></div>
	<div id="modifiers" class="col-xs-6"></div>
</div>
<div class="row">
	<div id="testjson" class="col-xs-12"></div>
</div>

<script>
	var locklevel = 1;
	$(function () {

		showManeuvers();

		$("#select_maneuver").change(function () {
			clearSelectPower();
			var maneuver_id = $(this).val();
			showPowers(maneuver_id);
		});
		$("#select_power").change(function () {
			clearSelectTarget();
			var id = $(this).val();
			showTargets(id, function () {});
		});
		$("#select_target").change(function () {
			clearSelectOptions();
			var id = $(this).val();
			showOptions(id, false, function () {
				showOptions(id, true, function () {
					reCalc();
				});
			});
//			showOptions(id, function () {});
//			showOptions(1, function () {});
		});
		$("#locklevel").change(function () {
			locklevel = parseInt($(this).val());
			reCalc();
		});
		$("body").delegate(".calc", "change", function () {
			reCalc();
		});

		$("#save_settings").click(function () {
			clearTestJSON();
			console.log("target id: ", $("#select_target").val(16));
			var SaveArray = JSON.stringify(getSaveSettings());
			//console.log(SaveArray);
			$.ajax({
				type: 'POST',
				url: '/stilettos/saveSettings',
				data: {'saved_settings': SaveArray},
				success: function (msg) {
					$("#testjson").html(msg);
				},
				fail: function (msg) {
					$("#testjson").html("Failed: <br>" + msg);
				}
			});
			$("#testjson").show();
		});

		function showManeuvers() {
			var json_url = "/stilettos/getManeuvers";
			$.getJSON(json_url, function (mnvs) {
				if (mnvs.length == 0) {
					// Something's not right
					console.log(json_url + "returned nothing or an empty array");
				} else {
					$("#select_maneuver").append("<option disabled selected value='0'>Select a Maneuver</option>");
					for (var i = 0, tot = mnvs.length; i < tot; i++) {
						$("#select_maneuver").append("<option name='" + mnvs[i].name + "' value='" + mnvs[i].id + "'>" + mnvs[i].name + "</option>");
					}
				}
				$("#select_maneuver").show();
			});
		}

		function showPowers(maneuver_id) {
			var json_url = "/stilettos/getPowers/" + maneuver_id;
			$.getJSON(json_url, function (pwrs) {
				switch (pwrs.length) {
					case 0:
						// Something's not right
						console.log(json_url + "returned nothing or an empty array");
						break;
					case 1:
						showTargets(pwrs[0].id, function () {});
						break;
					default:
						// More than one power for the maneuver, show selection
						$("#select_power").append("<option disabled selected value='0'>Select a Power</option>");
						for (var i = 0, tot = pwrs.length; i < tot; i++) {
							$("#select_power").append("<option name='" + pwrs[i].name + "' value='" + pwrs[i].id + "'>" + pwrs[i].name + "</option>");
						}
						$('#select_power').show();
						break;
				}
			});
		}

		function showTargets(power_id) {
			var json_url = "/stilettos/getTargets/" + power_id;
			$.getJSON(json_url, function (tgts) {
				switch (tgts.length) {
					case 0:
						// Something's not right
						console.log(json_url + "returned nothing or an empty array");
						break;
					case 1:
						// Only one power for that maneuver, jump to modifier display
						showOptions(tgts[0].id, false, function () {
							showOptions(tgts[0].id, true, function () {
								reCalc();
							});
						});
						break;
					default:
						// More than one power for the maneuver, show selection
						$("#select_target").append("<option disabled selected value='0'>Select a Target</option>");
						for (var i = 0, tot = tgts.length; i < tot; i++) {
							$("#select_target").append("<option name='" + tgts[i].name + "' value='" + tgts[i].id + "'>" + tgts[i].name + "</option>");
						}
						$('#select_target').show();
						break;
				}
			});
		}

		function showOptions(target_id, is_all, callback) {
			var json_url = "/stilettos/getOptions/" + target_id + "/" + (is_all ? 1 : 0);
			var mstring = "";
			var dstring = "";
			var cstring = "";
			var sstring = "";
			var accordiondiv = (is_all ? 1 : 0);
			var displaydiv = is_all ? "#modifiers" : "#options";
			$.getJSON(json_url, function (opts) {
				$.each(opts.section_types, function (sindex, svalue) {
					$.each(svalue.modifier_classes, function (cindex, cvalue) {
						$.each(cvalue.targets, function (tindex, tvalue) {
							$.each(tvalue.displays, function (dindex, dvalue) {
								$.each(dvalue.modifiers, function (mindex, mvalue) {
									mstring += getMString(mvalue, svalue.name, tindex, svalue.section_id);
								});
								dstring += getDString(dvalue, mstring);
								mstring = "";
							});
							cstring += getCString(cvalue, dstring, accordiondiv, svalue);
							dstring = "";
						});
					});
					sstring += getSString(svalue, cstring, accordiondiv);
					cstring = "";
					$(displaydiv).append(sstring);
					sstring = "";
				});
				if ($(displaydiv).html().length > 0) {
					$(displaydiv).show();
				}
			});
			callback();
		}


		function clearSelectManeuver() {
			clearSelectPower();
			$('#select_maneuver').hide().html("");
		}
		function clearSelectPower() {
			$('#select_power').hide().html("");
			clearSelectTarget();
		}
		function clearSelectTarget() {
			$('#select_target').hide().html("");
			clearSelectOptions();
		}
		function clearSelectOptions() {
			$('#save_settings').hide();
			$('#display_cost').hide().html("");
			$('#options').hide().html("");
			$('#modifiers').hide().html("");
			clearTestJSON();
		}
		function clearTestJSON() {
			$('#testjson').hide().html("");
		}

		function reCalc() {
			var vals = [];
			var lock_level_penalties = 0;
			setTimeout(function () {
				vals.adder = 0;
				vals.advantage = 0;
				vals.limitation = 0;
				vals.penalty = 0;
				vals.endurance_reduction = 0;
				$.each($('.calc'), function () {
					vals[$(this).data('class')] += getVal($(this));
					lock_level_penalties += getLockLevelPenalty($(this));
				});

				var costs = [];
				costs.base = vals.adder;
				costs.active = vals.adder * (1 + (vals.advantage + vals.endurance_reduction));
				costs.real = costs.active / (1 + vals.limitation);
				costs.endurance = (vals.adder * (1 + (vals.advantage)) / 10) * (1 - (vals.endurance_reduction * 2));
				costs.penalty = (-1 * Math.ceil(costs.active / 10)) + vals.penalty;

				var display_cost = "";
				display_cost += "<div class='costs' data-name='base' data-cost='" + Math.ceil(costs.base) + "'>Base Cost: " + Math.ceil(costs.base) + "</div>";
				display_cost += "<div class='costs' data-name='active' data-cost='" + Math.ceil(costs.active) + "'>Active Cost: " + Math.ceil(costs.active) + "</div>";
				display_cost += "<div class='costs' data-name='endurance' data-cost='" + Math.ceil(costs.endurance) + "'>Endurance Cost: " + Math.ceil(costs.endurance) + "</div>";
				display_cost += "<div class='costs' data-name='real' data-cost='" + Math.ceil(costs.real) + "'>Real Cost: " + Math.ceil(costs.real) + "</div>";
				display_cost += "<div class='costs' data-name='penalty' data-cost='" + costs.penalty + "'>Penalty to Roll: " + costs.penalty + "</div>";
//				display_cost += "<div>Lock Level Penalty: " + (-1 * lock_level_penalties) + "</div>";
				$("#display_cost").html(display_cost).show();
				$("#save_settings").show();
			}, 200);
		}
//

		function getVal(ths) {
			var retval = 0;
			switch (ths.data('type')) {
				case "select":
					if (ths.val()) {
						retval = parseFloat(ths.val());
					}
					break;
				case "input":
					if (parseFloat(ths.val())) {
						retval = parseFloat(ths.val()) * parseFloat(ths.data('value'));
					}
					break;
				case "checkbox":
					if (ths.is(":checked")) {
						retval = parseFloat(ths.val());
					}
					break;
				case "radio":
					break;
				case "multiplier":
					if (ths.is(":checked")) {
						var mval = 0;
						var parent = ths.closest(".wrapper");
						parent.find($(".calc:not([data-class='multiplier'])")).each(function () {
							if ($(this).data("type") != "multiplier") {
								mval += getVal($(this));
							}
						});
						retval = mval;
					}
					break;
				default:
					//An error has occured
					console.log("modifier type name: ~" + ths.data('type') + "~ id: ~" + ths.attr('id') + "~ does not exist.");
			}
			return retval;
		}

		function getLockLevelPenalty(ths) {
			var calc_values = [];
			calc_values.power_requirement = 0;
			calc_values.requirement = 0;
			calc_values.modifier = 0;
			calc_values.locklevel = locklevel;
			switch (ths.data('type')) {
				case "select":
					if (ths.val()) {
						calc_values.power_requirement = ths.find(":selected").data("power_requirement");
						calc_values.requirement = ths.find(":selected").data("requirement");
						calc_values.modifier = ths.find(":selected").data("modifier");
					}
					break;
				case "input":
					if (parseFloat(ths.val())) {
						calc_values.power_requirement = ths.data("power_requirement");
						calc_values.requirement = ths.data("requirement");
						calc_values.modifier = ths.data("modifier");
					}
					break;
				case "checkbox":
				case "multiplier":
					if (ths.is(":checked")) {
						calc_values.power_requirement = ths.data("power_requirement");
						calc_values.modifier = ths.data("modifier");
						if (!ths.data("is_default")) {
							calc_values.requirement = ths.data("requirement");
						}
					} else {
						if (ths.data("is_default")) {
							calc_values.power_requirement = ths.data("power_requirement");
							calc_values.requirement = ths.data("requirement");
							calc_values.modifier = ths.data("modifier");
						}
					}
					break;
				case "radio":
					break;
				default:
					//An error has occured
					console.log("modifier type name: ~" + ths.data('type') + "~ id: ~" + ths.attr('id') + "~ does not exist.");
			}
			if (checkCalcValues(calc_values)) {
				var retval = (parseInt(calc_values.power_requirement) + parseInt(calc_values.requirement) - parseInt(locklevel)) * parseFloat(calc_values.modifier);
				return retval;
			} else {
				console.log("An error has occured in testing the values for calculation: ", ' - id: ', ths.attr('id'), ' - type', ths.data('type'));
				showCalcValues(calc_values);
				return false;
			}
		}

		function showCalcValues(calc_values) {
			$.each(calc_values, function (cname, cvalue) {
				if (!$.isNumeric(cvalue)) {
					console.log(cname, cvalue, 'parseFloat', parseFloat(cvalue), 'isNumeric', $.isNumeric(cvalue));
					return false;
				}
			});
		}

		function checkCalcValues(calc_values) {
			$.each(calc_values, function (cname, cvalue) {
				if (!$.isNumeric(cvalue)) {
					console.log('non-numeric value', cname, cvalue, 'parseFloat', parseFloat(cvalue), 'isNumeric', $.isNumeric(cvalue));
					return false;
				}
			});
			return true;
		}


		function getMString(mvalue, sid_name, tid, sid) {
			var mstring = "";
			var mclass = mvalue.class.name;
			var mtype = mvalue.type.name;
			var mid = mvalue.id;
			var mname = mvalue.name;
			mstring += "<div class='row row-calc calc-" + mtype + "' >";
			switch (mtype) {
				case "checkbox":
				case "multiplier":
					$.each(mvalue.values, function (vindex, vvalue) {
						var checked = (sid_name == "Required" || sid_name == "Included" || vvalue.is_default == 1);
						mstring += "<div class='col-xs-2'>";
						mstring += "<input type='checkbox' id='saveref_" + sid + "_" + tid + "_" + mid + "_" + vindex + "' ";
						mstring += (checked ? " checked" : "");
						mstring += " class='calc' value='" + vvalue.value + "'";
						mstring += " data-type='" + mtype + "'";
						mstring += " data-class='" + mclass + "'";
						mstring += " data-value='" + vvalue.value + "'";
						mstring += " data-requirement='" + vvalue.lock_level_requirement + "' ";
						mstring += " data-power_requirement='" + mvalue.power.lock_level_requirement + "' ";
						mstring += " data-modifier='" + mvalue.lock_level_modifier + "' ";
						mstring += " data-is_default='" + (checked ? 1 : 0) + "' ";
						mstring += ">";
						mstring += "</div>";
						mstring += "<div class='col-xs-10'>";
						mstring += mname;
						mstring += "</div>";
					});
					break;
				case "input":
					$.each(mvalue.values, function (vindex, vvalue) {
						mstring += "<div class='col-xs-2'>";
						mstring += "<input type='text' id='saveref_" + sid + "_" + tid + "_" + mid + "_" + vindex + "' class='calc' maxlength='2' value='" + mvalue.default_input_value + "'";
						mstring += "data-type='" + mtype + "'";
						mstring += " data-class='" + mclass + "'";
						mstring += " data-value='" + vvalue.value + "' ";
						mstring += " data-requirement='" + vvalue.lock_level_requirement + "' ";
						mstring += " data-power_requirement='" + mvalue.power.lock_level_requirement + "' ";
						mstring += " data-modifier='" + mvalue.lock_level_modifier + "' ";
						mstring += " data-is_default='" + vvalue.is_default + "' ";
						mstring += ">";
						mstring += "</div>";
						mstring += "<div class='col-xs-10'>";
						mstring += mname;
						mstring += "</div>";
					});
					break;
				case "select":
					mstring += "<div class='col-xs-12'>";
					mstring += "<select id='saveref_" + sid + "_" + tid + "_" + mid + "' class='calc'";
					mstring += " data-type='" + mtype + "' ";
					mstring += "data-class='" + mclass + "'";
					mstring += ">";
					var sortable = [];
					$.each(mvalue.values, function (vindex, vvalue) {
						sortable.push([vvalue.sort_order, vvalue.id, vvalue.name, vvalue.is_default, vvalue.lock_level_requirement, vvalue.value]);
					});
					sortable.sort(function (a, b) {
						return a[0] > b[0] ? 1 : (a[0] === b[0] ? 0 : -1);
					});
					$.each(sortable, function (sortindex, sortvalue) {
						mstring += "<option id='saveref_" + sid + "_" + tid + "_" + mid + "_" + sortvalue[1] + "'" + (sortvalue[3] ? " selected" : "") + " value='" + sortvalue[5] + "'";
						mstring += " data-value='" + sortvalue[5] + "' ";
						mstring += " data-requirement='" + sortvalue[4] + "' ";
						mstring += " data-power_requirement='" + mvalue.power.lock_level_requirement + "' ";
						mstring += " data-modifier='" + mvalue.lock_level_modifier + "' ";
						mstring += " data-is_default='" + sortvalue[3] + "' ";
						mstring += ">";
						mstring += sortvalue[2];
						mstring += "</option>";
					});
					mstring += "</select>";
					mstring += "</div>";
					break;
				case "radio":
					break;
				default:
					//An error has occured
					console.log("modifier type name: ~" + mtype + "~ id: ~" + mvalue.type.id + "~ does not exist.");
			}
			mstring += "</div>";
			return(mstring);
		}

		function getDString(dvalue, mstring) {
			var dstring = "";
			if (mstring.length > 0) {
				dstring += "<div class='row wrapper'>";
				dstring += "  <div class='col-xs-4'>";
				dstring += "    <b>" + dvalue.name + "</b>";
				dstring += "  </div>";
				dstring += "  <div class='col-xs-8'>";
				dstring += mstring;
				dstring += "  </div>";
				dstring += "</div>";
			}
			return dstring;
		}

		function getCString(cvalue, dstring, target_id, svalue) {
			var cstring = "";
			if (dstring.length > 0) {
//							cstring += "    <div class='panel-group' id='accordion_" + target_id + "_" + svalue.id + "_" + cvalue.id + "'>";
//							cstring += "        <div class='panel panel-default'>";
//							cstring += "            <div class='panel-heading'>";
//							cstring += "                <div data-toggle='collapse' data-parent='#accordion_" + target_id + "_" + svalue.id + "_" + cvalue.id + "' href='#collapse_" + target_id + "_" + svalue.id + "_" + cvalue.id + "' class='panel-title'>";
//							cstring += "                    <span class='modifier-class-label'>" + cvalue.display_name + "</span>";
//							cstring += "                </div>";
//							cstring += "            </div>";
//							cstring += "            <div id='collapse_" + target_id + "_" + svalue.id + "_" + cvalue.id + "' class='panel-collapse collapse'>";
//							cstring += "                <div class='panel-body'>";
				cstring += dstring;
//							cstring += "                </div>";
//							cstring += "            </div>";
//							cstring += "        </div>";
//							cstring += "    </div>";
			}
			return cstring;
		}

		function getSString(svalue, cstring, target_id) {
			var sstring = "";
			if (cstring.length > 0) {
				sstring += "    <div class='panel-group' id='accordion_" + target_id + "_" + svalue.id + "'>";
				sstring += "        <div class='panel panel-default'>";
				sstring += "            <div class='panel-heading'>";
				sstring += "                <div data-toggle='collapse' data-parent='#accordion_" + target_id + "_" + svalue.id + "' href='#collapse_" + target_id + "_" + svalue.id + "' class='panel-title'>";
				sstring += "                    <span class='modifier-class-label'>" + svalue.display_name + "</span>";
				sstring += "                </div>";
				sstring += "            </div>";
				sstring += "            <div id='collapse_" + target_id + "_" + svalue.id + "' class='panel-collapse collapse'>";
				sstring += "                <div class='panel-body'>";
				sstring += cstring;
				sstring += "                </div>";
				sstring += "            </div>";
				sstring += "        </div>";
				sstring += "    </div>";
			}
			return sstring;
		}

		function spReplace(str) {
			return str.replace(' ', '_');
		}

		function getSaveSettings() {
			var saved_settings = $('.costs').map(function (index) {
				var element = {};
				element[$(this).data("name") + "_cost"] = $(this).data("cost");
				return element;
			}).get();
			var result = {};
			Object.keys(saved_settings).forEach(function (key) {
				Object.keys(saved_settings[key]).forEach(function (skey) {
					result[skey] = saved_settings[key][skey];
				});
			});

			var saved_values = $('.calc').map(function (index) {
				var element = {};
				var id;
				id = $(this).attr("id");
				switch ($(this).data('type')) {
					case "select":
						id = $(this).find(":selected").attr("id");
						break;
					case "input":
						element.value = $(this).val();
						break;
					case "checkbox":
					case "multiplier":
						if ($(this).is(":checked")) {
							element.value = 1;
						} else {
							element.value = 0;
						}
						break;
					case "radio":
						break;
					default:
						//An error has occured
						console.log("modifier type name: ~" + $(this).data('type') + "~ id: ~" + $(this).attr('id') + "~ does not exist.");
				}
				var idbreakdown = id.split("_");
				element.section_id = parseInt(idbreakdown[1]);
				element.target_id = parseInt(idbreakdown[2]);
				element.modifier_id = parseInt(idbreakdown[3]);
				element.modifier_value_id = parseInt(idbreakdown[4]);
				return element;
			}).get();

			result['saved_values'] = saved_values;

			return result;
		}

	});


</script>
