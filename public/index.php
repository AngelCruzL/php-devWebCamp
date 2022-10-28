<?php

require_once __DIR__ . '/../includes/app.php';

use Controllers\AuthController;
use Controllers\DashboardController;
use Controllers\EventsAPI;
use Controllers\SpeakersController;
use Controllers\EventsController;
use Controllers\RegisteredController;
use Controllers\GiftController;
use Controllers\PublicPagesController;
use Controllers\RegisterController;
use Controllers\SpeakersAPI;
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

$router->get('/api/horarios-eventos', [EventsAPI::class, 'index']);
$router->get('/api/ponentes', [SpeakersAPI::class, 'index']);
$router->get('/api/ponente', [SpeakersAPI::class, 'getSpeaker']);

$router->get('/admin/dashboard', [DashboardController::class, 'index']);

$router->get('/admin/ponentes', [SpeakersController::class, 'index']);
$router->get('/admin/ponentes/crear', [SpeakersController::class, 'createSpeaker']);
$router->post('/admin/ponentes/crear', [SpeakersController::class, 'createSpeaker']);
$router->get('/admin/ponentes/editar', [SpeakersController::class, 'editSpeaker']);
$router->post('/admin/ponentes/editar', [SpeakersController::class, 'editSpeaker']);
$router->post('/admin/ponentes/eliminar', [SpeakersController::class, 'deleteSpeaker']);

$router->get('/admin/eventos', [EventsController::class, 'index']);
$router->get('/admin/eventos/crear', [EventsController::class, 'createEvent']);
$router->post('/admin/eventos/crear', [EventsController::class, 'createEvent']);
$router->get('/admin/eventos/editar', [EventsController::class, 'editEvent']);
$router->post('/admin/eventos/editar', [EventsController::class, 'editEvent']);
$router->post('/admin/eventos/eliminar', [EventsController::class, 'deleteEvent']);

$router->get('/admin/registrados', [RegisteredController::class, 'index']);

$router->get('/admin/regalos', [GiftController::class, 'index']);

$router->get('/finalizar-registro', [RegisterController::class, 'register']);
$router->post('/finalizar-registro/gratis', [RegisterController::class, 'freeRegister']);

$router->get('/', [PublicPagesController::class, 'index']);
$router->get('/devwebcamp', [PublicPagesController::class, 'events']);
$router->get('/paquetes', [PublicPagesController::class, 'packs']);
$router->get('/workshops-conferencias', [PublicPagesController::class, 'agenda']);
$router->get('/404', [PublicPagesController::class, 'notFound']);

$router->checkRoutes();
