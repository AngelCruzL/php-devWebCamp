<main class="agenda">
	<h2 class="agenda__heading">Workshops & Conferencias</h2>
	<p class="agenda__description">Talleres y Conferencias dictados por expertos en Desarrollo Web</p>

	<div class="events">
		<h3 class="events__heading">&lt;Conferencias/></h3>

		<p class="events__date">Viernes 7 de Octubre</p>
		<div class="events__list slider swiper">
			<div class="swiper-wrapper">
				<?php foreach ($events['conferences_day1'] as $event) : ?>
					<?php include __DIR__ . '../../templates/event.php'; ?>
				<?php endforeach; ?>
			</div>

			<div class="swiper-button-next"></div>
			<div class="swiper-button-prev"></div>
		</div>

		<p class="events__date">Sábado 8 de Octubre</p>
		<div class="events__list slider swiper">
			<div class="swiper-wrapper">
				<?php foreach ($events['conferences_day2'] as $event) : ?>
					<?php include __DIR__ . '../../templates/event.php'; ?>
				<?php endforeach; ?>
			</div>

			<div class="swiper-button-next"></div>
			<div class="swiper-button-prev"></div>
		</div>
	</div>

	<div class="events--workshops">
		<h3 class="events__heading">&lt;Workshops/></h3>

		<p class="events__date">Viernes 7 de Octubre</p>
		<div class="events__list slider swiper">
			<div class="swiper-wrapper">
				<?php foreach ($events['workshops_day1'] as $event) : ?>
					<?php include __DIR__ . '../../templates/event.php'; ?>
				<?php endforeach; ?>
			</div>

			<div class="swiper-button-next"></div>
			<div class="swiper-button-prev"></div>
		</div>

		<p class="events__date">Sábado 8 de Octubre</p>
		<div class="events__list slider swiper">
			<div class="swiper-wrapper">
				<?php foreach ($events['workshops_day2'] as $event) : ?>
					<?php include __DIR__ . '../../templates/event.php'; ?>
				<?php endforeach; ?>
			</div>

			<div class="swiper-button-next"></div>
			<div class="swiper-button-prev"></div>
		</div>
</main>
