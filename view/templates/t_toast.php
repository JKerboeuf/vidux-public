<div class="toast toast-<?php echo $toast->type ?><?php echo $toast->show ?>" role="alert">
	<div class="toast-header">
		<i class="fa-solid fa-<?php echo $toast->icon ?>"></i>
		<strong><?php echo $toast->title ?></strong>
		<button class="btn-close" type="button" data-bs-dismiss="toast"></button>
	</div>
	<hr>
	<div class="toast-body">
		<?php echo $toast->message ?>
	</div>
</div>