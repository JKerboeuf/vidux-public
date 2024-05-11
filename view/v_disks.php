<body>
	<main>
		<!-- Sidebar -->
		<?php include 'controller/c_sidebar.php'; ?>
		<!-- Main container -->
		<div class="main-container">
			<div class="main-window big-window">
				<ul class="nav nav-pills nav-fill" id="myTab" role="tablist">
					<li class="nav-item h3" role="presentation">
						<button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#add-tab-pane" type="button" role="tab">
							<i class="fa-solid fa-plus"></i>Add
						</button>
					</li>
					<li class="nav-item h3" role="presentation">
						<button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#list-tab-pane" type="button" role="tab">
							<i class="fa-solid fa-table-list"></i>List
						</button>
					</li>
				</ul>
				<div class="tab-content mt-3" id="myTabContent">
					<div class="tab-pane show active" id="add-tab-pane" role="tabpanel" tabindex="0">
						<form class="row">
							<div class="col-6">
								<div class="row g-3">
									<h3 class="col-12">Rack</h3>
									<div class="col-4">
										<label for="inputEmail4" class="form-label">IP</label>
										<input type="text" class="form-control" id="inputEmail4">
									</div>
									<div class="col-5">
										<label for="inputPassword4" class="form-label">UUID</label>
										<input type="text" class="form-control" id="inputPassword4">
									</div>
									<div class="col-3">
										<label for="inputAddress" class="form-label">Boot time</label>
										<input type="text" class="form-control" id="inputAddress">
									</div>
								</div>
							</div>
							<div class="col-6">
								<div class="row g-3">
									<h3 class="col-12">Disks</h3>
									<div class="col-12">
										<label for="inputAddress2" class="form-label">Serial number</label>
										<input type="text" class="form-control" id="inputAddress2">
									</div>
									<div class="col-md-6">
										<label for="inputCity" class="form-label">Days</label>
										<input type="text" class="form-control" id="inputCity">
									</div>
									<div class="col-md-4">
										<label for="inputCity" class="form-label">Max temperature</label>
										<input type="text" class="form-control" id="inputCity">
									</div>
									<div class="col-md-2">
										<label for="inputZip" class="form-label">Health</label>
										<input type="text" class="form-control" id="inputZip">
									</div>
									<div class="col-12">
										<button type="submit" class="btn btn-primary">Confirm</button>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="tab-pane" id="list-tab-pane" role="tabpanel" tabindex="0">
						<div class="row h-100 g-0 overflow-visible">
							<div class="col-4 h-100 overflow-auto">
								<select class="form-select mx-auto w-75" name="rack">
									<option value="none">Choose a computer...</option>
									<option value="1">ordi 1</option>
									<option value="2">ordi 2</option>
									<option value="3">ordi 3</option>
								</select>
								<ul class="d-flex flex-column list-unstyled h-100 mb-0">
									<li class="disk-item">disk 1</li>
									<li class="disk-item">disk 2</li>
									<li class="disk-item">disk 3</li>
									<li class="disk-item">disk 4</li>
									<li class="disk-item">disk 5</li>
									<li class="disk-item">disk 6</li>
									<li class="disk-item">disk 7</li>
									<li class="disk-item">disk 8</li>
									<li class="disk-item">disk 9</li>
								</ul>
							</div>
							<div class="col-8">
								<div class="h-25 p-1">
									<i class="fa-solid fa-computer"></i>
									<h4>boot uuid</h4>
									<h4>boot time</h4>
									<h4>ip address</h4>
									<h4>description</h4>
								</div>
								<div class="h-75 p-1 inner-shadow-top">
									<i class="fa-solid fa-hard-drive"></i>
									<h4>disk model</h4>
									<h4>serial number</h4>
									<h4>total size</h4>
									<h4>max temp</h4>
									<h4>power on time</h4>
									<h4>health</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
</body>

</html>