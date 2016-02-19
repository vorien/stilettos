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
		$results = [];
		$maneuvers = $query->all();
		foreach ($maneuvers as $maneuver) {
			$name = $maneuver['name'];
			$id = $maneuver['id'];
			$locklevel = $maneuver['locklevel'];
			$results[] = compact('name', 'id', 'locklevel');
		}
		return($results);
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
		$results = [];
		$maneuver = $query->first();
		foreach ($maneuver['abilities'] as $key => $ability) {
			$ability_id = $ability['id'];
			$id = $ability['power']['id'];
			$name = $ability['power']['name'];
			$results[] = compact('ability_id', 'id', 'name');
		}
		$json_results = json_encode($results, JSON_NUMERIC_CHECK);
		echo($json_results);
		exit();
	}

	public function getPowerModifiers($ability_id = null) {
		$this->autoRender = false;
		$data = TableRegistry::get('abilities');
		$query = $data->find();
		$query->hydrate(false);
		$query->where(['id' => $ability_id]);
		$query->contain([
			"Displays" => [
				"conditions" => ["Displays.power" => true],
				"Modifiers" => [
					"ModifierTypes",
					"ModifierValues",
					"ModifierClasses"
				]
			]
		]);
		$modifiers = $query->all();
		debug($modifiers);
//		$results = [];
//		foreach ($maneuver['abilities'] as $key => $ability) {
//			$ability_id = $ability['id'];
//			$id = $ability['power']['id'];
//			$name = $ability['power']['name'];
//			$results[] = compact('ability_id', 'id', 'name');
//		}
//		$json_results = json_encode($results, JSON_NUMERIC_CHECK);
//		echo($json_results);
		exit();
	}

	public function getGenericModifiers($ability_id = null) {
		$this->autoRender = false;
		$data = TableRegistry::get('abilities');
		$query = $data->find();
		$query->hydrate(false);
		$query->where(['id' => $ability_id]);
		$query->contain([
			"Displays" => [
				"conditions" => ["Displays.power" => false],
				"Modifiers" => [
					"ModifierTypes",
					"ModifierValues",
					"ModifierClasses"
				]
			]
		]);
		$modifiers = $query->all();
		debug($modifiers);
//		$results = [];
//		foreach ($maneuver['abilities'] as $key => $ability) {
//			$ability_id = $ability['id'];
//			$id = $ability['power']['id'];
//			$name = $ability['power']['name'];
//			$results[] = compact('ability_id', 'id', 'name');
//		}
//		$json_results = json_encode($results, JSON_NUMERIC_CHECK);
//		echo($json_results);
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
//			$results[$maneuver['name']]['powers'][$ability['power']['name']]['ability_id'] = $ability['id'];
//			$results[$maneuver['name']]['powers'][$ability['power']['name']]['type'] = $ability['type'];
//			$results[$maneuver['name']]['powers'][$ability['power']['name']]['duration'] = $ability['duration'];
//			$results[$maneuver['name']]['powers'][$ability['power']['name']]['target'] = $ability['target'];
//			$results[$maneuver['name']]['powers'][$ability['power']['name']]['has_range'] = $ability['has_range'];
//			$results[$maneuver['name']]['powers'][$ability['power']['name']]['use_end'] = $ability['use_end'];
//			$results[$maneuver['name']]['powers'][$ability['power']['name']]['locklevel'] = $ability['power']['locklevel'];
//		}
	}

}
