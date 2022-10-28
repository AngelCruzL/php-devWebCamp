<header class="header">
	<div class="header__container">
		<nav class="header__navigation">
			<?php if (is_authenticated()) : ?>
				<a href="<?php echo is_admin() ? '/admin/dashboard' : '/finalizar-registro'; ?>" class="header__link">Administrar</a>

				<form class="header__form" method="POST" action="/logout">
					<input type="submit" value="Cerrar Sesión" class="header__submit">
				</form>
			<?php else : ?>
				<a href="/registro" class="header__link">Registro</a>
				<a href="/login" class="header__link">Iniciar Sesión</a>
			<?php endif; ?>
		</nav>

		<div class="header__content">
			<a href="/">
				<h1 class="header__logo">&#60;DevWebCamp /></h1>
			</a>

			<p class="header__text">Octubre 7 y 8 - 2023</p>
			<p class="header__text header__text--modality">En Línea - Presencial</p>

			<a href="/" class="header__button">Comprar Pase</a>
		</div>
	</div>
</header>

<div class="top_bar">
	<div class="top_bar__content">
		<a href="/">
			<h2 class="top_bar__logo">&#60;DevWebCamp/></h2>
		</a>

		<nav class="navbar">
			<a href="/devwebcamp" class="navbar__link <?php echo is_the_current_page('/devwebcamp') ? 'navbar__link--active' : '' ?>">Evento</a>
			<a href="/paquetes" class="navbar__link <?php echo is_the_current_page('/paquetes') ? 'navbar__link--active' : '' ?>">Paquetes</a>
			<a href="/workshops-conferencias" class="navbar__link <?php echo is_the_current_page('/workshops-conferencias') ? 'navbar__link--active' : '' ?>">Workshops / Conferencias</a>
			<a href="/registro" class="navbar__link <?php echo is_the_current_page('/registro') ? 'navbar__link--active' : '' ?>">Comprar Pase</a>
		</nav>
	</div>
</div>
