<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email
{
	protected $email;
	protected $name;
	protected $token;

	public function __construct(string $email, string $name, string $token)
	{
		$this->email = $email;
		$this->name = $name;
		$this->token = $token;
	}

	public function sendConfirmationEmail(): void
	{
		$mail = new PHPMailer();
		$mail->isSMTP();
		$mail->Host =   $_ENV['EMAIL_HOST'];
		$mail->SMTPAuth = $_ENV['EMAIL_SMTPAUTH'];
		$mail->Port = $_ENV['EMAIL_PORT'];
		$mail->Username = $_ENV['EMAIL_USERNAME'];
		$mail->Password = $_ENV['EMAIL_PASSWORD'];

		$mail->setFrom($_ENV['EMAIL_FROM_ADDRESS']);
		$mail->addAddress($this->email, $this->name);
		$mail->Subject = 'Confirma tu cuenta';
		$mail->isHTML(true);
		$mail->CharSet = 'UTF-8';

		$mailContent = '
      <html>
        <p><strong>Hola ' . $this->name . '</strong>, has registrado exitosamente tu cuenta en DevWebCamp; pero es necesario confirmarla</p>
        <p>Presiona aquí para confirmar tu cuenta: <a href="' . $_ENV['HOST'] . '/confirmar-cuenta?token=' . $this->token . '">Confirmar Cuenta</a></p>
        <p>Si tú no creaste esta cuenta puedes ignorar este mensaje.</p>
      </html>
    ';

		$mail->Body = $mailContent;
		$mail->send();
	}

	public function sendResetPasswordEmail(): void
	{
		$mail = new PHPMailer();
		$mail->isSMTP();
		$mail->Host =   $_ENV['EMAIL_HOST'];
		$mail->SMTPAuth = $_ENV['EMAIL_SMTPAUTH'];
		$mail->Port = $_ENV['EMAIL_PORT'];
		$mail->Username = $_ENV['EMAIL_USERNAME'];
		$mail->Password = $_ENV['EMAIL_PASSWORD'];

		$mail->setFrom($_ENV['EMAIL_FROM_ADDRESS']);
		$mail->addAddress($this->email, $this->name);
		$mail->Subject = 'Restablece tu contraseña';
		$mail->isHTML(true);
		$mail->CharSet = 'UTF-8';

		$mailContent = '
      <html>
        <p><strong>Hola ' . $this->name . '</strong>, has solicitado restablecer tu contraseña, para hacerlo sigue el siguiente enlace:</p>
        <p><a href="' . $_ENV['HOST'] . '/restablecer?token=' . $this->token . '">Restablece tu contraseña</a></p>
        <p>Si no has solicitado este cambio, puedes ignorar este mensaje.</p>
      </html>
    ';

		$mail->Body = $mailContent;
		$mail->send();
	}
}
