<main class="register">
	<h2 class="register__heading"><?php echo $pageTitle; ?></h2>
	<p class="register__description">Elige tu plan</p>

	<div class="packs__grid">
		<div class="pack">
			<div>
				<h3 class="pack__name">Pase Gratis</h3>
				<ul class="pack__list">
					<li class="pack__element">Acceso Virtual a DevWebCamp</li>
				</ul>
			</div>

			<p class="pack__price">$0</p>

			<form action="/finalizar-registro/gratis" method="POST">
				<input type="submit" class="packs__submit" value="Inscripción Gratuita">
			</form>
		</div>

		<div class="pack">
			<div>
				<h3 class="pack__name">Pase Presencial</h3>
				<ul class="pack__list">
					<li class="pack__element">Acceso Presencial a DevWebCamp</li>
					<li class="pack__element">Pase por 2 Dias</li>
					<li class="pack__element">Acceso a talleres y conferencias</li>
					<li class="pack__element">Acceso a las grabaciones</li>
					<li class="pack__element">Camisa del Evento</li>
					<li class="pack__element">Comida y Bebida</li>
				</ul>
			</div>

			<p class="pack__price">$199</p>

			<div id="smart-button-container">
				<div style="text-align: center;">
					<div id="paypal-button-container"></div>
				</div>
			</div>
		</div>

		<div class="pack">
			<div>
				<h3 class="pack__name">Pase Virtual</h3>
				<ul class="pack__list">
					<li class="pack__element">Acceso Virtual a DevWebCamp</li>
					<li class="pack__element">Pase por 2 Dias</li>
					<li class="pack__element">Acceso a talleres y conferencias</li>
					<li class="pack__element">Acceso a las grabaciones</li>
				</ul>
			</div>

			<p class="pack__price">$49</p>
		</div>
	</div>
</main>

<script src="https://www.paypal.com/sdk/js?client-id=ATqhbGgwck38z3M6m34WB7I7eS8WQ6jjZ3El_4ZepLq0nQi70oV4f15gCNj7vhh_OaT3-iQ2Z2sgfPZI&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
<script>
	function initPayPalButton() {
		paypal.Buttons({
			style: {
				shape: 'rect',
				color: 'blue',
				layout: 'vertical',
				label: 'pay',

			},

			createOrder: function(data, actions) {
				return actions.order.create({
					purchase_units: [{
						"description": "1",
						"amount": {
							"currency_code": "USD",
							"value": 199
						}
					}]
				});
			},

			onApprove: function(data, actions) {
				return actions.order.capture().then(function(orderData) {
					const data = new FormData();
					data.append('pack_id', orderData.purchase_units[0].description);
					data.append('payment_id', orderData.purchase_units[0].payments.captures[0].id);

					fetch('/finalizar-registro/pagar', {
							method: 'POST',
							body: data
						})
						.then(response => response.json())
						.then(result => {
							if (result.result) {
								actions.redirect('http://localhost:3000/finalizar-registro/conferencias');
							}
						})
				});
			},

			onError: function(err) {
				console.log(err);
			}
		}).render('#paypal-button-container');
	}
	initPayPalButton();
</script>
