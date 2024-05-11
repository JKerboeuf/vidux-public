<div class="dropdown lang-floating">
	<button class="dropdown-toggle btn btn-primary" id="dropdownLang" data-bs-toggle="dropdown">
		<i class="fa-solid fa-earth-europe"></i>
	</button>
	<ul class="dropdown-menu">
		<li<?php setActiveLang('hu', $langPath) ?>>
			<a class="dropdown-item" href="?l=hu">
				<span class="fi fi-hu"></span>
				Magyar
			</a>
		</li>
		<li<?php setActiveLang('en', $langPath) ?>>
			<a class="dropdown-item" href="?l=en">
				<span class="fi fi-gb"></span>
				English
			</a>
		</li>
		<li<?php setActiveLang('fr', $langPath) ?>>
			<a class="dropdown-item" href="?l=fr">
				<span class="fi fi-fr"></span>
				Français
			</a>
		</li>
	</ul>
</div>
