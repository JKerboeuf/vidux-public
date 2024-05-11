<?php

// A form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	global $langJson;
	$id = $_SESSION["user_id"];

	// User is changing email
	if ($_POST["form-action"] == "change-email") {
		$email = empty($_POST["email"]) ? "" : sanitize($_POST["email"]);

		// Check if new email is not the current one
		if ($_SESSION["email"] == $email) {
			$toast = new Toast('warning', $langJson->toast_no_changes);
			$toast->show();
		}
		// Check if email is available
		else if ($db->checkEmail($email, $id) == 0) {
			$db->updateEmail($email, $id);
			$toast = new Toast('success', $langJson->toast_email_modified);
			$toast->show();
		}
		// Email was found in the database
		else {
			$toast = new Toast('error', $langJson->toast_email_duplicate);
			$toast->show();
		}
	}
	// User is changing password
	else if ($_POST["form-action"] == "change-pwd") {
		$pwd = empty($_POST["pwd-current"]) ? "" : sanitize($_POST["pwd-current"]);
		$newPwd = empty($_POST["pwd-new"]) ? "" : sanitize($_POST["pwd-new"]);

		// Check if current password is correct
		if ($db->CheckPwdId($id, $pwd) != NULL) {
			$db->updatePassword($newPwd, $id);
			$toast = new Toast('success', $langJson->toast_pwd_modified);
			$toast->show();
		}
		// Provided password is wrong
		else {
			$toast = new Toast('error', $langJson->toast_login_incorrect);
			$toast->show();
		}
	}
}

include 'view/v_profile.php';
