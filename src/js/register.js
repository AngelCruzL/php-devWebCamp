import Swal from 'sweetalert2';

(function () {
	let events = [];
	const $registerResume = document.querySelector('#register-resume');

	if ($registerResume) {
		const $eventsButtons = document.querySelectorAll('.event__add');

		$eventsButtons.forEach(button =>
			button.addEventListener('click', selectEvent)
		);

		function selectEvent({ target }) {
			if (events.length < 5) {
				target.disabled = true;
				events = [
					...events,
					{
						id: target.dataset.id,
						name: target.parentElement.querySelector('.event__name')
							.textContent,
					},
				];

				renderEvents();
			} else {
				Swal.fire({
					title: 'Error',
					text: 'Máximo 5 eventos por registro',
					icon: 'error',
					confirmButtonText: 'OK',
				});
			}
		}

		function renderEvents() {
			cleanEvents();

			if (events.length > 0) {
				events.forEach(({ name, id }) => {
					const $event = document.createElement('div');
					$event.classList.add('register__event');

					const $title = document.createElement('h3');
					$title.classList.add('register__title');
					$title.textContent = name;

					const $removeBtn = document.createElement('button');
					$removeBtn.classList.add('register__remove');
					$removeBtn.innerHTML = '<i class="fa-solid fa-trash"></i>';
					$removeBtn.onclick = () => deleteEvent(id);

					$event.appendChild($title);
					$event.appendChild($removeBtn);
					$registerResume.appendChild($event);
				});
			}
		}

		function deleteEvent(id) {
			events = events.filter(event => event.id !== id);

			const $addBtn = document.querySelector(`[data-id="${id}"]`);
			$addBtn.disabled = false;

			renderEvents();
		}

		function cleanEvents() {
			while ($registerResume.firstChild) {
				$registerResume.removeChild($registerResume.firstChild);
			}
		}
	}
})();
