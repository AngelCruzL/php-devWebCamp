<main class="auth">
	<h2 class="auth__heading"><?php echo $pageTitle; ?></h2>
	<p class="auth__text">Recupera tu acceso a DevWebCamp</p>

	<?php require_once __DIR__ . '/../templates/alerts.php'; ?>

	<form class="form" method="POST">
		<div class="form__field">
			<label for="email" class="form__label">Correo Electrónico</label>
			<input type="email" class="form__input" placeholder="correo@correo.com" id="email" name="email">
		</div>

		<input type="submit" class="form__submit" value="Enviar Instrucciones">
	</form>

	<div class="actions">
		<a href="/login" class="actions__link">¿Ya tienes una cuenta? Inicia Sesión</a>
		<a href="/registro" class="actions__link">¿Aún no tienes cuenta? Obtener una</a>
	</div>
</main>
