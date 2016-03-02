<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Utility\Inflector;

/**
 * Stilettos Controller
 *
 */
class StilettosController extends AppController {

	public function index() {
		
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
		$return = [];
		for ($locklevel = 1; $locklevel < 11; $locklevel++) {
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
				$return[] = $this->calculateCosts($data, $target_id, $target_name, $locklevel);
			}
		}
//		$this->loadComponent('DisplayFunctions');
//		echo($this->DisplayFunctions->multidimensionalArrayToTable($return,true));
//		$this->DisplayFunctions->echoArrayAsTable($return);
		echo("<table>");
		foreach (array_keys($return[0]) as $heading) {
			echo("<th>$heading</th>");
		}

		foreach ($return as $key => $value) {
			echo("<tr>");
			foreach($value as $retval){
				echo("<td>$retval</td>");
			}
			echo("</tr>");
		}
		echo("</table>");
//		debug($return);
	}

	function calculateCosts($data, $target_id, $target_name, $locklevel) {

		$vals = [];
		$vals['adder'] = 0;
		$vals['advantage'] = 0;
		$vals['limitation'] = 0;
		$vals['modifier'] = 0;
		$vals['penalty'] = 0;
		$vals['endurance_reduction'] = 0;
		$lock_level_penalties = 0;

		foreach ($data['section_types'] as $skey => $svalue) {
			foreach ($svalue['modifier_classes'] as $ckey => $cvalue) {
				foreach ($cvalue['targets'] as $tkey => $tvalue) {
					foreach ($tvalue['displays'] as $dkey => $dvalue) {
						foreach ($dvalue['modifiers'] as $mkey => $mvalue) {
							$calc_values = [];
							$calc_values['power_requirement'] = 0;
							$calc_values['requirement'] = 0;
							$calc_values['modifier'] = 0;
							$default_input = 0;
							switch ($mvalue['type']['name']) {
								case "checkbox":
									foreach ($mvalue['values'] as $vkey => $vvalue) {
										$checked = ($svalue['name'] == "Required" || $svalue['name'] == "Included" || $vvalue['is_default'] == 1);
										if ($checked) {
											$vals[$mvalue['class']['name']] += $vvalue['value'];

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
											$vals[$mvalue['class']['name']] += $vvalue['value'];
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
										if ($default_input) {
											$input_value = $default_input * $vvalue['value'];
											$vals[$mvalue['class']['name']] += $input_value;
											$calc_values['power_requirement'] = $mvalue['power']['lock_level_requirement'];
											$calc_values['requirement'] = $vvalue['lock_level_requirement'];
											$calc_values['modifier'] = $mvalue['lock_level_modifier'];
										}
									}
									break;
								case "select":
									foreach ($mvalue['values'] as $vkey => $vvalue) {
										if ($vvalue['is_default']) {
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
									//An error has occured
									debug("modifier type name: ~" . $mvalue['type']['name'] . "~ id: ~" . $mvalue['type']['id'] . "~ does not exist.");
							}
							$lock_level_penalties += ($calc_values['power_requirement'] + $calc_values['requirement'] - $locklevel) * $calc_values['modifier'];
						}
					}
				}
			}
		}

//		debug(S$vals);

		$costs = [];
		$costs['target_id'] = $target_id;
		$costs['target_name'] = $target_name;
		$costs['lock_level'] = $locklevel;
		$costs['base'] = $vals['adder'];
		$costs['active'] = $vals['adder'] * (1 + ($vals['advantage'] + $vals['endurance_reduction']));
		$costs['real'] = $costs['active'] / (1 + $vals['limitation']);
		$costs['endurance'] = ($vals['endurance_reduction'] > 0 ? 0 : ceil($costs['active'] / 10));
		$costs['penalty'] = (-1 * ceil($costs['active'] / 10)) + $vals['penalty'];
		$costs['lock_level_penalty'] = -1 * $lock_level_penalties;

		return($costs);


//		debug($data);
	}

}
