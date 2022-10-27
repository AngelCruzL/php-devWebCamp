(function () {
	const $speakersInput = document.querySelector('#speaker');

	if ($speakersInput) {
		const $speakerList = document.querySelector('#speaker-list');
		const $speakerHiddenInput = document.querySelector('[name="speaker_id"]');
		let speakers = [];
		let speakersFiltered = [];

		getSpeakers();

		$speakersInput.addEventListener('input', searchSpeakers);

		if ($speakerHiddenInput.value) {
			(async () => {
				const speaker = await getSpeakerById($speakerHiddenInput.value);
				const { first_name, last_name } = speaker;

				$speakerList.insertAdjacentHTML(
					'beforeend',
					`<li class="speaker-list__speaker is-selected">${first_name} ${last_name}</li>`
				);
			})();
		}

		async function getSpeakers() {
			const url = `/api/ponentes`;
			const response = await fetch(url);
			const data = await response.json();

			formatSpeakers(data);
		}

		async function getSpeakerById(id) {
			const url = `/api/ponente?id=${id}`;
			const response = await fetch(url);
			const data = await response.json();

			return data;
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
			} else {
				speakersFiltered = [];
			}

			showSpeakers();
		}

		function showSpeakers() {
			while ($speakerList.firstChild) {
				$speakerList.removeChild($speakerList.firstChild);
			}

			if (speakersFiltered.length > 0) {
				speakersFiltered.forEach(speaker => {
					const $speaker = document.createElement('li');
					$speaker.classList.add('speaker-list__speaker');
					$speaker.dataset.speakerId = speaker.id;
					$speaker.textContent = speaker.name;
					$speaker.onclick = selectSpeaker;

					$speakerList.appendChild($speaker);
				});
			} else {
				$speakerList.insertAdjacentHTML(
					'beforeend',
					`<p class='speaker-list__no-result'>No hay resultados para tu búsqueda</p>`
				);
			}
		}

		function selectSpeaker(e) {
			const $speaker = e.target;

			const $previousSelectedSpeaker = document.querySelector(
				'.speaker-list__speaker.is-selected'
			);
			if ($previousSelectedSpeaker)
				$previousSelectedSpeaker.classList.remove('is-selected');

			$speaker.classList.add('is-selected');

			$speakerHiddenInput.value = $speaker.dataset.speakerId;
		}
	}
})();
