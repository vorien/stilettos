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
//		$maneuvers = $this->getManeuvers();
//		$this->set(compact('maneuvers'));
//		$this->render('test');
	}

	public function recoverTargetsTable() {
		$this->autoRender = false;
		$targets = TableRegistry::get('Targets');
		$targets->recover();
		$target_id = 15;
//		$target = $targets
//				->find()
//				->select('id')
//				->where(['power_id' => $power_id, 'sort_order' => 0])
//				->hydrate(false)
//				->first()
////				->toArray()
//				;
//		debug($target);
		debug($target_id);
		$crumbs = $targets->find('path', ['for' => $target_id])->select('id')->all()->toArray();
		debug($crumbs);
	}

	public function v4Array() {
		$data = TableRegistry::get('maneuvers');
		$query = $data->find();
		$query->contain([
			"Powers",
			"Powers.Targets",
			"Powers.Targets.Sections",
			"Powers.Targets.Sections.Modifiers",
			"Powers.Targets.Sections.Modifiers.ModifierValues",
			"Powers.Targets.Sections.Modifiers.ModifierClasses",
			"Powers.Targets.Sections.Modifiers.ModifierTypes",
			"Powers.Targets.Sections.Modifiers.Displays",
			"Powers.Targets.Sections.SectionTypes"
//			"Powers" => [
//				"Targets" => [
//					"Sections" => [
//						"Modifiers" => [
//							"ModifierValues",
//							"ModifierClasses",
//							"ModifierTypes",
//							"Displays"
//						],
//						"SectionTypes"
//					]
//				]
//			]
		]);

		$query->hydrate(false);

		$v4array = $query->all()->toArray();
		$this->removeByKey($v4array, ['created', 'modified']);
		debug($v4array);
		$this->render('v4');
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

//		$query->contain(['Sections' => function ($q) use($target_id, $all_id) {
//				return $q->where(['OR' => [['target_id' => $target_id], ['target_id' => $all_id], ['target_id' => 1]]]);
//			}]);


		$power_options = $query->all()->toArray();
		$this->removeByKey($power_options, ['created', 'modified']);

		foreach ($power_options as $section_type) {
			debug($section_type['name']);
			foreach ($section_type['sections'] as $section) {
				debug($section);
				debug($section['modifier']['name']);
//						foreach( as $modifier){
//							debug($modifier);
//						}
			}
		}

		debug($power_options);

//				$common_options_query = $query;
//				$common_options_query->contain(['Sections' => function ($q) {
//						return $q->where(['target_id' => 1]);
//					}]);
//
//						$common_options = $common_options_query->all()->toArray();
//						$this->removeByKey($common_options, ['created', 'modified']);
//						debug($common_options);
//
//		$query = $data->find();
//		$query->order(['SectionTypes.sort_order']);
//		$query->hydrate(false);
//		$query->contain([
//			"Modifiers" => [
//				"ModifierValues",
//				"ModifierClasses",
//				"ModifierTypes",
//				"Displays"
//			],
//			"SectionTypes"
//		]);
//		$query->where(['target_id' => $all_id]);
//		$all = $query->all()->toArray();
//		debug($all);
//		$classes = [];
//		foreach ($grid as $key => $value) {
//			$class = [
//				$value['Powers__name'] => [
////					'id' => $value['Powers__id'],
////					'name' => $value['Powers__name'],
////					'lock_level' => $value['Powers__lock_level'],
//					'maneuvers' => [
//						$value['maneuvers_name'] => [
////							'id' => $value['maneuvers_id'],
////							'name' => $value['maneuvers_name'],
////							'sort_order' => $value['maneuvers_sort_order']
//						]
//					],
//					'powers' => [
//						$value['powers_name'] => [
////							'id' => $value['powers_id'],
////							'name' => $value['powers_name'],
////							'sort_order' => $value['powers_sort_order'],
//							'type' => $value['powers_type'],
//							'duration' => $value['powers_duration'],
//							'target' => $value['powers_target'],
//							'has_range' => $value['powers_has_range'],
//							'use_end' => $value['powers_use_end']
//						]
//					],
//					'displays' => [
//						$value['displays_name'] => [
////							'id' => $value['displays_id'],
////							'name' => $value['displays_name'],
//							'modifiers' => [
//								$value['Modifiers__name'] => [
////									'id' => $value['Modifiers__id'],
////									'name' => $value['Modifiers__name'],
////									'lock_level' => $value['Modifiers__lock_level'],
////									'required' => $value['Modifiers__required'],
////									'sort_order' => $value['Modifiers__sort_order'],
////									'type' => [
////										'id' => $value['ModifierTypes__id'],
////										'name' => $value['ModifierTypes__name']
////									],
////									'class' => [
////										'id' => $value['ModifierClasses__id'],
////										'name' => $value['ModifierClasses__name'],
////										'sort_order' => $value['ModifierClasses__sort_order']
////									],
////									'values' => [
////										$value['ModifierValues__id'] => [
////											'id' => $value['ModifierValues__id'],
////											'name' => $value['ModifierValues__name'],
////											'lock_level' => $value['ModifierValues__lock_level'],
////											'value' => $value['ModifierValues__value']
////										]
////									]
//								]
//							]
//						]
//					]
//				]
//			];
//
//			$classes = array_replace_recursive($classes, $class);
//		}
//		if ($asarray) {
//			debug($classes);
//		} else {
//			$this->autoRender = false;
//			echo(json_encode($classes, JSON_NUMERIC_CHECK));
//			exit;
//		}
	}

	public function test() {
//		$this->autoRender = false;
		$maneuvers = $this->getManeuvers(true);
//		debug($maneuvers);
		$powers = $this->getPowers(1, true);
//		debug($powers);
		$options = $this->getOptions(5, false, true);
//		debug($options);
		$this->set(compact('maneuvers', 'powers', 'options'));
	}

	public function getManeuvers($asarray = false) {
		$data = TableRegistry::get('maneuvers');
		$query = $data->find();
		$query->hydrate(false);
		$query->where(['lock_level <' => 99]);
		$query->order("sort_order ASC");
		$return = [];
		$maneuvers = $query->all();
		foreach ($maneuvers as $maneuver) {
			$name = $maneuver['name'];
			$id = $maneuver['id'];
			$return[] = compact('name', 'id');
		}
		if ($asarray) {
			return($return);
		} else {
			$this->autoRender = false;
			echo(json_encode($return, JSON_NUMERIC_CHECK));
			exit;
		}
	}

	public function getPowers($maneuver_id = null, $asarray = false) {
		$data = TableRegistry::get('powers');
		$query = $data->find();
		$query->hydrate(false);
		$query->where(['maneuver_id' => $maneuver_id, 'lock_level <' => 99]);
		$return = [];
		$powers = $query->all();
		foreach ($powers as $power) {
			$name = $power['name'];
			$id = $power['id'];
			$return[] = compact('name', 'id');
		}
		if ($asarray) {
			debug($return);
			$this->render('empty');
		} else {
			$this->autoRender = false;
			echo(json_encode($return, JSON_NUMERIC_CHECK));
			exit;
		}
	}

	public function getTargets($power_id = null, $asarray = false) {
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
		if ($asarray) {
			return($return);
		} else {
			$this->autoRender = false;
			echo(json_encode($return, JSON_NUMERIC_CHECK));
			exit;
		}
	}

	public function getOptions($target_id = null, $asarray = false) {
		if (empty($target_id)) {
			return [];
			exit();
		}
		if ($target_id != 1) {

			$targets = TableRegistry::get('targets');

			$power = $targets->findById($target_id)->first();
			$power_id = $power['power_id'];

			$allpower = $targets
					->find()
					->select('id')
					->where(['power_id' => $power_id, 'sort_order' => 0])
					->hydrate(false)
					->first();
			$allpower_id = $allpower['id'];


			$data = TableRegistry::get('all_records');
			$query = $data->find();
			$query->hydrate(false);
			$query->where(['Targets__id' => $allpower_id])
					->orWhere(['Targets__id' => $target_id]);
			$query->order(['SectionTypes__sort_order', 'ModifierClasses__sort_order', 'Targets__id DESC', 'Modifiers__sort_order', 'ModifierValues__value']);
		} else {
			$data = TableRegistry::get('targets_down');
			$query = $data->find();
			$query->hydrate(false);
			$query->where(['Targets__id' => 1]);
			$query->order(['SectionTypes__sort_order', 'ModifierClasses__sort_order', 'Targets__id DESC', 'Modifiers__sort_order', 'ModifierValues__value']);
		}

		$grid = $query->all()->toArray();

		$classes = [];
		foreach ($grid as $key => $value) {
			$powers_array = [];
			if ($target_id != 1) {
				$powers_array = [
					'id' => $value['Powers__id'],
					'name' => $value['Powers__name'],
					'lock_level' => $value['Powers__lock_level'],
					'type' => $value['Powers__type'],
					'duration' => $value['Powers__duration'],
					'target' => $value['Powers__target'],
					'has_range' => $value['Powers__has_range'],
					'use_end' => $value['Powers__use_end']
				];
			}
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
								'displays' => [
									$value['Displays__id'] => [
										'id' => $value['Displays__id'],
										'name' => $value['Displays__name'],
										'modifiers' => [
											$value['Modifiers__sort_order'] => [
												'id' => $value['Modifiers__id'],
												'name' => $value['Modifiers__name'],
												'lock_level' => $value['Modifiers__lock_level'],
												'required' => $value['Modifiers__required'],
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
														'value' => $value['ModifierValues__value']
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
			$classes = array_replace_recursive($classes, $class);
		}
		if ($asarray) {
			debug($target_id);
			debug($allpower_id);
			debug($classes);
			debug($grid);
			$this->render('empty');
		} else {
			$this->autoRender = false;
			echo(json_encode($classes, JSON_NUMERIC_CHECK));
			exit;
		}
	}

	function arrayToGrid(array $array) {
		$flattened_array = array();
		array_walk_recursive($array, function($a) use (&$flattened_array) {
			$flattened_array[] = $a;
		});
		return $flattened_array;
	}

	function oldcode() {
//		$query->contain([
//			"Abilities" => [
//				"Displays" => [
//					"Modifiers" => [
//						"ModifierClasses",
//						"ModifierTypes",
//						"ModifierValues"
//					]
//				]
//			]
//		]);
//		foreach ($maneuver['abilities'] as $key => $ability) {
//			$return[$maneuver['name']]['powers']['power']['name']]['ability_id'] = 'id'];
//			$return[$maneuver['name']]['powers']['power']['name']]['type'] = 'type'];
//			$return[$maneuver['name']]['powers']['power']['name']]['duration'] = 'duration'];
//			$return[$maneuver['name']]['powers']['power']['name']]['target'] = 'target'];
//			$return[$maneuver['name']]['powers']['power']['name']]['has_range'] = 'has_range'];
//			$return[$maneuver['name']]['powers']['power']['name']]['use_end'] = 'use_end'];
//			$return[$maneuver['name']]['powers']['power']['name']]['lock_level'] = 'power']['lock_level'];
//		}
//
//			$modifier_value[$value['ModifierValues__id']]['name'] = $value['ModifierValues__name'];
//			$modifier_value[$value['ModifierValues__id']]['lock_level'] = $value['ModifierValues__lock_level'];
//			$modifier_value[$value['ModifierValues__id']]['value'] = $value['ModifierValues__value'];
//			$modifier_value[$value['ModifierValues__id']]['required'] = $value['ModifierValues__required'];
//			$modifier_value = array_merge_recursive($modifier_values, $modifier_value);
//
//			$modifier_type['name'] = $value['ModifierTypes__name'];
//			$modifier_types = array_merge_recursive($modifier_types, $modifier_type);
//
//			$modifier_classes = array_merge_recursive($modifier_classes, $modifier_class);
//
//			$modifier['id'] = $value['Modifiers__id'];
//			$modifier['lock_level'] = $value['Modifiers__lock_level'];
//			$modifier['required'] = $value['Modifiers__required'];
//			$modifier['ability'] = $abilities;
//			$modifier['values'] = $modifier_values;
//			$modifier['type'] = $modifier_types;
//			$modifier['class'] = $modifier_classes;
//
//
//			[$value['Powers__id']]] = array_merge([$value['Powers__id']]], $abilities);
//
//
//			$modifiers[Inflector::pluralize(ucwords($value['ModifierClasses__name']))][$value['displays_name']][$value['Modifiers__name']] = $mods;
	}

	public
			function removeByKey(&$array, $keys) {
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
