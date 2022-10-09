<aside class="dashboard__sidebar">
	<nav class="dashboard__menu">
		<a href="/admin/dashboard" class="dashboard__link <?php echo get_current_page('/dashboard') ? 'dashboard__link--current' : ''; ?>">
			<i class="fa-solid fa-house dashboard__icon"></i>
			<span class="dashboard__menuText">Inicio</span>
		</a>

		<a href="/admin/ponentes" class="dashboard__link <?php echo get_current_page('/ponentes') ? 'dashboard__link--current' : ''; ?>">
			<i class="fa-solid fa-microphone dashboard__icon"></i>
			<span class="dashboard__menuText">Ponentes</span>
		</a>

		<a href="/admin/eventos" class="dashboard__link <?php echo get_current_page('/eventos') ? 'dashboard__link--current' : ''; ?>">
			<i class="fa-solid fa-calendar dashboard__icon"></i>
			<span class="dashboard__menuText">Eventos</span>
		</a>

		<a href="/admin/registrados" class="dashboard__link <?php echo get_current_page('/registrados') ? 'dashboard__link--current' : ''; ?>">
			<i class="fa-solid fa-users dashboard__icon"></i>
			<span class="dashboard__menuText">Registrados</span>
		</a>

		<a href="/admin/regalos" class="dashboard__link <?php echo get_current_page('/regalos') ? 'dashboard__link--current' : ''; ?>">
			<i class="fa-solid fa-gift dashboard__icon"></i>
			<span class="dashboard__menuText">Regalos</span>
		</a>
	</nav>
</aside>
