<?php global $langJson; ?>

<hr>
<li<?php setActiveLink('/users'); ?>>
	<a class="sb-link" href="/users">
		<i class="fa-solid fa-users-gear"></i>
		<?php echo $langJson->page_users; ?>
	</a>
</li>
<li<?php setActiveLink('/logs'); ?>>
	<a class="sb-link" href="/logs">
		<i class="fa-solid fa-list"></i>
		<?php echo $langJson->page_logs; ?>
	</a>
</li>