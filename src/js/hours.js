(function () {
	const $hours = document.querySelector('#hours');
	if (!$hours) return;

	const search = {
		category_id: '',
		day: '',
	};

	const $days = document.querySelectorAll('[name="day"]');
	const $category = document.querySelector('[name="category_id"]');
	const $inputDayHidden = document.querySelector('[name="day_id"]');

	$category.addEventListener('change', searchTerm);
	$days.forEach($day => $day.addEventListener('change', searchTerm));

	function searchTerm(e) {
		search[e.target.name] = e.target.value;
		console.log(search);
	}
})();
