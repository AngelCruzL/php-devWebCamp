(function () {
	const $hours = document.querySelector('#hours');
	if (!$hours) return;

	const $days = document.querySelectorAll('[name="day"]');
	const $category = document.querySelector('[name="category_id"]');
	const $inputHiddenDay = document.querySelector('[name="day_id"]');
	const $inputHiddenHour = document.querySelector('[name="hour_id"]');

	const search = {
		category_id: +$category.value || '',
		day: +$inputHiddenDay.value || '',
	};

	if (!Object.values(search).includes('')) {
		(async () => {
			await searchEvents();

			const id = $inputHiddenHour.value;
			const $selectedHour = document.querySelector(`[data-hour-id="${id}"]`);

			$selectedHour.classList.remove('hours__hour--disabled');
			$selectedHour.classList.add('hours__hour--selected');

			$selectedHour.onclick = selectHour;
		})();
	}

	$category.addEventListener('change', searchTerm);
	$days.forEach($day => $day.addEventListener('change', searchTerm));

	function searchTerm(e) {
		search[e.target.name] = e.target.value;

		$inputHiddenHour.value = '';
		$inputHiddenDay.value = '';
		resetPreviousSelectedHour();

		if (Object.values(search).includes('')) return;

		searchEvents();
	}

	async function searchEvents() {
		const { day, category_id } = search;
		const url = `/api/horarios-eventos?day_id=${day}&category_id=${category_id}`;
		const response = await fetch(url);
		const events = await response.json();

		getAvailableHours(events);
	}

	function getAvailableHours(events) {
		const $hours = document.querySelectorAll('#hours li');
		$hours.forEach($hour => $hour.classList.add('hours__hour--disabled'));

		const takenHours = events.map(event => event.hour_id);
		const result = Array.from($hours).filter(
			$hour => !takenHours.includes($hour.dataset.hourId)
		);
		result.forEach(hour => hour.classList.remove('hours__hour--disabled'));

		addEventListenerToAvailableHours();
	}

	function addEventListenerToAvailableHours() {
		const $availableHours = document.querySelectorAll(
			'#hours li:not(.hours__hour--disabled)'
		);
		$availableHours.forEach($hour =>
			$hour.addEventListener('click', selectHour)
		);
	}

	function selectHour(e) {
		resetPreviousSelectedHour();

		if (e.target.classList.contains('hours__hour--disabled')) return;

		e.target.classList.add('hours__hour--selected');
		$inputHiddenHour.value = e.target.dataset.hourId;

		$inputHiddenDay.value = document.querySelector(
			'[name="day"]:checked'
		).value;
	}

	function resetPreviousSelectedHour() {
		const $prevSelectedHour = document.querySelector('.hours__hour--selected');
		if ($prevSelectedHour)
			$prevSelectedHour.classList.remove('hours__hour--selected');
	}
})();
