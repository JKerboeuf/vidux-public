<body>
	<main>
		<!-- Sidebar -->
		<?php include 'controller/c_sidebar.php'; ?>
		<!-- Main container -->
		<div class="main-container home-container items-<?php echo setCardCountClass() ?>">
			<a class="page-card" href="/disks">
				<div class="pc-container">
					<i class="fa-solid fa-hard-drive pc-image"></i>
					<h3><?php echo $langJson->page_disks; ?></h3>
					<button class="btn btn-primary">GO <i class="fa-solid fa-right-long"></i></button>
				</div>
			</a>
			<a class="page-card" href="/cameras">
				<div class="pc-container">
					<i class="fa-solid fa-video pc-image"></i>
					<h3><?php echo $langJson->page_cameras; ?></h3>
					<button class="btn btn-primary">GO <i class="fa-solid fa-right-long"></i></button>
				</div>
			</a>
			<a class="page-card" href="/productions">
				<div class="pc-container">
					<i class="fa-solid fa-hammer pc-image"></i>
					<h3><?php echo $langJson->page_productions; ?></h3>
					<button class="btn btn-primary">GO <i class="fa-solid fa-right-long"></i></button>
				</div>
			</a>
			<a class="page-card" href="/services">
				<div class="pc-container">
					<i class="fa-solid fa-screwdriver-wrench pc-image"></i>
					<h3><?php echo $langJson->page_services; ?></h3>
					<button class="btn btn-primary">GO <i class="fa-solid fa-right-long"></i></button>
				</div>
			</a>
			<?php addAdminCards(); ?>
		</div>
	</main>
</body>

</html>