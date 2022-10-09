(function () {
	const $tagsInput = document.getElementById('tags_input');
	const $tags = document.getElementById('tags');
	const $tagsInputHidden = document.querySelector('[name="tags"]');
	let tags = [];

	if ($tagsInputHidden.value !== '') {
		tags = $tagsInputHidden.value.split(',');
		showTags();
	}

	if ($tagsInput) $tagsInput.addEventListener('keypress', saveTags);

	function saveTags(e) {
		if (e.keyCode === 44) {
			if (e.target.value.trim() === '' || e.target.value < 1) return;

			e.preventDefault();
			tags = [...tags, e.target.value.trim()];
			$tagsInput.value = '';

			showTags();
		}
	}

	function showTags() {
		$tags.textContent = '';
		tags.forEach(tag => {
			const $tag = document.createElement('li');
			$tag.classList.add('form__tag');
			$tag.textContent = tag;
			$tag.ondblclick = removeTag;
			$tags.appendChild($tag);
		});

		updateTagsInputHidden();
	}

	function removeTag(e) {
		e.target.remove();
		tags = tags.filter(tag => tag !== e.target.textContent);
		updateTagsInputHidden();
	}

	function updateTagsInputHidden() {
		$tagsInputHidden.value = tags.toString();
	}
})();
