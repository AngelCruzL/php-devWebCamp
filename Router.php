<?php

namespace MVC;

class Router
{
	public $routesGet = [];
	public $routesPost = [];

	public function get($url, $controller)
	{
		$this->routesGet[$url] = $controller;
	}

	public function post($url, $controller)
	{
		$this->routesPost[$url] = $controller;
	}

	public function checkRoutes()
	{
		$currentUrl = $_SERVER['PATH_INFO'] ?? '/';
		$httpMethod = $_SERVER['REQUEST_METHOD'];

		if ($httpMethod === 'GET') {
			$controller = $this->routesGet[$currentUrl] ?? null;
		} else {
			$controller = $this->routesPost[$currentUrl] ?? null;
		}

		if ($controller) {
			call_user_func($controller, $this);
		} else {
			header('Location: /404');
		}
	}

	public function render($view, $data = [])
	{
		foreach ($data as $key => $value) {
			$$key = $value;
		}

		ob_start();
		include __DIR__ . '/views/' . $view . '.php';
		$content = ob_get_clean();

		$currentUrl = $_SERVER['PATH_INFO'] ?? '/';
		if (str_contains($currentUrl, '/admin')) {
			include __DIR__ . '/views/admin-layout.php';
		} else {
			include __DIR__ . '/views/layout.php';
		}
	}
}
