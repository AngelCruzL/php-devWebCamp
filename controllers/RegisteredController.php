<?php

namespace Controllers;

use Classes\Pagination;
use Model\Pack;
use Model\Register;
use Model\User;
use MVC\Router;

class RegisteredController
{
	public static function index(Router $router)
	{
		if (!is_admin()) header('Location: /login');

		$current_page = filter_var($_GET['page'], FILTER_VALIDATE_INT);
		if (!$current_page || $current_page < 1) header('Location: /admin/registrados?page=1');

		$registers_per_page = 10;
		$total_registers = Register::total();

		$pagination = new Pagination($current_page, $registers_per_page, $total_registers);
		if ($pagination->total_pages() < $current_page) header('Location: /admin/registrados?page=1');

		$registers = Register::paginate($registers_per_page, $pagination->offset());
		foreach ($registers as $register) {
			$register->user = User::find($register->user_id);
			$register->pack = Pack::find($register->pack_id);
		}

		$router->render('admin/registered/index', [
			'pageTitle' => 'Usuarios Registrados',
			'registers' => $registers,
			'pagination' => $pagination->pagination()
		]);
	}
}
