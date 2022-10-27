<?php

namespace Controllers;

use Model\Category;
use Model\Day;
use Model\Event;
use Model\Hour;
use Model\Speaker;
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

	public static function agenda(Router $router)
	{
		$events = Event::order('hour_id', 'ASC');
		$eventsFormatted = [];

		foreach ($events as $event) {
			$event->category = Category::find($event->category_id);
			$event->day = Day::find($event->day_id);
			$event->hour = Hour::find($event->hour_id);
			$event->speaker = Speaker::find($event->speaker_id);

			if ($event->day_id === '1' && $event->category_id === '1')
				$eventsFormatted['workshops_day1'][] = $event;

			if ($event->day_id === '2' && $event->category_id === '1')
				$eventsFormatted['workshops_day2'][] = $event;

			if ($event->day_id === '1' && $event->category_id === '2')
				$eventsFormatted['conferences_day1'][] = $event;

			if ($event->day_id === '2' && $event->category_id === '2')
				$eventsFormatted['conferences_day2'][] = $event;
		}

		$router->render('pages/agenda', [
			'pageTitle' => 'Conferencias y Workshops',
			'events' => $eventsFormatted
		]);
	}
}
