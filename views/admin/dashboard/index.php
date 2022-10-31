<h2 class="dashboard__heading"><?php echo $pageTitle; ?></h2>

<main class="blocks">
	<div class="blocks__grid">
		<div class="block">
			<h3 class="block__heading">Últimos Registros</h3>

			<?php foreach ($registers as $register) : ?>
				<div class="block__content">
					<p class="block__text">
						<?php echo $register->user->first_name . " " . $register->user->last_name; ?>
					</p>
				</div>
			<?php endforeach; ?>
		</div>

		<div class="block">
			<h3 class="block__heading">Ingresos</h3>
			<p class="block__text--quantity">$ <?php echo $incomes; ?></p>
		</div>


		<div class="block">
			<h3 class="block__heading">Eventos con Menos Lugares Disponibles</h3>

			<?php foreach ($events_with_less_registers as $event) : ?>

				<div class="block__content">
					<p class="block__text">
						<?php echo $event->name . " - " . $event->available_places . ' Disponibles'; ?>
					</p>
				</div>
			<?php endforeach; ?>
		</div>

		<div class="block">
			<h3 class="block__heading">Eventos con Más Lugares Disponibles</h3>

			<?php foreach ($events_with_more_registers as $event) : ?>

				<div class="block__content">
					<p class="block__text">
						<?php echo $event->name . " - " . $event->available_places . ' Disponibles'; ?>
					</p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</main>
