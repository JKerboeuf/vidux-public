<?php global $langJson; ?>

<div class="dropdown">
	<a class="dropdown-toggle sb-link" id="dropdownUser" href="#" data-bs-toggle="dropdown">
		<i class="fa-solid fa-user"></i>
		<?php echo $langJson->hello; ?> <strong><?php echo $_SESSION["fullname"] ?></strong>
	</a>
	<ul class="dropdown-menu">
		<li<?php setActiveLink('/profile'); ?>>
			<a class="dropdown-item" href="/profile">
				<i class="fa-solid fa-address-card"></i>
				<?php echo $langJson->page_profile; ?>
			</a>
		</li>
		<li>
			<hr class="dropdown-divider">
		</li>
		<li>
			<a class="dropdown-item" href="/logout">
				<i class="fa-solid fa-right-from-bracket"></i>
				<?php echo $langJson->signout; ?>
			</a>
		</li>
	</ul>
</div>
