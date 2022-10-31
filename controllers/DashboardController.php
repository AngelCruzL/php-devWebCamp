<?php

namespace Controllers;

use Model\Event;
use Model\Register;
use Model\User;
use MVC\Router;

class DashboardController
{
	private static $virtual_registry_income = 46.41;
	private static $face2face_registry_income = 189.54;

	public static function index(Router $router)
	{
		$registers = Register::get(5);
		foreach ($registers as $register) {
			$register->user = User::find($register->user_id);
		}

		$total_virtual_registers = Register::total('pack_id', 2);
		$total_face2face_registers = Register::total('pack_id', 1);

		$incomes = ($total_face2face_registers * self::$face2face_registry_income) + ($total_virtual_registers * self::$virtual_registry_income);

		$events_with_less_registers = Event::orderWithLimit('available_places', 'ASC', 5);
		$events_with_more_registers = Event::orderWithLimit('available_places', 'DESC', 5);

		$router->render('admin/dashboard/index', [
			'pageTitle' => 'Panel de Administración',
			'registers' => $registers,
			'incomes' => $incomes,
			'events_with_less_registers' => $events_with_less_registers,
			'events_with_more_registers' => $events_with_more_registers
		]);
	}
}
