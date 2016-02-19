<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Stilettos Controller
 *
 */
class StilettosController extends AppController {

	public function index() {
		$maneuvers = $this->getManeuvers();
		$this->set(compact('maneuvers'));
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
//			$return[$maneuver['name']]['powers'][$ability['power']['name']]['ability_id'] = $ability['id'];
//			$return[$maneuver['name']]['powers'][$ability['power']['name']]['type'] = $ability['type'];
//			$return[$maneuver['name']]['powers'][$ability['power']['name']]['duration'] = $ability['duration'];
//			$return[$maneuver['name']]['powers'][$ability['power']['name']]['target'] = $ability['target'];
//			$return[$maneuver['name']]['powers'][$ability['power']['name']]['has_range'] = $ability['has_range'];
//			$return[$maneuver['name']]['powers'][$ability['power']['name']]['use_end'] = $ability['use_end'];
//			$return[$maneuver['name']]['powers'][$ability['power']['name']]['locklevel'] = $ability['power']['locklevel'];
//		}
	}

}
