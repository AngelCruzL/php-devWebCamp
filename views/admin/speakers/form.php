<fieldset class="form__fieldset">
	<legend class="form__legend">Información Personal</legend>

	<div class="form__field">
		<label for="first_name" class="form__label">Nombre</label>
		<input type="text" class="form__input" id="first_name" name="first_name" placeholder="Nombre del Ponente" value="<?php echo $speaker->first_name ?? ''; ?>">
	</div>

	<div class="form__field">
		<label for="last_name" class="form__label">Apellido</label>
		<input type="text" class="form__input" id="last_name" name="last_name" placeholder="Nombre del Ponente" value="<?php echo $speaker->last_name ?? ''; ?>">
	</div>

	<div class="form__field">
		<label for="city" class="form__label">Ciudad</label>
		<input type="text" class="form__input" id="city" name="city" placeholder="Cuidad del Ponente" value="<?php echo $speaker->city ?? ''; ?>">
	</div>

	<div class="form__field">
		<label for="country" class="form__label">País</label>
		<input type="text" class="form__input" id="country" name="country" placeholder="País del Ponente" value="<?php echo $speaker->country ?? ''; ?>">
	</div>

	<div class="form__field">
		<label for="image" class="form__label">Imagen</label>
		<input type="file" class="form__input form__input--file" id="image" name="image">
	</div>
</fieldset>

<fieldset class="form__fieldset">
	<legend class="form__legend">Información Extra</legend>

	<div class="form__field">
		<label for="tags_input" class="form__label">Áreas de Experiencia (separadas por coma)</label>
		<input type="text" class="form__input" id="tags_input" placeholder="Ejemplo: Node.js, PHP, CSS, Laravel, UX / UI">
	</div>

	<div id="tags" class="form__list">
		<input type="hidden" name="tags" value="<?php echo $speaker->tags ?? ''; ?>">
	</div>
</fieldset>

<fieldset class="form__fieldset">
	<legend class="form__legend">Redes Sociales</legend>

	<div class="form__field">
		<div class="form__container-icon">
			<div class="form__icon">
				<i class="fa-brands fa-facebook"></i>
			</div>
			<input type="text" class="form__input--socials" name="social_network[facebook]" placeholder="Facebook" value="<?php echo $speaker->facebook ?? ''; ?>">
		</div>
	</div>

	<div class="form__field">
		<div class="form__container-icon">
			<div class="form__icon">
				<i class="fa-brands fa-twitter"></i>
			</div>
			<input type="text" class="form__input--socials" name="social_network[twitter]" placeholder="Twitter" value="<?php echo $speaker->twitter ?? ''; ?>">
		</div>
	</div>

	<div class="form__field">
		<div class="form__container-icon">
			<div class="form__icon">
				<i class="fa-brands fa-youtube"></i>
			</div>
			<input type="text" class="form__input--socials" name="social_network[youtube]" placeholder="YouTube" value="<?php echo $speaker->youtube ?? ''; ?>">
		</div>
	</div>

	<div class="form__field">
		<div class="form__container-icon">
			<div class="form__icon">
				<i class="fa-brands fa-instagram"></i>
			</div>
			<input type="text" class="form__input--socials" name="social_network[instagram]" placeholder="Instagram" value="<?php echo $speaker->instagram ?? ''; ?>">
		</div>
	</div>

	<div class="form__field">
		<div class="form__container-icon">
			<div class="form__icon">
				<i class="fa-brands fa-tiktok"></i>
			</div>
			<input type="text" class="form__input--socials" name="social_network[tiktok]" placeholder="TikTok" value="<?php echo $speaker->tiktok ?? ''; ?>">
		</div>
	</div>

	<div class="form__field">
		<div class="form__container-icon">
			<div class="form__icon">
				<i class="fa-brands fa-github"></i>
			</div>
			<input type="text" class="form__input--socials" name="social_network[github]" placeholder="GitHub" value="<?php echo $speaker->github ?? ''; ?>">
		</div>
	</div>
</fieldset>
