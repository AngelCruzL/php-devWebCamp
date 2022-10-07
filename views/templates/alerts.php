<?php
foreach ($alerts as $type => $alert) {
	foreach ($alert as $message) {
?>
		<div class="alert alert__<?php echo $type ?>"><?php echo $message; ?></div>
<?php
	}
}
