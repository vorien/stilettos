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

	public function getOptionsTest($ability_id = 1, $power = false, $asarray = false) {
//		$this->autoRender = false;
		if (empty($ability_id)) {
			return [];
			exit();
		}
		$data = TableRegistry::get('abilities_grid');
		$query = $data->find();
		$query->hydrate(false);
		$query->where(['abilities_id' => $ability_id, 'displays_power' => $power]);
		$grid = $query->all()->toArray();
//		debug($grid);

		$classes = [];
		foreach ($grid as $key => $value) {
			$class = [
				Inflector::pluralize(ucwords($value['modifier_classes_name'])) => [
//					'id' => $value['modifier_classes_id'],
//					'name' => $value['modifier_classes_name'],
					$value['displays_name'] => [
//						'id' => $value['displays_id'],
//						'name' => $value['displays_name'],
						$value['modifiers_name'] => [
							'id' => $value['modifiers_id'],
							'name' => $value['modifiers_name'],
							'locklevel' => $value['modifiers_locklevel'],
							'required' => $value['modifiers_required'],
							'type' => [
								'id' => $value['modifier_types_id'],
								'name' => $value['modifier_types_name']
							],
							'class' => [
								'id' => $value['modifier_classes_id'],
								'name' => $value['modifier_classes_name']
							],
							'ability' => [
								'type' => $value['abilities_type'],
								'duration' => $value['abilities_duration'],
								'target' => $value['abilities_target'],
								'has_range' => $value['abilities_has_range'],
								'use_end' => $value['abilities_use_end']
							],
							'values' => [
								$value['modifier_values_id'] => [
									'id' => $value['modifier_values_id'],
									'name' => $value['modifier_values_name'],
									'locklevel' => $value['modifier_values_locklevel'],
									'value' => $value['modifier_values_value'],
									'required' => $value['modifier_values_required']
								]
							]
						]
					]
				]
			];

			$classes = array_replace_recursive($classes, $class);
		}
		if ($asarray) {
			return($classes);
		} else {
			echo(json_encode($classes, JSON_NUMERIC_CHECK));
			exit;
		}
	}

	public function index() {
		$maneuvers = $this->getManeuvers();
		$this->set(compact('maneuvers'));
		$this->render('test');
	}

	public function test($ability_id = 1, $power = false, $asarray = false) {
		$this->autoRender = false;
		$opts = $this->getOptionsTest($ability_id, $power, true);
		debug($opts);
	}

	public function getManeuvers() {
		$data = TableRegistry::get('maneuvers');
		$query = $data->find();
		$query->hydrate(false);
		$return = [];
		$maneuvers = $query->all();
		foreach ($maneuvers as $maneuver) {
			$name = $maneuver['name'];
			$id = $maneuver['id'];
			$locklevel = $maneuver['locklevel'];
			$return[] = compact('name', 'id', 'locklevel');
		}
		return($return);
	}

	public function getPowers($maneuver_id = null) {
		$this->autoRender = false;
		$data = TableRegistry::get('maneuvers');
		$query = $data->find();
		$query->hydrate(false);
		$query->where(['id' => $maneuver_id]);
		$query->contain([
			"Abilities" => ["Powers"]
		]);
		$return = [];
		$maneuver = $query->first();
		foreach ($maneuver['abilities'] as $key => $ability) {
			$ability_id = $ability['id'];
			$id = $ability['power']['id'];
			$name = $ability['power']['name'];
			$return[] = compact('ability_id', 'id', 'name');
		}
		$json_return = json_encode($return, JSON_NUMERIC_CHECK);
		echo($json_return);
		exit();
	}

	public function getOptions($ability_id = null, $power = false) {
		$this->autoRender = false;
		if (empty($ability_id)) {
			return [];
			exit();
		}
		$data = TableRegistry::get('abilities');
		$query = $data->find();
		$query->hydrate(false);
		$query->where(['id' => $ability_id]);
		$query->contain([
			"Displays" => [
				"conditions" => ["Displays.power" => $power],
				"Modifiers" => [
					"ModifierTypes",
					"ModifierValues",
					"ModifierClasses"
				]
			]
		]);
		$abilities = $query->all();
		$return = [];
		foreach ($abilities as $ability) {
//			debug($ability);
			foreach ($ability['displays'] as $display) {
//				debug($display);
				$return[$display['name']]['id'] = $display['id'];
				$modifiers = [];
				foreach ($display['modifiers'] as $modifier) {
					$modifiers[$modifier['name']] = [
						'id' => $modifier['id'],
						'required' => $modifier['required'],
						'type' => [
							'id' => $modifier['modifier_type']['id'],
							'name' => $modifier['modifier_type']['name']
						],
						'class' => [
							'id' => $modifier['modifier_class']['id'],
							'name' => $modifier['modifier_class']['name']
						]
					];
					$modifiervalues = [];
					foreach ($modifier['modifier_values'] as $value) {
						$modifiervalues[$value['name']] = [
							'id' => $value['id'],
							'locklevel' => $value['locklevel'],
							'value' => $value['value'],
							'required' => $value['required']
						];
					}
					$modifiers[$modifier['name']]['values'] = $modifiervalues;
				}
				$return[$display['name']]['modifiers'] = $modifiers;
			}
		}
		echo(json_encode($return, JSON_NUMERIC_CHECK | JSON_PRETTY_PRINT));
//		debug($return);
//		debug($modifiers);
//		$return = [];
//		foreach ($maneuver['abilities'] as $key => $ability) {
//			$ability_id = $ability['id'];
//			$id = $ability['power']['id'];
//			$name = $ability['power']['name'];
//			$return[] = compact('ability_id', 'id', 'name');
//		}
//		$json_return = json_encode($return, JSON_NUMERIC_CHECK);
//		echo($json_return);
		exit();
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
//			$return[$maneuver['name']]['powers']['power']['name']]['locklevel'] = 'power']['locklevel'];
//		}
//
//			$modifier_value[$value['modifier_values_id']]['name'] = $value['modifier_values_name'];
//			$modifier_value[$value['modifier_values_id']]['locklevel'] = $value['modifier_values_locklevel'];
//			$modifier_value[$value['modifier_values_id']]['value'] = $value['modifier_values_value'];
//			$modifier_value[$value['modifier_values_id']]['required'] = $value['modifier_values_required'];
//			$modifier_value = array_merge_recursive($modifier_values, $modifier_value);
//
//			$modifier_type['name'] = $value['modifier_types_name'];
//			$modifier_types = array_merge_recursive($modifier_types, $modifier_type);
//
//			$modifier_classes = array_merge_recursive($modifier_classes, $modifier_class);
//
//			$modifier['id'] = $value['modifiers_id'];
//			$modifier['locklevel'] = $value['modifiers_locklevel'];
//			$modifier['required'] = $value['modifiers_required'];
//			$modifier['ability'] = $abilities;
//			$modifier['values'] = $modifier_values;
//			$modifier['type'] = $modifier_types;
//			$modifier['class'] = $modifier_classes;
//
//
//			[$value['abilities_id']]] = array_merge([$value['abilities_id']]], $abilities);
//
//
//			$modifiers[Inflector::pluralize(ucwords($value['modifier_classes_name']))][$value['displays_name']][$value['modifiers_name']] = $mods;
	}

}
