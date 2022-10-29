<h2 class="page__heading"><?php echo $pageTitle; ?></h2>
<p class="page__description">Elige hasta 5 eventos para asistir de forma presencial</p>

<div class="events-register">

	<main class="events-register__list">
		<section>
			<h3 class="events-register__heading--conferences">&lt;Conferencias/></h3>

			<p class="events-register__date">Viernes 7 de Octubre</p>
			<div class="events-register__grid">
				<?php foreach ($events['conferences_day1'] as $event) : ?>
					<?php include __DIR__ . '/event.php'; ?>
				<?php endforeach; ?>
			</div>

			<p class="events-register__date">Sábado 8 de Octubre</p>
			<div class="events-register__grid">
				<?php foreach ($events['conferences_day2'] as $event) : ?>
					<?php include __DIR__ . '/event.php'; ?>
				<?php endforeach; ?>
			</div>
		</section>

		<section>
			<h3 class="events-register__heading--workshops">&lt;Workshops/></h3>

			<p class="events-register__date">Viernes 7 de Octubre</p>
			<div class="events-register__grid events--workshops">
				<?php foreach ($events['workshops_day1'] as $event) : ?>
					<?php include __DIR__ . '/event.php'; ?>
				<?php endforeach; ?>
			</div>

			<p class="events-register__date">Sábado 8 de Octubre</p>
			<div class="events-register__grid events--workshops">
				<?php foreach ($events['workshops_day2'] as $event) : ?>
					<?php include __DIR__ . '/event.php'; ?>
				<?php endforeach; ?>
			</div>
		</section>
	</main>

	<aside class="register">
		<h2 class="register__heading">Tu Registro</h2>

		<div id="register-resume" class="register__resume"></div>
	</aside>
</div>
