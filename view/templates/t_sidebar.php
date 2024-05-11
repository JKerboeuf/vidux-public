<div class="sidebar">
	<div class="sb-header">
		<a class="sb-link sb-toggler d-none" href="#">
			<i class="fa-solid fa-angle-left"></i>
		</a>
		<a class="sb-link sb-title" href="/">
			<img src="assets/img/logo.svg" alt="Vidux">
			<h1>Vidux</h1>
		</a>
	</div>
	<hr>
	<ul class="nav sb-nav">
		<li<?php setActiveLink('/disks'); ?>>
			<a class="sb-link" href="/disks">
				<i class="fa-solid fa-hard-drive"></i>
				<?php echo $langJson->page_disks; ?>
			</a>
		</li>
		<li<?php setActiveLink('/cameras'); ?>>
			<a class="sb-link" href="/cameras">
				<i class="fa-solid fa-video"></i>
				<?php echo $langJson->page_cameras; ?>
			</a>
		</li>
		<li<?php setActiveLink('/productions'); ?>>
			<a class="sb-link" href="/productions">
				<i class="fa-solid fa-box-open"></i>
				<?php echo $langJson->page_productions; ?>
			</a>
		</li>
		<li<?php setActiveLink('/services'); ?>>
			<a class="sb-link" href="/services">
				<i class="fa-solid fa-screwdriver-wrench"></i>
				<?php echo $langJson->page_services; ?>
			</a>
		</li>
		<?php addAdminNav(); ?>
	</ul>
	<hr>
	<?php include './controller/c_lang.php'; ?>
	<hr class="invisible">
	<?php include './view/templates/t_sidebar_user.php'; ?>
</div>