<body>
	<main>
		<!-- Sidebar -->
		<?php include 'controller/c_sidebar.php'; ?>
		<!-- Main container -->
		<div class="main-container">
			<div class="main-window profile-window">
				<h1 class="mb-0"><?php echo $_SESSION["fullname"] ?></h1>
				<h3 class="mb-4"><?php echo $_SESSION["email"] ?></h3>
				<button class="btn btn-primary my-2 w-100" id="btn-new-mail" onClick="switchForm('mail')">
					<i class="fa-solid fa-envelope"></i>
					<?php echo $langJson->btn_change_email; ?>
				</button>
				<!-- New mail form -->
				<form class="needs-validation d-none" id="frm-new-mail" method="post" novalidate>
					<div class="row">
						<div class="col form-floating">
							<input class="form-control" id="frm-mail" name="email" type="email" placeholder="name@example.com" required>
							<label class="ms-2" for="frm-mail"><?php echo $langJson->fld_mail_new; ?></label>
						</div>
					</div>
					<div class="row btns-cancel-confirm mt-2">
						<button class="btn btn-secondary" type="reset" onClick="switchForm('mail')">
							<i class="fa-solid fa-xmark"></i>
							<?php echo $langJson->btn_cancel; ?>
						</button>
						<button class="btn btn-primary" name="form-action" type="submit" value="change-email">
							<i class="fa-solid fa-check"></i>
							<?php echo $langJson->btn_confirm; ?>
						</button>
					</div>
				</form>
				<button class="btn btn-primary my-2 w-100" id="btn-new-pwd" onClick="switchForm('pwd')">
					<i class="fa-solid fa-key"></i>
					<?php echo $langJson->btn_change_pwd; ?>
				</button>
				<!-- New password form -->
				<form class="needs-validation d-none" id="frm-new-pwd" method="post" novalidate>
					<div class="row">
						<div class="col form-floating">
							<input class="form-control" id="frm-pwd" name="pwd-current" type="password" placeholder="Password" required>
							<label class="ms-2" for="frm-pwd"><?php echo $langJson->fld_pwd_old; ?></label>
						</div>
					</div>
					<div class="row mt-2">
						<div class="col form-floating">
							<input class="form-control" id="frm-pwd-new" name="pwd-new" type="password" placeholder="Password" required>
							<label class="ms-2" for="frm-pwd-new"><?php echo $langJson->fld_pwd_new; ?></label>
						</div>
					</div>
					<!--<div class="row mt-2">
						<div class="col form-floating">
							<input class="form-control" id="frm-pwd-again" name="pwd-new-again" type="password" placeholder="Password" required>
							<label class="ms-2" for="frm-pwd-again"><?php echo $langJson->fld_pwd_again; ?></label>
						</div>
					</div>-->
					<div class="row btns-cancel-confirm mt-2">
						<button class="btn btn-secondary" type="reset" onClick="switchForm('pwd')">
							<i class="fa-solid fa-xmark"></i>
							<?php echo $langJson->btn_cancel; ?>
						</button>
						<button class="btn btn-primary" type="submit" name="form-action" value="change-pwd">
							<i class="fa-solid fa-check"></i>
							<?php echo $langJson->btn_confirm; ?>
						</button>
					</div>
				</form>
			</div>
		</div>
		<!-- Toast container -->
		<div class="toast-container" id="toast-container">
			<?php include 'view/templates/t_toast.php'; ?>
		</div>
	</main>
	<!-- Scripts -->
	<script src="assets/js/form.js"></script>
	<script src="assets/js/profile.js"></script>
</body>

</html>