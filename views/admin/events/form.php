<fieldset class="form__fieldset">
	<legend class="form__legend">Información del Evento</legend>

	<div class="form__field">
		<label for="name" class="form__label">Nombre del Evento</label>
		<input type="text" class="form__input" id="name" name="name" placeholder="Nombre del Ponente" value="<?php echo $event->name ?? ''; ?>">
	</div>

	<div class="form__field">
		<label for="description" class="form__label">Descripción</label>
		<textarea type="text" class="form__input" id="description" name="description" rows="8" placeholder="Descripción del evento"><?php echo $event->description ?? ''; ?></textarea>
	</div>

	<div class="form__field">
		<label for="category" class="form__label">Categoría o Tipo de Evento</label>
		<select name="category_id" id="category" class="form__select">
			<option disabled selected>Seleccionar categoría</option>
			<?php foreach ($categories as $category) : ?>
				<option value="<?php echo $category->id; ?>" <?php echo ($event->category_id === $category->id) ? 'selected' : '' ?>>
					<?php echo $category->name; ?>
				</option>
			<?php endforeach; ?>
		</select>
	</div>

	<div class="form__field">
		<label for="category" class="form__label">Selecciona el día</label>
		<div class="form__radio">
			<?php foreach ($days as $day) : ?>
				<div>
					<label for="<?php echo strtolower($day->name); ?>"><?php echo $day->name; ?></label>
					<input type="radio" name="day" id="<?php echo strtolower($day->name); ?>" value="<?php echo $day->id; ?>">
				</div>
			<?php endforeach; ?>
		</div>

		<input type="hidden" name="day_id" value="">
	</div>

	<div id="hours" class="form__field">
		<label class="form__label">Selecciona la hora</label>

		<ul id="hours" class="hours">
			<?php foreach ($hours as $hour) : ?>
				<li data-hour-id="<?php echo $hour->id; ?>" class="hours__hour"><?php echo $hour->hour; ?></li>
			<?php endforeach; ?>
		</ul>

		<input type="hidden" name="hour_id" value="">
	</div>
</fieldset>

<fieldset class="form__fieldset">
	<legend class="form__legend">Información Extra</legend>

	<div class="form__field">
		<label for="speaker" class="form__label">Ponente</label>
		<input type="text" id="speaker" name="speaker_id" class="form__input" placeholder="Buscar Ponente">
	</div>

	<div class="form__field">
		<label for="available_places" class="form__label">Lugares Disponibles</label>
		<input type="number" min="1" class="form__input" id="available_places" name="available_places" placeholder="Ejemplo: 20" value="<?php echo $event->available_places; ?>">
	</div>
</fieldset>
