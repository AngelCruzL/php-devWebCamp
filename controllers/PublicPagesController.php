<?php

namespace Controllers;

use MVC\Router;

class PublicPagesController
{
	public static function index(Router $router)
	{
		$router->render('pages/index', [
			'pageTitle' => 'Inicio'
		]);
	}

	public static function events(Router $router)
	{
		$router->render('pages/devwebcamp', [
			'pageTitle' => 'Sobre DevWebCamp'
		]);
	}

	public static function packs(Router $router)
	{
		$router->render('pages/packs', [
			'pageTitle' => 'Paquetes DevWebCamp'
		]);
	}

	public static function conferences(Router $router)
	{
		$router->render('pages/conferences', [
			'pageTitle' => 'Conferencias y Workshops'
		]);
	}
}
