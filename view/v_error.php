<body class="d-flex main-container">
	<!-- Floating lang container -->
	<?php include 'controller/c_lang.php'; ?>
	<!-- Main window -->
	<div class="main-window justify-content-center w-50 py-4 m-auto">
		<div class="row">
			<div class="col-md text-center">
				<img class="w-75 h-100" src="assets/img/logo_anim.svg" alt="vidux logo">
			</div>
			<div class="col-md">
				<h1><?php echo $errorCode; ?></h1>
				<h3><?php echo $langJson->error_title; ?></h3>
				<p><?php echo $errorText; ?></p>
			</div>
		</div>
	</div>
</body>

</html>