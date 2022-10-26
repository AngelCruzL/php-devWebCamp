(function () {
	const $speakersInput = document.querySelector('#speaker');

	if ($speakersInput) {
		let speakers = [];
		let speakersFiltered = [];

		getSpeakers();

		$speakersInput.addEventListener('input', searchSpeakers);

		async function getSpeakers() {
			const url = `/api/ponentes`;
			const response = await fetch(url);
			const data = await response.json();

			formatSpeakers(data);
		}

		function formatSpeakers(speakersList) {
			speakers = speakersList.map(speaker => {
				return {
					id: speaker.id,
					name: `${speaker.first_name.trim()} ${speaker.last_name.trim()}`,
				};
			});
		}

		function searchSpeakers(e) {
			const search = e.target.value;

			if (search.length > 3) {
				const regex = new RegExp(search, 'i');
				speakersFiltered = speakers.filter(speaker => {
					if (speaker.name.toLowerCase().search(regex) != -1) {
						return speaker;
					}
				});

				console.log(speakersFiltered);
			}
		}
	}
})();
