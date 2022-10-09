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
</fieldset>
