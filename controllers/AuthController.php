<?php

namespace Controllers;

use Classes\Email;
use Model\User;
use MVC\Router;

class AuthController
{
	public static function login(Router $router): void
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$user = new User($_POST);
			$alerts = $user->validateLogin();

			if (empty($alerts)) {
				$user = User::where('email', $user->email);

				if (!$user || !$user->is_confirmed) {
					User::setAlert('error', 'El usuario no existe o no está confirmado');
				} else {
					if (password_verify($_POST['password'], $user->password)) {
						session_start();
						$_SESSION['userId'] = $user->id;
						$_SESSION['firstName'] = $user->first_name;
						$_SESSION['lastName'] = $user->last_name;
						$_SESSION['email'] = $user->email;
						$_SESSION['isAdmin'] = $user->is_admin ?? null;

						if ($user->is_admin) header('Location: /admin/dashboard');
						else header('Location: /finalizar-registro');
					} else {
						User::setAlert('error', 'La contraseña es incorrecta');
					}
				}
			}
		}

		$alerts = User::getAlerts();

		$router->render('auth/login', [
			'pageTitle' => 'Iniciar Sesión',
			'alerts' => $alerts ?? []
		]);
	}

	public static function logout(): void
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			session_start();
			$_SESSION = [];
			header('Location: /');
		}
	}

	public static function createAccount(Router $router): void
	{
		$user = new User;

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$user->sync($_POST);
			$alerts = $user->validateNewAccountCreation();

			if (empty($alerts)) {
				$userExists = User::where('email', $user->email);

				if ($userExists) {
					User::setAlert('error', 'El correo ya esta registrado');
					$alerts = User::getAlerts();
				} else {
					$user->hashPassword();
					unset($user->passwordConfirm);
					$user->generateToken();
					$result = $user->save();
					$email = new Email($user->email, $user->first_name, $user->token);
					$email->sendConfirmationEmail();

					if ($result) header('Location: /mensaje');
				}
			}
		}

		$router->render('auth/create-account', [
			'pageTitle' => 'Crea tu cuenta en DevWebCamp',
			'user' => $user,
			'alerts' => $alerts ?? [],
		]);
	}

	public static function forgotPassword(Router $router): void
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$user = new User($_POST);
			$alerts = $user->validateEmail();

			if (empty($alerts)) {
				$userExists = User::where('email', $user->email);

				if ($userExists && $userExists->is_confirmed) {
					$userExists->generateToken();
					unset($userExists->passwordConfirm);
					$userExists->save();
					$email = new Email($userExists->email, $userExists->first_name, $userExists->token);
					$email->sendResetPasswordEmail();
					User::setAlert('success', 'Hemos enviado un correo electrónico con las instrucciones para restablecer tu contraseña');
				} else {
					User::setAlert('error', 'El usuario no existe o no esta confirmado');
				}
			}
		}

		$alerts = User::getAlerts();

		$router->render('auth/forgot-password', [
			'pageTitle' => 'Olvide mi contraseña',
			'alerts' => $alerts ?? [],
		]);
	}

	public static function resetPassword(Router $router): void
	{
		$isValidToken = true;
		$token = s($_GET['token']);
		if (!$token) header('Location: /');

		$user = User::where('token', $token);

		if (empty($user)) {
			User::setAlert('error', 'Token no válido');
			$isValidToken = false;
		}

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$user->sync($_POST);
			$alerts = $user->validatePassword();

			if (empty($alerts)) {
				$user->hashPassword();
				$user->token = null;
				$result = $user->save();

				if ($result) header('Location: /login');
			}
		}

		$alerts = User::getAlerts();

		$router->render('auth/reset-password', [
			'pageTitle' => 'Olvide mi contraseña',
			'alerts' => $alerts ?? [],
			'isValidToken' => $isValidToken,
		]);
	}

	public static function message(Router $router): void
	{
		$router->render('auth/message', [
			'pageTitle' => 'Cuenta creada exitosamente',
		]);
	}

	public static function confirmAccount(Router $router): void
	{
		$token = s($_GET['token']);
		if (!$token) header('Location: /');

		$user = User::where('token', $token);

		if (empty($user)) {
			User::setAlert('error', 'Token no válido, la cuenta no pudo ser confirmada');
		} else {
			$user->token = null;
			$user->is_confirmed = 1;
			unset($user->passwordConfirm);
			$user->save();
			User::setAlert('success', 'Cuenta confirmada exitosamente');
		}

		$router->render('auth/confirm-account', [
			'pageTitle' => 'Confirma tu cuenta en UpTask',
			'alerts' => User::getAlerts()
		]);
	}
}
