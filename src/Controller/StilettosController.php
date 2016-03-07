<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Utility\Inflector;
use App\Model\Entity;

/**
 * Stilettos Controller
 *
 */
class StilettosController extends AppController {

	public function index() {
		
	}

	public function testSavedSettings($saved_setting_id = 1, $returnas = "echo") {

		$saved_settings = TableRegistry::get('SavedSettings');
		$query = $saved_settings->find();
		$query->hydrate(false);
		$query->where(['id' => $saved_setting_id]);
		$query->contain([
			'SavedValues' => [
				'Targets' => [
					'Powers' => [
						'Maneuvers'
					]
				],
				'Modifiers' => [
					'ModifierTypes',
					'ModifierClasses',
					'Displays'
				],
				'Sections',
				'ModifierValues'
			]
		]);


		$return = $query->all()->toArray();
		$this->removeByKey($return, ['created', 'modified']);

		switch ($returnas) {
			case "echo":
				debug($return);
				$this->render('empty');
				break;
			case "array":
				return($return);
				break;
			case "json":
				$this->autoRender = false;
				echo(json_encode($return, JSON_NUMERIC_CHECK));
				exit;
				break;
			default:
				debug($return);
				$this->render('empty');
				break;
		}

//					$settings = TableRegistry::get('SavedValues');
//		$query = $settings->find();
////		$query->select(['id', 'name']);
////		$query->order(['sort_order']);
//		$query->contain([
//			"Targets" => [
//				"Modifiers" => [
//					'sort' => ['sort_order' => 'ASC'],
//					"ModifierValues",
//					"ModifierClasses",
//					"ModifierTypes",
//					"Displays"
//				]
//			]
//		]);
//
//		$query->hydrate(false);
//
//		$power_options = $query->all()->toArray();
//		$this->removeByKey($power_options, ['created', 'modified']);
//					
//			$setting = $settings->newEntity($data, [
//				'associated' => ['SavedValues']
//				,
//				'[accessible]' => [
//					'*' => true
//				]
//			]);
//SELECT * FROM saved_values
//JOIN saved_settings ON saved_settings.id = saved_values.`saved_setting_id`
//JOIN targets ON targets.id = saved_settings.`target_id`
//JOIN all_records ON all_records.`ModifierValues__id` = saved_values.`modifier_value_id` AND all_records.`Targets__id` = targets.id		
	}

	public function saveSettings() {
		$this->autoRender = false;
		if (isset($_POST['saved_settings'])) {
			$json = $_POST['saved_settings'];
			$data = json_decode($json, true);
			$settings = TableRegistry::get('SavedSettings');
			$setting = $settings->newEntity($data, [
				'associated' => ['SavedValues'],
				'[accessible]' => ['*' => true]
			]);
			if ($settings->save($setting)) {
				echo("Success!");
			} else {
				echo("Save failed, contact your administrator.");
			}
//			debug($setting);
		} else {
			echo("No POST data, contact your administrator.");
		}
		$this->render('empty');
	}

	function testJsonDecode() {
//		$json = '[{"base":10},{"active":20},{"endurance_reduction":2},{"real":4},{"penalty":-3},{"saved_values":[{"0":{"id":"saveref_23_7","type":"input","class":"adder","value":"10"}},{"1":{"id":"saveref_9_20","type":"select","class":"penalty","value":"-1"}},{"2":{"id":"saveref_33_61","type":"select","class":"penalty","value":"0"}},{"3":{"id":"saveref_24_58","type":"input","class":"adder","value":"0"}},{"4":{"id":"saveref_25_63","type":"checkbox","class":"adder","value":0}},{"5":{"id":"saveref_26_73","type":"checkbox","class":"adder","value":0}},{"6":{"id":"saveref_1_5","type":"checkbox","class":"advantage","value":0}},{"7":{"id":"saveref_22_25","type":"select","class":"advantage","value":"0"}},{"8":{"id":"saveref_29_74","type":"checkbox","class":"advantage","value":0}},{"9":{"id":"saveref_28_62","type":"checkbox","class":"advantage","value":0}},{"10":{"id":"saveref_45_87","type":"input","class":"advantage","value":"0"}},{"11":{"id":"saveref_44_86","type":"checkbox","class":"advantage","value":0}},{"12":{"id":"saveref_30_68","type":"checkbox","class":"advantage","value":1}},{"13":{"id":"saveref_42_8","type":"checkbox","class":"advantage","value":1}},{"14":{"id":"saveref_41_2","type":"checkbox","class":"advantage","value":1}},{"15":{"id":"saveref_34_71","type":"checkbox","class":"limitation","value":1}},{"16":{"id":"saveref_37_83","type":"select","class":"penalty","value":"0"}},{"17":{"id":"saveref_31_114","type":"select","class":"endurance_reduction","value":"0"}},{"18":{"id":"saveref_6_11","type":"select","class":"limitation","value":"0.5"}},{"19":{"id":"saveref_17_37","type":"select","class":"limitation","value":"1.25"}},{"20":{"id":"saveref_18_53","type":"select","class":"limitation","value":"1"}},{"21":{"id":"saveref_35_72","type":"checkbox","class":"limitation","value":1}},{"22":{"id":"saveref_36_97","type":"select","class":"limitation","value":"0"}},{"23":{"id":"saveref_8_15","type":"select","class":"penalty","value":"0"}},{"24":{"id":"saveref_32_69","type":"checkbox","class":"limitation","value":1}}]}]';
		$json = '{"base":10},{"active":20},{"endurance_reduction":2},{"real":4},{"penalty":-3},"saved_values":[{"id":"saveref_23_7","type":"input","class":"adder","value":"10"}},{"1":{"id":"saveref_9_20","type":"select","class":"penalty","value":"-1"}},{"2":{"id":"saveref_33_61","type":"select","class":"penalty","value":"0"}},{"3":{"id":"saveref_24_58","type":"input","class":"adder","value":"0"}},{"4":{"id":"saveref_25_63","type":"checkbox","class":"adder","value":0}},{"5":{"id":"saveref_26_73","type":"checkbox","class":"adder","value":0}},{"6":{"id":"saveref_1_5","type":"checkbox","class":"advantage","value":0}},{"7":{"id":"saveref_22_25","type":"select","class":"advantage","value":"0"}},{"8":{"id":"saveref_29_74","type":"checkbox","class":"advantage","value":0}},{"9":{"id":"saveref_28_62","type":"checkbox","class":"advantage","value":0}},{"10":{"id":"saveref_45_87","type":"input","class":"advantage","value":"0"}},{"11":{"id":"saveref_44_86","type":"checkbox","class":"advantage","value":0}},{"12":{"id":"saveref_30_68","type":"checkbox","class":"advantage","value":1}},{"13":{"id":"saveref_42_8","type":"checkbox","class":"advantage","value":1}},{"14":{"id":"saveref_41_2","type":"checkbox","class":"advantage","value":1}},{"15":{"id":"saveref_34_71","type":"checkbox","class":"limitation","value":1}},{"16":{"id":"saveref_37_83","type":"select","class":"penalty","value":"0"}},{"17":{"id":"saveref_31_114","type":"select","class":"endurance_reduction","value":"0"}},{"18":{"id":"saveref_6_11","type":"select","class":"limitation","value":"0.5"}},{"19":{"id":"saveref_17_37","type":"select","class":"limitation","value":"1.25"}},{"20":{"id":"saveref_18_53","type":"select","class":"limitation","value":"1"}},{"21":{"id":"saveref_35_72","type":"checkbox","class":"limitation","value":1}},{"22":{"id":"saveref_36_97","type":"select","class":"limitation","value":"0"}},{"23":{"id":"saveref_8_15","type":"select","class":"penalty","value":"0"}},{"24":{"id":"saveref_32_69","type":"checkbox","class":"limitation","value":1}}]}]';
		$json = '[{"base":10},{"active":20},{"endurance_reduction":2},{"real":4},{"penalty":-3}]';
		$json = '{"base":10,"active":20,"endurance_reduction":2,"real":4,"penalty":-3,"saved_values":[{"id":"saveref_23_7","type":"input","class":"adder","value":"10"},{"id":"saveref_9_20","type":"select","class":"penalty","value":"-1"},{"id":"saveref_33_61","type":"select","class":"penalty","value":"0"},{"id":"saveref_24_58","type":"input","class":"adder","value":"0"},{"id":"saveref_25_63","type":"checkbox","class":"adder","value":0},{"id":"saveref_26_73","type":"checkbox","class":"adder","value":0},{"id":"saveref_1_5","type":"checkbox","class":"advantage","value":0},{"id":"saveref_22_25","type":"select","class":"advantage","value":"0"},{"id":"saveref_29_74","type":"checkbox","class":"advantage","value":0},{"id":"saveref_28_62","type":"checkbox","class":"advantage","value":0},{"id":"saveref_45_87","type":"input","class":"advantage","value":"0"},{"id":"saveref_44_86","type":"checkbox","class":"advantage","value":0},{"id":"saveref_30_68","type":"checkbox","class":"advantage","value":1},{"id":"saveref_42_8","type":"checkbox","class":"advantage","value":1},{"id":"saveref_41_2","type":"checkbox","class":"advantage","value":1},{"id":"saveref_34_71","type":"checkbox","class":"limitation","value":1},{"id":"saveref_37_83","type":"select","class":"penalty","value":"0"},{"id":"saveref_31_114","type":"select","class":"endurance_reduction","value":"0"},{"id":"saveref_6_11","type":"select","class":"limitation","value":"0.5"},{"id":"saveref_17_37","type":"select","class":"limitation","value":"1.25"},{"id":"saveref_18_53","type":"select","class":"limitation","value":"1"},{"id":"saveref_35_72","type":"checkbox","class":"limitation","value":1},{"id":"saveref_36_97","type":"select","class":"limitation","value":"0"},{"id":"saveref_8_15","type":"select","class":"penalty","value":"0"},{"id":"saveref_32_69","type":"checkbox","class":"limitation","value":1}]}';
		$json = '{"base":10,"active":20,"endurance_reduction":2,"real":4,"penalty":-3,"savedvalues":[{"type":"input","class":"adder","value":"10","modifier":"23","modifier_value":"7"},{"type":"select","class":"penalty","value":"-1","modifier":"9","modifier_value":"20"},{"type":"select","class":"penalty","value":"0","modifier":"33","modifier_value":"61"},{"type":"input","class":"adder","value":"0","modifier":"24","modifier_value":"58"},{"type":"checkbox","class":"adder","value":0,"modifier":"25","modifier_value":"63"},{"type":"checkbox","class":"adder","value":0,"modifier":"26","modifier_value":"73"},{"type":"checkbox","class":"advantage","value":0,"modifier":"1","modifier_value":"5"},{"type":"select","class":"advantage","value":"0","modifier":"22","modifier_value":"25"},{"type":"checkbox","class":"advantage","value":0,"modifier":"29","modifier_value":"74"},{"type":"checkbox","class":"advantage","value":0,"modifier":"28","modifier_value":"62"},{"type":"input","class":"advantage","value":"0","modifier":"45","modifier_value":"87"},{"type":"checkbox","class":"advantage","value":0,"modifier":"44","modifier_value":"86"},{"type":"checkbox","class":"advantage","value":1,"modifier":"30","modifier_value":"68"},{"type":"checkbox","class":"advantage","value":1,"modifier":"42","modifier_value":"8"},{"type":"checkbox","class":"advantage","value":1,"modifier":"41","modifier_value":"2"},{"type":"checkbox","class":"limitation","value":1,"modifier":"34","modifier_value":"71"},{"type":"select","class":"penalty","value":"0","modifier":"37","modifier_value":"83"},{"type":"select","class":"endurance_reduction","value":"0","modifier":"31","modifier_value":"114"},{"type":"select","class":"limitation","value":"0.5","modifier":"6","modifier_value":"11"},{"type":"select","class":"limitation","value":"1.25","modifier":"17","modifier_value":"37"},{"type":"select","class":"limitation","value":"1","modifier":"18","modifier_value":"53"},{"type":"checkbox","class":"limitation","value":1,"modifier":"35","modifier_value":"72"},{"type":"select","class":"limitation","value":"0","modifier":"36","modifier_value":"97"},{"type":"select","class":"penalty","value":"0","modifier":"8","modifier_value":"15"},{"type":"checkbox","class":"limitation","value":1,"modifier":"32","modifier_value":"69"}]}';
		debug(json_decode($json, true));
		debug($json);
		$this->render('empty');
	}

	function testJsonEncode() {
		$array = [
			'title' => 'First Post',
			'active' => 20,
			'endurance_reduction' => 2,
			'comments' => [
				['body' => 'Best post ever', 'value' => 25],
				['body' => 'I really like this.', 'value' => 7]
			]
		];
		debug($array);
		debug(json_encode($array, JSON_NUMERIC_CHECK));
		$this->render('empty');
	}

	public function recoverTargetsTable() {
		$targets = TableRegistry::get('Targets');
		$targets->recover();
		debug("Recovery Complete");
		$this->render('empty');
	}

	public function getManeuvers($returnas = null) {
		$data = TableRegistry::get('maneuvers');
		$query = $data->find();
		$query->hydrate(false);
		$query->where(['active !=' => 0]);
		$query->order("sort_order ASC");
		$return = [];
		$maneuvers = $query->all();
		foreach ($maneuvers as $maneuver) {
			$name = $maneuver['name'];
			$id = $maneuver['id'];
			$return[] = compact('name', 'id');
		}
		switch ($returnas) {
			case "echo":
				debug($return);
				$this->render('empty');
				break;
			case "array":
				return($return);
				break;
			default:
				$this->autoRender = false;
				echo(json_encode($return, JSON_NUMERIC_CHECK));
				exit;
				break;
		}
	}

	public function getPowers($maneuver_id = null, $returnas = null) {
		$data = TableRegistry::get('powers');
		$query = $data->find();
		$query->hydrate(false);
		$query->where(['maneuver_id' => $maneuver_id, 'active !=' => 0]);
		$return = [];
		$powers = $query->all();
		foreach ($powers as $power) {
			$name = $power['name'];
			$id = $power['id'];
			$return[] = compact('name', 'id');
		}
		switch ($returnas) {
			case "echo":
				debug($return);
				$this->render('empty');
				break;
			case "array":
				return($return);
				break;
			default:
				$this->autoRender = false;
				echo(json_encode($return, JSON_NUMERIC_CHECK));
				exit;
				break;
		}
	}

	public function getTargets($power_id = null, $returnas = null) {
		$data = TableRegistry::get('targets');
		$query = $data->find();
		$query->hydrate(false);
		$query->where(['power_id' => $power_id, 'sort_order !=' => 0]);
		$return = [];
		$targets = $query->all();
		foreach ($targets as $target) {
			$name = $target['name'];
			$id = $target['id'];
			$return[] = compact('name', 'id');
		}
		switch ($returnas) {
			case "echo":
				debug($return);
				$this->render('empty');
				break;
			case "array":
				return($return);
				break;
			default:
				$this->autoRender = false;
				echo(json_encode($return, JSON_NUMERIC_CHECK));
				exit;
				break;
		}
	}

	public function getOptions($target_id = null, $common = false, $returnas = null) {
		if (empty($target_id)) {
			return [];
			exit();
		}

		$targets = TableRegistry::get('targets');
		$power = $targets->findById($target_id)->first();
		$power_id = $power['power_id'];

		$powers = TableRegistry::get('powers');
		$powers_array = $powers->findById($power_id)->hydrate(false)->first();
		$this->removeByKey($powers_array, ['created', 'modified']);

		$data = TableRegistry::get('all_records');
		$query = $data->find();
		$query->hydrate(false);
		$query->where(['Targets__id' => ($common ? 1 : $target_id)]);
		if (!$common) {
			$allpower = $targets
					->find()
					->select('id')
					->where(['power_id' => $power_id, 'sort_order' => 0])
					->hydrate(false)
					->first();
			$allpower_id = $allpower['id'];
			$query->orWhere(['Targets__id' => $allpower_id]);
		}
		$query->andWhere(['SectionTypes__id IS NOT' => null]);

		$return = $this->gridToArray($query, $powers_array);

		switch ($returnas) {
			case "echo":
				debug($return);
				$this->render('empty');
				break;
			case "array":
				return($return);
				break;
			default:
				$this->autoRender = false;
				echo(json_encode($return, JSON_NUMERIC_CHECK));
				exit;
				break;
		}
	}

	function gridToArray($query, $powers_array = []) {
		$query->order(['SectionTypes__sort_order', 'ModifierClasses__sort_order', 'Targets__id DESC', 'Modifiers__sort_order', 'ModifierValues__value ASC']);

		$grid = $query->all()->toArray();

		$return = [];
		foreach ($grid as $key => $value) {
			$class = [
				'section_types' => [
					$value['SectionTypes__sort_order'] => [
						'display_name' => Inflector::humanize(ucwords($value['SectionTypes__name'])),
						'id' => $value['SectionTypes__id'],
						'name' => $value['SectionTypes__name'],
						'sort_order' => $value['SectionTypes__sort_order'],
						'section_id' => $value['Sections__id'],
						'modifier_classes' => [
							$value['ModifierClasses__sort_order'] => [
								'display_name' => Inflector::pluralize(Inflector::humanize(ucwords($value['ModifierClasses__name']))),
								'id' => $value['ModifierClasses__sort_order'],
								'name' => $value['ModifierClasses__name'],
								'sort_order' => $value['ModifierClasses__sort_order'],
								'targets' => [
									$value['Targets__id'] => [
										'display_name' => $value['Targets__name'],
										'id' => $value['Targets__sort_order'],
										'name' => $value['Targets__name'],
										'sort_order' => $value['Targets__sort_order'],
										'displays' => [
											$value['Displays__id'] => [
												'id' => $value['Displays__id'],
												'name' => $value['Displays__name'],
												'modifiers' => [
													$value['Modifiers__sort_order'] => [
														'id' => $value['Modifiers__id'],
														'name' => $value['Modifiers__name'],
														'lock_level_modifier' => $value['Modifiers__lock_level_modifier'],
														'default_input_value' => $value['Modifiers__default_input_value'],
														'type' => [
															'id' => $value['ModifierTypes__id'],
															'name' => $value['ModifierTypes__name']
														],
														'class' => [
															'id' => $value['ModifierClasses__id'],
															'name' => $value['ModifierClasses__name']
														],
														'power' => $powers_array,
														'values' => [
															$value['ModifierValues__id'] => [
																'id' => $value['ModifierValues__id'],
																'name' => $value['ModifierValues__name'],
																'value' => $value['ModifierValues__value'],
																'lock_level_requirement' => $value['ModifierValues__lock_level_requirement'],
																'sort_order' => $value['ModifierValues__sort_order'],
																'is_default' => $value['ModifierValues__is_default']
															]
														]
													]
												]
											]
										]
									]
								]
							]
						]
					]
				]
			];
			$return = array_replace_recursive($return, $class);
		}
		return $return;
	}

	function arrayToGrid(array $array) {
		$flattened_array = array();
		array_walk_recursive($array, function($a) use (&$flattened_array) {
			$flattened_array[] = $a;
		});
		return $flattened_array;
	}

	public function removeByKey(&$array, $keys) {
		if (is_array($array)) {
			foreach ($array as $key => &$value) {
				if (is_array($value)) {
					$this->removeByKey($value, $keys);
				} else {
					if (in_array($key, $keys)) {
						unset($array[$key]);
					}
				}
			}
		}
	}

	public function v4BaseCosts() {
		$targets = TableRegistry::get('targets');

		$targets_list = $targets
				->find('list', [
					'keyField' => 'id',
					'valueField' => 'power_id'
				])
				->hydrate(false)
				->select('id')
				->where([ 'sort_order !=' => 0])
				->order('id')
				->toArray()
		;

//		debug($targets_list);

		$all_records = TableRegistry::get('all_records');
		$allpower_id = 0;

		$v4Array = [];
		foreach ($targets_list as $target_id => $power_id) {

			$allpower = $targets
					->find()
					->select('id')
					->where(['power_id' => $power_id, 'sort_order' => 0])
					->hydrate(false)
					->first();
			$allpower_id = $allpower['id'];

			$query = $all_records->find();
//			$query->select(['Targets__id', 'Targets__name', 'Targets__sort_order', 'ModifierClasses__name', 'Modifiers__name', 'ModifierValues__name', 'ModifierValues__value']);
			$query
					->where(['Targets__id IN' => [$target_id, $allpower_id], 'Targets__id !=' => 1])
					->andWhere(function ($exp) {
						return $exp->or_([
//									'SectionTypes__id IS' => null,
									'SectionTypes__id IN' => [1, 3]
						]);
					});

			$records = $query->all()->toArray();

			debug($records);

			foreach ($records as $key => $value) {
				$record['target_id'] = $target_id;
				$record['name'] = $value['Targets__name'];
				$record['stype'] = $value['SectionTypes__name'];
				$record['mtype'] = $value['ModifierTypes__name'];
				$record['class'] = $value['ModifierClasses__name'];
				$record['vname'] = $value['ModifierValues__name'];
				$record['value'] = $value['ModifierValues__value'];
				$v4array[] = $record;
			}
		}
//		debug($v4array);
		$this->loadComponent('DisplayFunctions');
		debug(count($v4array));
		$this->DisplayFunctions->echoArrayAsTable($v4array);

		$this->render('empty');
	}

	public function v4($asarray = true) {
		$power_id = 2;
		$all_id = 12;
		$target_id = 16;
//		$this->autoRender = false;
		$data = TableRegistry::get('section_types');
		$query = $data->find();
		$query->select(['id', 'name']);
		$query->order(['sort_order']);
		$query->contain([
			"Sections" => [
				"Modifiers" => [
					'sort' => ['sort_order' => 'ASC'],
					"ModifierValues",
					"ModifierClasses",
					"ModifierTypes",
					"Displays"
				]
			]
		]);

		$query->hydrate(false);

		$power_options = $query->all()->toArray();
		$this->removeByKey($power_options, ['created', 'modified']);

		foreach ($power_options as $section_type) {
			debug($section_type['name']);
			foreach ($section_type['sections'] as $section) {
				debug($section);
				debug($section['modifier']['name']);
			}
		}

		debug($power_options);
	}

	public function getCosts() {



		$targets = TableRegistry::get('targets');

		$target_list = $targets->find('list')->select('id')->where(['sort_order !=' => 0])->order(['id'])->hydrate(false)->all()->toArray();
//		$target_list = $targets->find('list')->select('id')->where(['sort_order !=' => 0])->order(['id'])->hydrate(false)->limit(1)->all()->toArray();

		$return = [];
		foreach ($target_list as $target_id => $target_name) {
			$power = $targets->findById($target_id)->first();

			$power_id = $power['power_id'];
			$powers = TableRegistry::get('powers');
			$powers_array = $powers->findById($power_id)->hydrate(false)->first();
			$this->removeByKey($powers_array, ['created', 'modified']);

			$data = TableRegistry::get('all_records');
			$query = $data->find();
			$query->hydrate(false);
			$allpower = $targets
					->find()
					->select('id')
					->where(['power_id' => $power_id, 'sort_order' => 0])
					->hydrate(false)
					->first();
			$allpower_id = $allpower['id'];
			$query->where(['Targets__id' => $allpower_id]);
			$query->orWhere(['Targets__id' => $target_id]);
			$query->orWhere(['Targets__id' => 1]);
			$query->andWhere(['SectionTypes__id IS NOT' => null]);

			$data = $this->gridToArray($query, $powers_array);

			$display_info['power_sort_order'] = $powers_array['sort_order'];
			$display_info['target_id'] = $target_id;
			$display_info['power_name'] = $powers_array['name'];
			$display_info['target_name'] = $target_name;
			$display_info['power_requirement'] = $powers_array['lock_level_requirement'];
			$display_info['locklevel'] = $powers_array['lock_level_requirement'];
			$reqoffset = $this->calculateCosts($data, $display_info, 0);
//			debug($reqoffset);
			for ($locklevel = 1; $locklevel < 11; $locklevel++) {
				$display_info['locklevel'] = $locklevel;

				$return[] = $this->calculateCosts($data, $display_info, $reqoffset['lock_level_penalty']);
			}
		}
//		debug($return);
		$this->loadComponent('DisplayFunctions');
//		echo($this->DisplayFunctions->multidimensionalArrayToTable($return,true));
		$this->DisplayFunctions->echo2DArrayAsTable($return);
//		echo("<table>");
//		foreach (array_keys($return[0]) as $heading) {
//			echo("<th>$heading</th>");
//		}
//
//		foreach ($return as $key => $value) {
//			echo("<tr>");
//			foreach ($value as $retval) {
//				echo("<td>$retval</td>");
//			}
//			echo("</tr>");
//		}
//		echo("</table>");
//		debug($return);
	}

	function calculateCosts($data, $display_info, $power_lock_level_penalty) {
		$locklevel = $display_info['locklevel'];
		$vals = [];
		$vals['base'] = 0; //($locklevel - $display_info['power_requirement']) * 10;
		$vals['adder'] = 0;
		$vals['advantage'] = 0;
		$vals['limitation'] = 0;
		$vals['modifier'] = 0;
		$vals['penalty'] = 0;
		$vals['endurance_reduction'] = 0;
		$lock_level_penalties = 0;
		$testdata = [];
		$testitem = [];

		foreach ($data['section_types'] as $skey => $svalue) {
			$testitem['section_types'] = $svalue['name'];
			foreach ($svalue['modifier_classes'] as $ckey => $cvalue) {
				$testitem['modifier_classes'] = $cvalue['name'];
				foreach ($cvalue['targets'] as $tkey => $tvalue) {
					$testitem['targets'] = $tvalue['name'];
					foreach ($tvalue['displays'] as $dkey => $dvalue) {
						$testitem['displays'] = $dvalue['name'];
						foreach ($dvalue['modifiers'] as $mkey => $mvalue) {
							$modifieritems = [];
							$calc_values = [];
							$calc_values['power_requirement'] = 0;
							$calc_values['requirement'] = 0;
							$calc_values['modifier'] = 0;
							$currentvalue = 0;
							switch ($mvalue['type']['name']) {
								case "checkbox":
									foreach ($mvalue['values'] as $vkey => $vvalue) {
										$checked = ($svalue['name'] == "Required" || $svalue['name'] == "Included" || $vvalue['is_default'] == 1);
										if ($checked) {
											$currentvalue = $vvalue['value'];
											$vals[$mvalue['class']['name']] += $currentvalue;
											$modifieritems = $this->getModifierItems($mvalue, $vvalue, $currentvalue);
											$calc_values['power_requirement'] = $mvalue['power']['lock_level_requirement'];
											$calc_values['modifier'] = $mvalue['lock_level_modifier'];
											if (!$vvalue['is_default']) {
												$calc_values['requirement'] = $vvalue['lock_level_requirement'];
											}
										} else {
											if ($vvalue['is_default']) {
												$calc_values['power_requirement'] = $mvalue['power']['lock_level_requirement'];
												$calc_values['requirement'] = $vvalue['lock_level_requirement'];
												$calc_values['modifier'] = $mvalue['lock_level_modifier'];
											}
										}
									}
									break;
								case "multiplier":
									foreach ($mvalue['values'] as $vkey => $vvalue) {
										$checked = ($svalue['name'] == "Required" || $svalue['name'] == "Included" || $vvalue['is_default'] == 1);
										if ($checked) {
											$currentvalue = 0; //$vvalue['value'];
											$vals[$mvalue['class']['name']] += $currentvalue;
											$modifieritems = $this->getModifierItems($mvalue, $vvalue, $currentvalue);
//var mval = 0;
//var parent = ths.closest(".wrapper");
//parent.find($(".calc:not([data-class='multiplier'])")).each(function () {
//	if ($(this).data("type") != "multiplier") {
//		mval += getVal($(this));
//	}
//});
//retval = mval;
											$calc_values['power_requirement'] = $mvalue['power']['lock_level_requirement'];
											$calc_values['modifier'] = $mvalue['lock_level_modifier'];
											if (!$vvalue['is_default']) {
												$calc_values['requirement'] = $vvalue['lock_level_requirement'];
											}
										} else {
											if ($vvalue['is_default']) {
												$calc_values['power_requirement'] = $mvalue['power']['lock_level_requirement'];
												$calc_values['requirement'] = $vvalue['lock_level_requirement'];
												$calc_values['modifier'] = $mvalue['lock_level_modifier'];
											}
										}
									}
									break;
								case "input":
									foreach ($mvalue['values'] as $vkey => $vvalue) {
										if ($mvalue['default_input_value']) {
											$currentvalue = $mvalue['default_input_value'] * $vvalue['value'];
											$modifieritems = $this->getModifierItems($mvalue, $vvalue, $currentvalue);
											$vals[$mvalue['class']['name']] += $currentvalue;
											$calc_values['power_requirement'] = $mvalue['power']['lock_level_requirement'];
											$calc_values['requirement'] = $vvalue['lock_level_requirement'];
											$calc_values['modifier'] = $mvalue['lock_level_modifier'];
										}
									}
									break;
								case "select":
									foreach ($mvalue['values'] as $vkey => $vvalue) {
										if ($vvalue['is_default']) {
											$currentvalue = $vvalue['value'];
											$modifieritems = $this->getModifierItems($mvalue, $vvalue, $currentvalue);
											$vals[$mvalue['class']['name']] += $currentvalue;
											$vals[$mvalue['class']['name']] += $vvalue['value'];
											$calc_values['power_requirement'] = $mvalue['power']['lock_level_requirement'];
											$calc_values['requirement'] = $vvalue['lock_level_requirement'];
											$calc_values['modifier'] = $mvalue['lock_level_modifier'];
										}
									}
									break;
								case "radio":
									break;
								default:
									debug($mkey);
									debug($mvalue);
									//An error has occured
									debug("modifier type name: ~" . $mvalue['type']['name'] . "~ id: ~" . $mvalue['type']['id'] . "~ does not exist.");
							}
//							if ($mvalue['class']['name'] == "adder" && $mvalue['type']['name'] == "input" && $currentvalue != 0) {
//								debug("Power: " . $mvalue['power']['name'] .  " - Modifier: " . $mvalue['name'] . " - Adder: " . $currentvalue);
//							}
							$lock_level_penalty = ($calc_values['power_requirement'] + $calc_values['requirement'] - $locklevel) * $calc_values['modifier'];
//							$lock_level_penalty = ((($calc_values['power_requirement'] + $calc_values['requirement']) / $locklevel) * $calc_values['modifier']);
//							$lock_level_penalty = ((($calc_values['power_requirement'] + $calc_values['requirement']) / $locklevel) * .5);
//							$lock_level_penalty = ((($calc_values['requirement']) / $locklevel) * .5);
//							if($mvalue['class']['name'] == "limitation"){
//								$lock_level_penalty *= -1;
//							}
							if ($tkey != 1) {
								$modifieritems['lock_level_penalty'] = $lock_level_penalty;
								$lock_level_penalties -= $lock_level_penalty;
							}
						}
						$testitem[] = $modifieritems;
						$testdata[] = $testitem;
					}
				}
			}
		}

//		debug($testdata);
//		debug($vals);


		$costs = [];
		foreach ($display_info as $key => $value) {
			$costs[$key] = $value;
		}
		$costs['base'] = $vals['base'];
		$costs['active'] = ($vals['base'] + $vals['adder']) * (1 + ($vals['advantage'] + $vals['endurance_reduction']));
		$costs['real'] = ceil($costs['active'] / (1 + $vals['limitation']));
		$costs['endurance'] = ($vals['endurance_reduction'] > 0 ? 0 : ceil($costs['active'] / 10));
		$costs['penalties'] = (-1 * ceil($costs['active'] / 10)) + $vals['penalty'];
		$llsqrt = ($lock_level_penalties > 0 ? $lock_level_penalties ^ .5 : $lock_level_penalties);
		$llrounded = round($llsqrt, 0);
		$costs['lock_level_penalty'] = $llrounded - $power_lock_level_penalty;

		foreach ($vals as $key => $value) {
			$costs[$key] = $value;
		}
//		debug($costs);
//		$this->loadComponent('DisplayFunctions');
////		echo($this->DisplayFunctions->multidimensionalArrayToTable($return,true));
//		$this->DisplayFunctions->echo1DArrayAsTable($costs, true);
//		$this->DisplayFunctions->echo1DArrayAsTable($costs);
//		debug($modifieritems);
		return($costs);


//		debug($data);
	}

	function getModifierItems($mvalue, $vvalue, $currentvalue) {
		$item['name'] = $mvalue['name'];
		$item['type'] = $mvalue['type']['name'];
		$item['class'] = $mvalue['class']['name'];
		$item['basevalue'] = $vvalue['value'];
		$item['value'] = $currentvalue;
		$item['lock_level_penalty'] = 0;
		return $item;
	}

	function getPowerModifiers() {

		$targets = TableRegistry::get('targets');

		$target_list = $targets->find('list')->select('id')->where(['sort_order !=' => 0])->order(['id'])->hydrate(false)->all()->toArray();
//		$target_list = $targets->find('list')->select('id')->where(['sort_order !=' => 0])->order(['id'])->hydrate(false)->limit(1)->all()->toArray();

		$return = [];
		foreach ($target_list as $target_id => $target_name) {
			$power = $targets->findById($target_id)->first();

			$power_id = $power['power_id'];
			$powers = TableRegistry::get('powers');
			$powers_array = $powers->findById($power_id)->hydrate(false)->first();
			$power_name = $powers_array['name'];
//			$this->removeByKey($powers_array, ['created', 'modified']);

			$data = TableRegistry::get('all_records');
			$query = $data->find();
			$query->hydrate(false);
			$fields = [
				'power_name' => "'$power_name'"
				, 'SectionTypes__name'
				, 'Modifiers__name'
				, 'ModifierClasses__name'
				, 'ModifierTypes__name'
				, 'ModifierValues__name'
				, 'ModifierValues__value'
				, 'ModifierValues__is_default'
			];
			$query->select($fields);
			$query->distinct($fields);

			$allpower = $targets
					->find()
					->select('id')
					->where(['power_id' => $power_id, 'sort_order' => 0])
					->hydrate(false)
					->first();
			$allpower_id = $allpower['id'];
			$query->where(['Targets__id' => $allpower_id]);
			$query->orWhere(['Targets__id' => $target_id]);
			$query->orWhere(['Targets__id' => 1]);
			$query->andWhere(['SectionTypes__id IS NOT' => null]);

			$grid = $query->all()->toArray();
			$return = array_merge_recursive($return, $grid);
		}

		$this->loadComponent('DisplayFunctions');
//		echo($this->DisplayFunctions->multidimensionalArrayToTable($return,true));
		$this->DisplayFunctions->echo2DArrayAsTable($return);

		$this->render('empty');
	}

}
