<body>
	<main>
		<!-- Add user modal -->
		<div class="modal fade" id="addUserModal" tabindex="-1">
			<div class="modal-dialog modal-fullscreen-sm-down">
				<form class="needs-validation modal-content" id="addUserForm" method="post" novalidate>
					<div class="modal-header">
						<h2 class="modal-title"><?php echo $langJson->user_add; ?></h2>
						<button class="btn-close" type="reset" data-bs-dismiss="modal"></button>
					</div>
					<div class="modal-body">
						<div class="row mb-4 px-2">
							<label for="nameNew"><?php echo $langJson->fld_name; ?></label>
							<input class="form-control" id="nameNew" name="fullname" type="text" required>
							<label for="emailNew"><?php echo $langJson->fld_mail; ?></label>
							<input class="form-control" id="emailNew" name="email" type="email" required>
						</div>
						<div class="row mb-4 px-2">
							<label for="pwdNew"><?php echo $langJson->fld_pwd; ?></label>
							<input class="form-control" id="pwdNew" name="password" type="password" required>
							<!--<label for="pwdAgainNew"><?php echo $langJson->fld_pwd_again; ?></label>
							<input class="form-control" id="pwdAgainNew" name="password_again" type="password" required>-->
						</div>
						<div class="row">
							<div class="col">
								<label class="ps-2" for="roleNew"><?php echo $langJson->fld_role; ?></label>
								<select class="form-select" id="roleNew" name="role_id" required>
									<?php printRoles(); ?>
								</select>
							</div>
							<div class="col">
								<label for="activeNew"><?php echo $langJson->fld_activated; ?></label>
								<div class="pt-1">
									<div class="form-check form-check-inline">
										<input class="form-check-input" id="activeNewYes" name="active" type="radio" value="1" checked>
										<label class="form-check-label" for="inlineRadio1"><?php echo $langJson->yes; ?></label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" id="activeNewNo" name="active" type="radio" value="0">
										<label class="form-check-label" for="inlineRadio2"><?php echo $langJson->no; ?></label>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer justify-content-between">
						<button class="btn btn-secondary" type="reset" data-bs-dismiss="modal">
							<i class="fa-solid fa-xmark"></i>
							<?php echo $langJson->btn_cancel; ?>
						</button>
						<button class="btn btn-primary" name="form-action" type="submit" value="add-user">
							<i class="fa-solid fa-check"></i>
							<?php echo $langJson->btn_confirm; ?>
						</button>
					</div>
				</form>
			</div>
		</div>
		<!-- Modify user modal -->
		<div class="modal fade" id="modUserModal" tabindex="-2">
			<div class="modal-dialog modal-fullscreen-sm-down">
				<form class="needs-validation modal-content" id="modUserForm" method="post" novalidate>
					<div class="modal-header">
						<h2 class="modal-title"><?php echo $langJson->user_modify; ?></h2>
						<button class="btn-close" type="reset" data-bs-dismiss="modal"></button>
					</div>
					<div class="modal-body">
						<input class="d-none" id="idMod" name="user_id" type="number" readonly></input>
						<div class="row mb-4 px-2">
							<label for="nameNew"><?php echo $langJson->fld_name; ?></label>
							<input class="form-control" id="nameMod" name="fullname" type="text" required>
							<label for="emailNew"><?php echo $langJson->fld_mail; ?></label>
							<input class="form-control" id="emailMod" name="email" type="email" required>
						</div>
						<div class="row mb-4 px-2">
							<label for="pwdNew"><?php echo $langJson->fld_pwd_new; ?></label>
							<input class="form-control" id="pwdNew" name="password" type="password">
							<!--<label for="pwdAgainNew"><?php echo $langJson->fld_pwd_again; ?></label>
							<input class="form-control" id="pwdAgainNew" name="password_again" type="password">-->
						</div>
						<div class="row">
							<div class="col">
								<label class="ps-2" for="roleMod"><?php echo $langJson->fld_role; ?></label>
								<select class="form-select" id="roleMod" name="role_id" required>
									<?php printRoles(); ?>
								</select>
							</div>
							<div class="col">
								<label for="activeMod"><?php echo $langJson->fld_activated; ?></label>
								<div class="pt-1">
									<div class="form-check form-check-inline">
										<input class="form-check-input" id="activeModYes" name="active" type="radio" value="1" checked>
										<label class="form-check-label" for="inlineRadio1"><?php echo $langJson->yes; ?></label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" id="activeModNo" name="active" type="radio" value="0">
										<label class="form-check-label" for="inlineRadio2"><?php echo $langJson->no; ?></label>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer justify-content-between">
						<button class="btn btn-secondary" type="reset" data-bs-dismiss="modal">
							<i class="fa-solid fa-xmark"></i>
							<?php echo $langJson->btn_cancel; ?>
						</button>
						<button class="btn btn-primary" name="form-action" type="submit" value="mod-user">
							<i class="fa-solid fa-check"></i>
							<?php echo $langJson->btn_confirm; ?>
						</button>
					</div>
				</form>
			</div>
		</div>
		<!-- Delete confirmation modal -->
		<div class="modal fade" id="delUserModal" tabindex="-3">
			<div class="modal-dialog modal-fullscreen-sm-down">
				<form class="modal-content" id="delUserForm" method="post" novalidate>
					<div class="modal-header">
						<h2 class="modal-title"><?php echo $langJson->user_delete; ?></h2>
						<button class="btn-close" type="reset" data-bs-dismiss="modal"></button>
					</div>
					<div class="modal-body">
						<input class="d-none" id="idDel" name="user_id" type="number" readonly></input>
						<p>Are you sure you want to delete this user ?</p>
					</div>
					<div class="modal-footer justify-content-between">
						<button class="btn btn-secondary" type="reset" data-bs-dismiss="modal">
							<i class="fa-solid fa-xmark"></i>
							<?php echo $langJson->btn_cancel; ?>
						</button>
						<button class="btn btn-danger" name="form-action" type="submit" value="del-user">
							<i class="fa-solid fa-trash-can"></i>
							<?php echo $langJson->btn_confirm; ?>
						</button>
					</div>
				</form>
			</div>
		</div>
		<!-- Sidebar -->
		<?php include './controller/c_sidebar.php'; ?>
		<!-- Main container -->
		<div class="main-container">
			<div class="main-window big-window">
				<div class="d-flex justify-content-between mb-2">
					<button class="btn btn-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#filterCollapse">
						<i class="fa-solid fa-filter"></i>
						<?php echo $langJson->btn_filter; ?>
					</button>
					<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addUserModal">
						<?php echo $langJson->user_add; ?>
						<i class="fa-solid fa-user-plus"></i>
					</button>
				</div>
				<!-- Collapsable filters -->
				<form class="row collapse mb-4" id="filterCollapse">
					<div class="col-2">
						<label for="idSearch">Id</label>
						<input class="form-control" id="idSearch" type="number" min="1">
					</div>
					<div class="col-6">
						<label for="nameSearch"><?php echo $langJson->fld_name_mail; ?></label>
						<input class="form-control" id="nameSeaerch" type="text">
					</div>
					<div class="col-2">
						<label for="roleSelect"><?php echo $langJson->fld_role; ?></label>
						<select class="form-select" id="roleSelect">
							<option selected></option>
							<?php printRoles(); ?>
						</select>
					</div>
					<div class="col-2">
						<label for="activeCheck"><?php echo $langJson->fld_active; ?></label>
						<select class="form-select" id="roleSelect">
							<option selected></option>
							<option><?php echo $langJson->fld_active; ?></option>
							<option><?php echo $langJson->fld_inactive; ?></option>
						</select>
					</div>
				</form>
				<!-- Users table -->
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th scope="col">Id</th>
							<th scope="col"><?php echo $langJson->fld_name; ?></th>
							<th scope="col"><?php echo $langJson->fld_mail; ?></th>
							<th scope="col"><?php echo $langJson->fld_role; ?></th>
							<th scope="col" class="text-center"><?php echo $langJson->fld_active; ?></th>
							<th scope="col" class="text-center"><?php echo $langJson->btn_modify; ?></th>
						</tr>
					</thead>
					<tbody class="table-group-divider">
						<?php printUsers(); ?>
					</tbody>
				</table>
			</div>
		</div>
		<!-- Toast container -->
		<div class="toast-container" id="toast-container">
			<?php include 'view/templates/t_toast.php'; ?>
		</div>
	</main>
	<!-- Scripts -->
	<script src="assets/js/form.js"></script>
	<script src="assets/js/users.js"></script>
</body>