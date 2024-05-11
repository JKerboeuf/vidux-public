<?php
/**
 * Function to add the admin buttons to the sidebar under the user dropdown if current user has admin rights.
 */
function addAdminCards()
{
	if ($_SESSION["role_id"] <= 2)
	{
		include 'view/templates/t_homepage_admin.php';
	}
}

/**
 * Function to count the cards to show on the home page based on if the user is admin or not
 *
 * @return int The number of items to show
 */
function setCardCountClass()
{
	if ($_SESSION["role_id"] <= 2)
	{
		return 6;
	}
	else
	{
		return 4;
	}
}

include 'view/v_home.php';
