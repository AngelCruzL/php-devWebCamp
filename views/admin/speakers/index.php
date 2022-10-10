<h2 class="dashboard__heading"><?php echo $pageTitle; ?></h2>

<div class="dashboard__containerButton">
	<a href="/admin/ponentes/crear" class="dashboard__button">
		<i class="fa-solid fa-circle-plus"></i>
		Añadir Ponente
	</a>
</div>

<div class="dashboard__container">
	<?php if (empty($speakers)) : ?>
		<p class="text-center">No Hay Ponentes Aún</p>
	<?php else : ?>
		<table class="table">
			<thead class="table__thead">
				<tr>
					<th scope="col" class="table__th">Nombre</th>
					<th scope="col" class="table__th">Ubicación</th>
					<th scope="col" class="table__th"></th>
				</tr>
			</thead>

			<tbody class="table__tbody">
				<?php foreach ($speakers as $speaker) : ?>
					<tr class="table__tr">
						<td class="table__td">
							<?php echo $speaker->first_name . " " . $speaker->last_name; ?>
						</td>

						<td class="table__td">
							<?php echo $speaker->city . ", " . $speaker->country; ?>
						</td>

						<td class="table__td--actions">
							<a class="table__action table__action--edit" href="/admin/ponentes/editar?id=<?php echo $speaker->id; ?>">
								<i class="fa-solid fa-user-pen"></i>
								Editar
							</a>

							<form action="/admin/ponentes/eliminar" method="POST" class="table__form">
								<input type="hidden" name="id" value="<?php echo $speaker->id; ?>">
								<button class="table__action table__action--delete" type="submit">
									<i class="fa-solid fa-circle-xmark"></i>
									Eliminar
								</button>
							</form>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	<?php endif; ?>
</div>

<?php echo $pagination; ?>
