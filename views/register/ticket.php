<main class="page">
	<h2 class="page__heading"><?php echo $pageTitle; ?></h2>
	<p class="page__description">Tu Boleto - Te recomendamos almacenarlo, puedes compartirlo en redes sociales</p>

	<div class="virtual-ticket">
		<div class="ticket ticket--free ticket--access">
			<div class="ticket__content">
				<h4 class="ticket__logo">&#60;DevWebCamp /></h4>
				<p class="ticket__plan"><?php echo $register->pack->name; ?></p>
				<p class="ticket__name"><?php echo $register->user->first_name . ' ' . $register->user->last_name ?></p>
			</div>

			<p class="ticket__code">#<?php echo $register->token; ?></p>
		</div>
	</div>
</main>
