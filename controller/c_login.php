<?php

$email = empty($_POST["email"]) ? "" : sanitize($_POST["email"]);

// A form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// User is trying to login
	if ($_POST["form-action"] == "login") {
		global $langJson;
		$password = empty($_POST["password"]) ? "" : sanitize($_POST["password"]);
		$emailForgot = empty($_POST["email-forgot"]) ? "" : sanitize($_POST["email-forgot"]);
		$resultUser = $db->CheckPwdEmail($email, $password);

		// No user found with sent email/password
		if ($resultUser == null) {
			$toast = new Toast('error', $langJson->toast_login_incorrect);
			$toast->show();
		}
		// User was found but is inactive
		else if ($resultUser["active"] == 0) {
			$toast = new Toast('error', $langJson->toast_login_inactive);
			$toast->show();
		}
		// User was found, initiate session and redirect to home page
		else {
			$_SESSION["user_id"] = $resultUser["user_id"];
			$_SESSION["fullname"] = $resultUser["fullname"];
			$_SESSION["email"] = $resultUser["email"];
			$_SESSION["role_id"] = $resultUser["role_id"];
			$db->insertSession(session_id(), $_SESSION["user_id"]);
			header("location: /");
		}
	}
	// User is requesting a new password
	else if ($_POST["form-action"] == "forgot") {
		
	}
}

include 'view/v_login.php';
