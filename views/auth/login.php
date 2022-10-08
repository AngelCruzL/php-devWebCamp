<main class="auth">
	<h2 class="auth__heading"><?php echo $pageTitle; ?></h2>
	<p class="auth__text">Inicia Sesión en DevWebCamp</p>

	<?php require_once __DIR__ . '/../templates/alerts.php'; ?>

	<form class="form" method="POST">
		<div class="form__field">
			<label for="email" class="form__label">Correo Electrónico</label>
			<input type="email" class="form__input" placeholder="correo@correo.com" id="email" name="email">
		</div>

		<div class="form__field">
			<label for="password" class="form__label">Contraseña</label>
			<input type="password" class="form__input" placeholder="Tu contraseña" id="password" name="password">
		</div>

		<input type="submit" class="form__submit" value="Iniciar Sesión">
	</form>

	<div class="actions">
		<a href="/registro" class="actions__link">¿Aún no tienes cuenta? Obtener una</a>
		<a href="/olvide" class="actions__link">¿Olvidaste tu contraseña?</a>
	</div>
</main>
