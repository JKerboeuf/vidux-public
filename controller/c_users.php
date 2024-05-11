<?php

/**
 * Function to print a line for a single user inside of the table element
 *
 * @param array $row The row returned from the SQL querry on users table
 */
function printUserLine($row) {
	$activeAttr = $row["active"] == 1 ? ' checked' : '';
	$concatInfos =	$row["user_id"] . ";" . 
					$row["fullname"] . ";" . 
					$row["email"] . ";" . 
					$row["role_id"] . ";" . 
					$row["active"];

	$html = '<tr>
		<th scope="row">' . $row["user_id"] . '</th>
		<td>' . $row["fullname"] . '</td>
		<td>' . $row["email"] . '</td>
		<td>' . $row["role_name"] . '</td>
		<td class="text-center">
			<input class="form-check-input" type="checkbox" onclick="return false;"' . $activeAttr . '>
		</td>
		<td class="text-center">
			<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modUserModal" data-bs-infos="' . $concatInfos . '">
				<i class="fa-solid fa-tools"></i>
			</button>
			<button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delUserModal" data-bs-infos="' . $row["user_id"] . '">
				<i class="fa-solid fa-trash-can"></i>
			</button>
		</td>
	</tr>';

	echo $html;
}

/**
 * Function to print an option element for a single role inside of the select element
 *
 * @param array $row The row returned by the SQL querry on roles table
 */
function printRoleOption($row) {
	$html = '<option value="' . $row["role_id"] . '">' . $row["role_name"] . '</option>';

	echo $html;
}

/**
 * Function to fill the users table with appropriate line handler
 */
function printUsers() {
	global $langJson;
	$db = DbDriver::getDb();

	if ($db->getUsers('printUserLine') == 0) {
		$toast = new Toast('error', $langJson->toast_query_empty);
		$toast->show();
	}
}

/**
 * Function to fill the roles select with appropriate line handler
 */
function printRoles() {
	global $langJson;
	$db = DbDriver::getDb();

	if ($db->getRoles('printRoleOption') == 0) {
		$toast = new Toast('error', $langJson->toast_query_empty);
		$toast->show();
	}
}

// A form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	global $langJson;
	$values = array(
		"user_id" => isset($_POST["user_id"]) ? sanitize($_POST["user_id"]) : "",
		"fullname" => isset($_POST["fullname"]) ? sanitize($_POST["fullname"]) : "",
		"email" => isset($_POST["email"]) ? sanitize($_POST["email"]) : "",
		"password" => isset($_POST["password"]) ? sanitize($_POST["password"]) : "",
		"role_id" => isset($_POST["role_id"]) ? sanitize($_POST["role_id"]) : "",
		"active" => isset($_POST["active"]) ? sanitize($_POST["active"]) : ""
	);

	// User is adding a new user
	if ($_POST["form-action"] == "add-user") {
		// Email is not already used
		if ($db->checkEmail($values["email"]) == 0) {
			$db->addUser($values);
			$toast = new Toast('success', $langJson->toast_user_added);
			$toast->show();
		}
		// Email was found in the database
		else {
			$toast = new Toast('error', $langJson->toast_email_duplicate);
			$toast->show();
		}
	}
	// User is modifying a user
	else if ($_POST["form-action"] == "mod-user") {
		// Email is not already used
		if ($db->checkEmail($values["email"], $values["user_id"]) == 0) {
			$db->updateUser($values);
			$toast = new Toast('success', $langJson->toast_user_modified);
			$toast->show();
		}
		// Email was found in the database
		else {
			$toast = new Toast('error', $langJson->toast_email_duplicate);
			$toast->show();
		}
	}
	// User is deleting a user
	else if ($_POST["form-action"] == "del-user") {
		if ($db->deleteUser($values["user_id"]) === TRUE) {
			$toast = new Toast('success', $langJson->toast_user_deleted);
		} else {
			$toast = new Toast('error', $langJson->toast_user_failed);
		}
		$toast->show();
	}
}

include 'view/v_users.php';
