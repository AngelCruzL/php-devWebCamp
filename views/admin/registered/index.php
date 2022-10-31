<h2 class="dashboard__heading"><?php echo $pageTitle; ?></h2>

<div class="dashboard__containerButton">
	<a href="/admin/ponentes/crear" class="dashboard__button">
		<i class="fa-solid fa-circle-plus"></i>
		Añadir Ponente
	</a>
</div>

<div class="dashboard__container">
	<?php if (empty($registers)) : ?>
		<p class="text-center">No Hay Ponentes Aún</p>
	<?php else : ?>
		<table class="table">
			<thead class="table__thead">
				<tr>
					<th scope="col" class="table__th">Nombre</th>
					<th scope="col" class="table__th">Email</th>
					<th scope="col" class="table__th">Plan</th>
				</tr>
			</thead>

			<tbody class="table__tbody">
				<?php foreach ($registers as $register) : ?>
					<tr class="table__tr">
						<td class="table__td">
							<?php echo $register->user->first_name . " " . $register->user->last_name; ?>
						</td>

						<td class="table__td">
							<?php echo $register->user->email; ?>
						</td>

						<td class="table__td">
							<?php echo $register->pack->name; ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	<?php endif; ?>
</div>

<?php echo $pagination; ?>
