<?php
/**
 * @var int $errorCode The error code,
 * used to display the appropriate messages for each code
 */
$errorCode = filter_input(INPUT_GET, 'e', FILTER_SANITIZE_URL);

// Error switch to get correct error description
switch ($errorCode) {
	case '403':
		$errorText = $langJson->error_403_desc;
		break;
	default:
		$errorCode = '404';
		$errorText = $langJson->error_404_desc;
		break;
}

include 'view/v_error.php';
