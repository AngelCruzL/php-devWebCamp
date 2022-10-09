<?php

require_once __DIR__ . '/../includes/app.php';

use Controllers\AuthController;
use Controllers\DashboardController;
use Controllers\SpeakersController;
use Controllers\EventsController;
use Controllers\RegisteredController;
use Controllers\GiftController;
use MVC\Router;

$router = new Router();

$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'login']);
$router->post('/logout', [AuthController::class, 'logout']);

$router->get('/registro', [AuthController::class, 'createAccount']);
$router->post('/registro', [AuthController::class, 'createAccount']);

$router->get('/olvide', [AuthController::class, 'forgotPassword']);
$router->post('/olvide', [AuthController::class, 'forgotPassword']);

$router->get('/restablecer', [AuthController::class, 'resetPassword']);
$router->post('/restablecer', [AuthController::class, 'resetPassword']);

$router->get('/mensaje', [AuthController::class, 'message']);
$router->get('/confirmar-cuenta', [AuthController::class, 'confirmAccount']);

$router->get('/admin/dashboard', [DashboardController::class, 'index']);

$router->get('/admin/ponentes', [SpeakersController::class, 'index']);
$router->get('/admin/ponentes/crear', [SpeakersController::class, 'createSpeaker']);
$router->post('/admin/ponentes/crear', [SpeakersController::class, 'createSpeaker']);
$router->get('/admin/ponentes/editar', [SpeakersController::class, 'editSpeaker']);
$router->post('/admin/ponentes/editar', [SpeakersController::class, 'editSpeaker']);

$router->get('/admin/eventos', [EventsController::class, 'index']);

$router->get('/admin/registrados', [RegisteredController::class, 'index']);

$router->get('/admin/regalos', [GiftController::class, 'index']);

$router->checkRoutes();
