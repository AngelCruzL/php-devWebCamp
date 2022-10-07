<main class="auth">
	<h2 class="auth__heading"><?php echo $pageTitle; ?></h2>
	<p class="auth__text">Regístrate en DevWebCamp</p>

	<form class="form">
		<div class="form__field">
			<label for="firstName" class="form__label">Nombre(s)</label>
			<input type="text" class="form__input" placeholder="Tu nombre" id="firstName" name="firstName">
		</div>

		<div class="form__field">
			<label for="lastName" class="form__label">Apellido</label>
			<input type="text" class="form__input" placeholder="Apellido" id="lastName" name="lastName">
		</div>

		<div class="form__field">
			<label for="email" class="form__label">Correo Electrónico</label>
			<input type="email" class="form__input" placeholder="correo@correo.com" id="email" name="email">
		</div>

		<div class="form__field">
			<label for="password" class="form__label">Contraseña</label>
			<input type="password" class="form__input" placeholder="Tu contraseña" id="password" name="password">
		</div>

		<div class="form__field">
			<label for="passwordConfirm" class="form__label">Confirma tu contraseña</label>
			<input type="password" class="form__input" placeholder="Confirma contraseña" id="passwordConfirm" name="passwordConfirm">
		</div>

		<input type="submit" class="form__submit" value="Crear Cuenta">
	</form>

	<div class="actions">
		<a href="/login" class="actions__link">¿Ya tienes una cuenta? Inicia Sesión</a>
		<a href="/olvide" class="actions__link">¿Olvidaste tu contraseña?</a>
	</div>
</main>
