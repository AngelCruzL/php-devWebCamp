<main class="agenda">
	<h2 class="agenda__heading">Workshops & Conferencias</h2>
	<p class="agenda__description">Talleres y Conferencias dictados por expertos en Desarrollo Web</p>

	<div class="events">
		<h3 class="events__heading">&lt;Conferencias/></h3>

		<p class="events__date">Viernes 7 de Octubre</p>
		<div class="events__list slider swiper">
			<div class="swiper-wrapper">
				<?php foreach ($events['conferences_day1'] as $event) : ?>
					<div class="event swiper-slide">
						<p class="event__hour"><?php echo $event->hour->hour; ?></p>

						<div class="event__information">
							<h4 class="event__name"><?php echo $event->name; ?></h4>

							<p class="event__introduction"><?php echo $event->description; ?></p>

							<div class="event__author-info">
								<picture>
									<source srcset="img/speakers/<?php echo $event->speaker->image; ?>.webp" type="image/webp">
									<source srcset="img/speakers/<?php echo $event->speaker->image; ?>.png" type="image/png">
									<img src="img/speakers/<?php echo $event->speaker->image; ?>.png" alt="<?php echo $event->speaker->name; ?>" class="event__author-image" loading="lazy">
								</picture>

								<p class="event__author-name">
									<?php echo $event->speaker->first_name . '' . $event->speaker->last_name ?>
								</p>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>

			<div class="swiper-button-next"></div>
			<div class="swiper-button-prev"></div>
		</div>

		<p class="events__date">Sábado 8 de Octubre</p>
		<div class="events__list">
			<?php foreach ($events['conferences_day2'] as $event) : ?>
			<?php endforeach; ?>
		</div>
	</div>

	<div class="events--workshops">
		<h3 class="events__heading">&lt;Workshops/></h3>

		<p class="events__date">Viernes 7 de Octubre</p>
		<div class="events__list">
			<?php foreach ($events['workshops_day1'] as $event) : ?>
			<?php endforeach; ?>
		</div>

		<p class="events__date">Sábado 8 de Octubre</p>
		<div class="events__list">
			<?php foreach ($events['workshops_day2'] as $event) : ?>
			<?php endforeach; ?>
		</div>
	</div>
</main>
