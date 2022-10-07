<?php

namespace Model;

class User extends ActiveRecord
{
	protected static $table = 'users';
	protected static $dbColumns = [
		'id',
		'first_name',
		'last_name',
		'email',
		'password',
		'token',
		'is_confirmed',
		'is_admin'
	];

	public function __construct($args = [])
	{
		$this->id = $args['id'] ?? null;
		$this->first_name = $args['first_name'] ?? '';
		$this->last_name = $args['last_name'] ?? '';
		$this->email = $args['email'] ?? '';
		$this->password = $args['password'] ?? '';
		$this->passwordConfirm = $args['passwordConfirm'] ?? '';
		$this->currentPassword = $args['currentPassword'] ?? '';
		$this->newPassword = $args['newPassword'] ?? '';
		$this->token = $args['token'] ?? '';
		$this->is_confirmed = $args['is_confirmed'] ?? 0;
		$this->is_admin = $args['is_admin'] ?? 0;
	}

	public function validateNewAccountCreation(): array
	{
		if (empty($this->first_name)) self::$alerts['error'][] = 'El nombre es obligatorio.';
		if (empty($this->last_name)) self::$alerts['error'][] = 'El apellido es obligatorio.';
		if (empty($this->email)) self::$alerts['error'][] = 'El correo electrónico es obligatorio';
		if (empty($this->password)) self::$alerts['error'][] = 'La contraseña es obligatoria';
		if (strlen($this->password) < 6) self::$alerts['error'][] = 'La contraseña debe tener al menos 6 caracteres';
		if ($this->password !== $this->passwordConfirm) self::$alerts['error'][] = 'Las contraseñas deben ser las mismas';

		return self::$alerts;
	}

	public function validateEmail(): array
	{
		if (empty($this->email)) self::$alerts['error'][] = 'El correo electrónico es obligatorio';
		if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) self::$alerts['error'][] = 'El correo electrónico no es válido';

		return self::$alerts;
	}

	public function validatePassword(): array
	{
		if (empty($this->password)) self::$alerts['error'][] = 'La contraseña es obligatoria';
		if (strlen($this->password) < 6) self::$alerts['error'][] = 'La contraseña debe tener al menos 6 caracteres';

		return self::$alerts;
	}

	public function validateLogin()
	{
		$this->validateEmail();
		if (empty($this->password)) self::$alerts['error'][] = 'La contraseña es obligatoria';

		return self::$alerts;
	}

	public function validatePasswordUpdate(): array
	{
		if (empty($this->currentPassword)) self::$alerts['error'][] = 'La contraseña actual es obligatoria';
		if (empty($this->newPassword)) self::$alerts['error'][] = 'La nueva contraseña es obligatoria';
		if (strlen($this->newPassword) < 6) self::$alerts['error'][] = 'La nueva contraseña debe tener al menos 6 caracteres';

		return self::$alerts;
	}

	public function verifyPassword(): bool
	{
		return password_verify($this->currentPassword, $this->password);
	}

	public function hashPassword(): void
	{
		$this->password = password_hash($this->password, PASSWORD_BCRYPT);
	}

	public function generateToken(): void
	{
		$this->token = uniqid();
	}
}
