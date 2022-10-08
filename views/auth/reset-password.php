<main class="auth">
	<h2 class="auth__heading"><?php echo $pageTitle; ?></h2>
	<p class="auth__text">Coloca tu nueva contraseña</p>

	<?php require_once __DIR__ . '/../templates/alerts.php'; ?>

	<?php if ($isValidToken) : ?>
		<form class="form" method="POST">
			<div class="form__field">
				<label for="password" class="form__label">Nueva Contraseña</label>
				<input type="password" class="form__input" placeholder="Tu nueva contraseña" id="password" name="password">
			</div>

			<input type="submit" class="form__submit" value="Cambiar Contraseña">
		</form>
	<?php endif; ?>

	<div class="actions">
		<a href="/login" class="actions__link">¿Ya tienes una cuenta? Inicia Sesión</a>
		<a href="/registro" class="actions__link">¿Aún no tienes cuenta? Obtener una</a>
	</div>
</main>
