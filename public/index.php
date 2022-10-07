<?php

require_once __DIR__ . '/../includes/app.php';

use Controllers\AuthController;
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

$router->checkRoutes();
