<?php

/**
 * Function to set the 'active' class to the correct element
 * from the language dropdown
 *
 * @param string $btnLang The language linked to the button
 * @param string $langPath The path to the locale file to check if correct
 */
function setActiveLang($btnLang, $langPath)
{
	if (substr($langPath, 0, strpos($langPath, '.')) == $btnLang) {
		echo ' class="active"';
	}
}

// Check the page to choose the appropriate language switcher
switch ($request) {
	case '/':
	case '/disks':
	case '/cameras':
	case '/productions':
	case '/services':
	case '/users':
	case '/logs':
	case '/profile':
		include 'view/templates/t_lang_sidebar.php';
		break;
	default:
		include 'view/templates/t_lang_floating.php';
		break;
}
