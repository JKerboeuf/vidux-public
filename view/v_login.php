<body class="d-flex main-container">
	<!-- Floating lang container -->
	<?php include 'controller/c_lang.php'; ?>
	<!-- Main window -->
	<div class="main-window justify-content-center w-50">
		<div class="row">
			<div class="col-md">
				<img class="w-100 h-100" src="assets/img/logo_anim.svg" alt="vidux logo">
			</div>
			<!-- Login form -->
			<form class="needs-validation col-md" id="login-form" method="post" novalidate>
				<h3 class="text-center my-2"><?php echo $langJson->welcome; ?></h3>
				<div class="has-validation input-group my-2">
					<span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
					<div class="form-floating">
						<input class="form-control" id="frm-email" name="email" type="email" value="<?php echo $email; ?>" placeholder="name@example.com" required autofocus>
						<label for="frm-mail"><?php echo $langJson->fld_mail; ?></label>
					</div>
				</div>
				<div class="has-validation input-group my-2">
					<span class="input-group-text"><i class="fa-solid fa-key"></i></span>
					<div class="form-floating">
						<input class="form-control" id="frm-pwd" name="password" type="password" placeholder="password" required>
						<label for="frm-pwd"><?php echo $langJson->fld_pwd; ?></label>
					</div>
				</div>
				<button class="btn btn-primary w-100" name="form-action" type="submit" value="login">
					<?php echo $langJson->signin; ?>
				</button>
				<!--<div class="text-center pt-3">
					<button class="btn btn-link" type="reset" onclick="switchForm()">
						<?php echo $langJson->forgot_pwd; ?>
					</button>
				</div>-->
			</form>
			<!-- Forgot pwd form -->
			<form class="needs-validation col-md d-none" id="forgot-form" method="post" novalidate>
				<h3 class="text-center my-2"><?php echo $langJson->forgot_pwd_title; ?></h3>
				<p><?php echo $langJson->forgot_pwd_desc; ?></p>
				<div class="has-validation input-group my-2">
					<span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
					<div class="form-floating">
						<input class="form-control" id="frm-mail-forgot" name="email" type="email" placeholder="name@example.com" required>
						<label for="frm-mail-forgot"><?php echo $langJson->fld_mail; ?></label>
					</div>
				</div>
				<button class="btn btn-primary w-100" name="form-action" type="submit" value="forgot">
					<?php echo $langJson->forgot_pwd_btn; ?>
				</button>
				<div class="text-center pt-3">
					<button class="btn btn-link" type="reset" onclick="switchForm()">
						<?php echo $langJson->forgot_pwd_back; ?>
					</button>
				</div>
			</form>
		</div>
	</div>
	<!-- Toast container -->
	<div class="toast-container" id="toast-container">
		<?php include 'view/templates/t_toast.php'; ?>
	</div>
	<!-- Scripts -->
	<script src="assets/js/form.js"></script>
	<script src="assets/js/login.js"></script>
</body>

</html>