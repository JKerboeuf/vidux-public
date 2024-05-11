<?php
// Required classes
require_once 'model/class.db.php';
require_once 'model/class.lang.php';
require_once 'model/class.toast.php';

/**
 * Function to filter out any unwanted character in inputs
 * it helps to prevent certain attacks
 *
 * @param string $data the input to verify
 * @return string the input sanitized
 */
function sanitize($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function terminateSession() {
	DbDriver::getDb()->endSession(session_id());
	session_unset();
	session_regenerate_id(true);
}

/**
 * Function to get the path of requested URL
 * @return string The URI path of a request
 */
function getBaseURI()
{
	$basePath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
	$uri = substr(rawurldecode($_SERVER['REQUEST_URI']), strlen($basePath));

	if (strstr($uri, '?')) {
		$uri = substr($uri, 0, strpos($uri, '?'));
	}
	return '/' . trim($uri, '/');
}

global $request;
global $langJson;
$request = getBaseURI();
$langPath = Lang::getLangFile();
$langJson = Lang::readLangJson($langPath);

$db = DbDriver::getDb();
session_start();

// Check if session was remotely terminated & update session values
if ($db->updateSession(session_id()) == NULL) {
	terminateSession();
}

// Check if user_id exists, which means a user is connected
if (isset($_SESSION["user_id"]) && !empty($_SESSION["user_id"])) {
	require_once 'view/templates/t_head.php';
	switch ($request) {
		case '':
		case '/':
			require './controller/c_home.php';
			break;
		case '/logout':
			// Signing out, session is cleared and regenerated
			terminateSession();
			require './controller/c_login.php';
			break;
		case '/disks':
			require './controller/c_disks.php';
			break;
		case '/cameras':
			require './controller/c_cameras.php';
			break;
		case '/productions':
			require 'controller/c_productions.php';
			break;
		case '/services':
			require './controller/c_services.php';
			break;
		case '/profile':
			require './controller/c_profile.php';
			break;
		case '/users':
			// Check if user has enough permission to see this page
			if ($_SESSION["role_id"] <= 2) {
				require './controller/c_users.php';
			} else {
				header("location: /error?e=403");
			}
			break;
		case '/logs':
			// Check if user has enough permission to see this page
			if ($_SESSION["role_id"] <= 2) {
				require './controller/c_logs.php';
			} else {
				header("location: /error?e=403");
			}
			break;
		default:
			// The page requested does not exist
			require './controller/c_error.php';
	}
}
// If not connected, user is redirected to login page
else {
	if ($request != "/login") {
		header("location: /login");
	}
	require_once 'view/templates/t_head.php';
	require './controller/c_login.php';
}
