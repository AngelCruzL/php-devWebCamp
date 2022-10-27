<h2 class="dashboard__heading"><?php echo $pageTitle; ?></h2>

<div class="dashboard__containerButton">
	<a href="/admin/eventos/crear" class="dashboard__button">
		<i class="fa-solid fa-circle-plus"></i>
		Añadir Evento
	</a>
</div>

<div class="dashboard__container">
	<?php if (empty($events)) : ?>
		<p class="text-center">No Hay Eventos Aún</p>
	<?php else : ?>
		<table class="table">
			<thead class="table__thead">
				<tr>
					<th scope="col" class="table__th">Nombre</th>
					<th scope="col" class="table__th">Categoría</th>
					<th scope="col" class="table__th">Día y Hora</th>
					<th scope="col" class="table__th">Ponente</th>
					<th scope="col" class="table__th"></th>
				</tr>
			</thead>

			<tbody class="table__tbody">
				<?php foreach ($events as $event) : ?>
					<tr class="table__tr">
						<td class="table__td">
							<?php echo $event->name; ?>
						</td>

						<td class="table__td">
							<?php echo $event->category->name; ?>
						</td>

						<td class="table__td">
							<?php echo $event->day->name . ', ' . $event->hour->hour; ?>
						</td>

						<td class="table__td">
							<?php echo $event->speaker->first_name . ', ' . $event->speaker->last_name; ?>
						</td>

						<td class="table__td--actions">
							<a class="table__action table__action--edit" href="/admin/eventos/editar?id=<?php echo $event->id; ?>">
								<i class="fa-solid fa-pencil"></i>
								Editar
							</a>

							<form action="/admin/eventos/eliminar" method="POST" class="table__form">
								<input type="hidden" name="id" value="<?php echo $event->id; ?>">
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
