<div class="event">
	<p class="event__hour"><?php echo $event->hour->hour; ?></p>

	<div class="event__information">
		<h4 class="event__name"><?php echo $event->name; ?></h4>

		<p class="event__introduction"><?php echo $event->description; ?></p>

		<div class="event__author-info">
			<picture>
				<source srcset="<?php echo $_ENV['HOST']; ?>/img/speakers/<?php echo $event->speaker->image; ?>.webp" type="image/webp">
				<source srcset="<?php echo $_ENV['HOST']; ?>/img/speakers/<?php echo $event->speaker->image; ?>.png" type="image/png">
				<img src="<?php echo $_ENV['HOST']; ?>/img/speakers/<?php echo $event->speaker->image; ?>.png" alt="<?php echo $event->speaker->first_name; ?>" class="event__author-image" loading="lazy">
			</picture>

			<p class="event__author-name">
				<?php echo $event->speaker->first_name . '' . $event->speaker->last_name ?>
			</p>
		</div>

		<button type="button" data-id="<?php echo $event->id; ?>" class="event__add" <?php echo ($event->available_places === '0') ? 'disabled' : '' ?>>
			<?php echo ($event->available_places === '0') ? 'Agotado' : 'Agregar - ' .  $event->available_places . ' Disponibles' ?>

		</button>
	</div>
</div>
