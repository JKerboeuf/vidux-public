<?php

/**
 * Function to set the 'active' class to the correct element
 * from the sidedbar
 * @param string $btnUrl The url of the link
 */
function setActiveLink($btnUrl)
{
	global $request;

	if ($request == $btnUrl) {
		echo ' class="active"';
	}
}

/**
 * Function to add the admin buttons to the sidebar under the user dropdown if current user has admin rights.
 */
function addAdminNav()
{
	if ($_SESSION["role_id"] <= 2) {
		include 'view/templates/t_sidebar_admin.php';
	}
}

include 'view/templates/t_sidebar.php';
