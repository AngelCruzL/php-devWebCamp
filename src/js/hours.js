(function () {
	const $hours = document.querySelector('#hours');
	if (!$hours) return;

	const search = {
		category_id: '',
		day: '',
	};

	const $days = document.querySelectorAll('[name="day"]');
	const $category = document.querySelector('[name="category_id"]');
	const $inputHiddenDay = document.querySelector('[name="day_id"]');
	const $inputHiddenHour = document.querySelector('[name="hour_id"]');

	$category.addEventListener('change', searchTerm);
	$days.forEach($day => $day.addEventListener('change', searchTerm));

	function searchTerm(e) {
		search[e.target.name] = e.target.value;
		if (Object.values(search).includes('')) return;

		searchEvents();
	}

	async function searchEvents() {
		const { day, category_id } = search;
		const url = `/api/horarios-eventos?day_id=${day}&category_id=${category_id}`;
		const response = await fetch(url);
		const data = await response.json();

		getAvailableHours();
	}

	function getAvailableHours() {
		const $hours = document.querySelectorAll('#hours li');
		$hours.forEach($hour => $hour.addEventListener('click', selectHour));
	}

	function selectHour(e) {
		$inputHiddenHour.value = e.target.dataset.hourId;
	}
})();
