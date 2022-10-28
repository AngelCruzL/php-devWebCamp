<?php include_once __DIR__ . '/agenda.php'; ?>

<section class="resume">
	<div class="resume__grid">
		<div <?php aos_animation(); ?> class="resume__block">
			<p class="resume__text resume__text--number"><?php echo $total_speakers; ?></p>
			<p class="resume__text">Speakers</p>
		</div>

		<div <?php aos_animation(); ?> class="resume__block">
			<p class="resume__text resume__text--number"><?php echo $total_conferences; ?></p>
			<p class="resume__text">Conferencias</p>
		</div>

		<div <?php aos_animation(); ?> class="resume__block">
			<p class="resume__text resume__text--number"><?php echo $total_workshops; ?></p>
			<p class="resume__text">Workshops</p>
		</div>

		<div <?php aos_animation(); ?> class="resume__block">
			<p class="resume__text resume__text--number">500</p>
			<p class="resume__text">Asistentes</p>
		</div>
	</div>
</section>

<section class="speakers">
	<h2 class="speakers__heading">Speakers</h2>
	<p class="speakers__description">Conoce a nuestros expertos en DevWebCamp</p>

	<div class="speakers__grid">
		<?php foreach ($speakers as $speaker) : ?>
			<div <?php aos_animation(); ?> class="speaker">
				<picture>
					<source srcset="img/speakers/<?php echo $speaker->image; ?>.webp" type="image/webp">
					<source srcset="img/speakers/<?php echo $speaker->image; ?>.png" type="image/png">
					<img src="img/speakers/<?php echo $speaker->image; ?>.png" alt="<?php echo $speaker->first_name; ?>" class="speaker__image" loading="lazy">
				</picture>

				<div class="speaker__information">
					<h4 class="speaker__name"><?php echo $speaker->first_name . ' ' . $speaker->last_name; ?></h4>
					<p class="speaker__location"><?php echo $speaker->city . ', ' . $speaker->country; ?></p>

					<nav class="speaker-social">
						<?php $social_networks = json_decode($speaker->social_networks) ?>

						<?php if (!empty($social_networks->facebook)) : ?>
							<a class="speaker-social__link" rel="noopener noreferrer" target="_blank" href="<?php echo $social_networks->facebook; ?>">
								<span class="speaker-social__hide">Facebook</span>
							</a>
						<?php endif; ?>

						<?php if (!empty($social_networks->twitter)) : ?>
							<a class="speaker-social__link" rel="noopener noreferrer" target="_blank" href="<?php echo $social_networks->twitter; ?>">
								<span class="speaker-social__hide">Twitter</span>
							</a>
						<?php endif; ?>

						<?php if (!empty($social_networks->youtube)) : ?>
							<a class="speaker-social__link" rel="noopener noreferrer" target="_blank" href="<?php echo $social_networks->youtube; ?>">
								<span class="speaker-social__hide">YouTube</span>
							</a>
						<?php endif; ?>

						<?php if (!empty($social_networks->instagram)) : ?>
							<a class="speaker-social__link" rel="noopener noreferrer" target="_blank" href="<?php echo $social_networks->instagram; ?>">
								<span class="speaker-social__hide">Instagram</span>
							</a>
						<?php endif; ?>

						<?php if (!empty($social_networks->tiktok)) : ?>
							<a class="speaker-social__link" rel="noopener noreferrer" target="_blank" href="<?php echo $social_networks->tiktok; ?>">
								<span class="speaker-social__hide">TikTok</span>
							</a>
						<?php endif; ?>

						<?php if (!empty($social_networks->github)) : ?>
							<a class="speaker-social__link" rel="noopener noreferrer" target="_blank" href="<?php echo $social_networks->github; ?>">
								<span class="speaker-social__hide">GitHub</span>
							</a>
						<?php endif; ?>
					</nav>

					<div class="speaker__skills-list">
						<?php
						$tags = explode(',', $speaker->tags);
						foreach ($tags as $tag) :
						?>
							<li class="speaker__skill"><?php echo $tag; ?></li>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</section>

<div id="map" class="map"></div>

<section class="tickets">
	<h2 class="tickets__heading">Boletos y Precios</h2>
	<p class="tickets__description">Precios para DevWebCamp</p>

	<div class="tickets__grid">
		<div <?php aos_animation(); ?> class="ticket ticket--face2face">
			<h4 class="ticket__logo">&#60;DevWebCamp /></h4>
			<p class="ticket__plan">Presencial</p>
			<p class="ticket__price">$199</p>
		</div>

		<div <?php aos_animation(); ?> class="ticket ticket--online">
			<h4 class="ticket__logo">&#60;DevWebCamp /></h4>
			<p class="ticket__plan">Virtual</p>
			<p class="ticket__price">$49</p>
		</div>

		<div <?php aos_animation(); ?> class="ticket ticket--free">
			<h4 class="ticket__logo">&#60;DevWebCamp /></h4>
			<p class="ticket__plan">Gratis</p>
			<p class="ticket__price">$0</p>
		</div>
	</div>

	<div class="ticket__link-container">
		<a href="/paquetes" class="ticket__link">Ver paquetes</a>
	</div>
</section>
