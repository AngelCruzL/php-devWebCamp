<h2 class="dashboard__heading"><?php echo $pageTitle; ?></h2>

<div class="dashboard__containerButton">
	<a href="/admin/eventos" class="dashboard__button">
		<i class="fa-solid fa-circle-arrow-left"></i>
		Volver
	</a>
</div>

<div class="dashboard__form">
	<?php include_once __DIR__ . '/../../templates/alerts.php'; ?>

	<form class="form" method="POST">
		<?php include_once __DIR__ .  '/form.php' ?>

		<input type="submit" value="Registrar Evento" class="form__submit form__submit--register">
	</form>
</div>
