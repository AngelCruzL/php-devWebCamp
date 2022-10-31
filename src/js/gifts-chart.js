(function () {
	const $giftsChart = document.getElementById('gifts-chart');

	if ($giftsChart) {
		getData();

		async function getData() {
			const url = '/api/regalos';
			const response = await fetch(url);
			const giftsData = await response.json();

			const data = {
				labels: giftsData.map(({ name }) => name),
				datasets: [
					{
						label: 'My First Dataset',
						data: giftsData.map(({ total }) => total),
						backgroundColor: [
							'#ea580c',
							'#84cc16',
							'#22d3ee',
							'#a855f7',
							'#ef4444',
							'#14b8a6',
							'#db2777',
							'#e11d48',
							'#7e22ce',
						],
					},
				],
			};

			const config = {
				type: 'bar',
				data: data,
				options: {
					scales: {
						y: {
							beginAtZero: true,
						},
					},
					plugins: {
						legend: {
							display: false,
						},
					},
				},
			};

			const myChart = new Chart($giftsChart, config);
		}
	}
})();
