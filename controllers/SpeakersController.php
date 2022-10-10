<?php

namespace Controllers;

use Classes\Pagination;
use MVC\Router;
use Model\Speaker;
use Intervention\Image\ImageManagerStatic as Image;

class SpeakersController
{
	public static function index(Router $router)
	{
		if (!is_admin()) header('Location: /login');

		$current_page = filter_var($_GET['page'], FILTER_VALIDATE_INT);
		if (!$current_page || $current_page < 1) header('Location: /admin/ponentes?page=1');

		$registers_per_page = 10;
		$total_registers = Speaker::total();

		$pagination = new Pagination($current_page, $registers_per_page, $total_registers);
		if ($pagination->total_pages() < $current_page) header('Location: /admin/ponentes?page=1');

		$speakers = Speaker::paginate($registers_per_page, $pagination->offset());

		$router->render('admin/speakers/index', [
			'pageTitle' => 'Ponentes / Conferencistas',
			'speakers' => $speakers,
			'pagination' => $pagination->pagination()
		]);
	}

	public static function createSpeaker(Router $router)
	{
		if (!is_admin()) header('Location: /login');

		$speaker = new Speaker;

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if (!is_admin()) header('Location: /login');

			if (!empty($_FILES['image']['tmp_name'])) {
				$IMAGE_DIR = '../public/img/speakers';

				if (!is_dir($IMAGE_DIR)) mkdir($IMAGE_DIR, 0755, true);

				$image_png = Image::make($_FILES['image']['tmp_name'])->fit(800, 800)->encode('png', 80);
				$image_webp = Image::make($_FILES['image']['tmp_name'])->fit(800, 800)->encode('webp', 80);
				$image_name = md5(uniqid(rand(), true));
				$_POST['image'] = $image_name;
			}

			$_POST['social_networks'] = json_encode($_POST['social_networks'], JSON_UNESCAPED_SLASHES);
			$speaker->sync($_POST);
			$alerts = $speaker->validateSpeaker();

			if (empty($alerts)) {
				$image_png->save($IMAGE_DIR . '/' . $image_name . '.png');
				$image_webp->save($IMAGE_DIR . '/' . $image_name . '.webp');
				$result = $speaker->save();

				if ($result) header('Location: /admin/ponentes');
			}
		}

		$router->render('admin/speakers/create', [
			'pageTitle' => 'Registrar Ponente',
			'speaker' => $speaker,
			'social_networks' => json_decode($speaker->social_networks),
			'alerts' => $alerts ?? []
		]);
	}

	public static function editSpeaker(Router $router)
	{
		if (!is_admin()) header('Location: /login');

		$id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
		if (!$id) header('Location: /admin/ponentes');

		$speaker = Speaker::find($id);
		if (!$speaker) header('Location: /admin/ponentes');

		$speaker->current_image = $speaker->image;

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if (!is_admin()) header('Location: /login');

			if (!empty($_FILES['image']['tmp_name'])) {
				$IMAGE_DIR = '../public/img/speakers';

				if (!is_dir($IMAGE_DIR)) mkdir($IMAGE_DIR, 0755, true);

				$image_png = Image::make($_FILES['image']['tmp_name'])->fit(800, 800)->encode('png', 80);
				$image_webp = Image::make($_FILES['image']['tmp_name'])->fit(800, 800)->encode('webp', 80);
				$image_name = md5(uniqid(rand(), true));
				$_POST['image'] = $image_name;
			} else {
				$_POST['image'] = $speaker->current_image;
			}

			$_POST['social_networks'] = json_encode($_POST['social_networks'], JSON_UNESCAPED_SLASHES);
			$speaker->sync($_POST);
			$alerts = $speaker->validateSpeaker();

			if (empty($alerts)) {
				if (isset($image_name)) {
					$image_png->save($IMAGE_DIR . '/' . $image_name . '.png');
					$image_webp->save($IMAGE_DIR . '/' . $image_name . '.webp');
				}

				$result = $speaker->save();

				if ($result) header('Location: /admin/ponentes');
			}
		}

		$router->render('admin/speakers/edit', [
			'pageTitle' => 'Editar Ponente',
			'speaker' => $speaker,
			'social_networks' => json_decode($speaker->social_networks),
			'alerts' => $alerts ?? []
		]);
	}

	public static function deleteSpeaker()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if (!is_admin()) header('Location: /login');

			$speaker = Speaker::find($_POST['id']);
			if (!isset($speaker)) header('Location: /admin/ponentes');

			$result = $speaker->delete();
			if ($result) header('Location: /admin/ponentes');
		}
	}
}
