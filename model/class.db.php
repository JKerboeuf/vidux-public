<?php

class DbDriver
{
	// Settings
	private static $server = "localhost";
	private static $username = "vidux";
	private static $password = "vidux";
	private static $dbName = "vidux";

	// Properties
	private static $driver = null;
	private static $instance = null;

	// Construc/Destructors

	/**
	 * Private constructor to restrict on having only one unique instance of the db driver
	 */
	private function __construct()
	{
		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		DbDriver::$driver = new mysqli(
			DbDriver::$server,
			DbDriver::$username,
			DbDriver::$password,
			DbDriver::$dbName
		);
		if (DbDriver::$driver->connect_error) {
			die("Connection failed: " . DbDriver::$driver->connect_error);
		}
	}
	/**
	 * Destructor to close the connexion
	 */
	public function __destruct()
	{
		DbDriver::$driver->close();
		DbDriver::$instance = null;
	}
	/**
	 * Public getter on the unique instance of the db driver, creates it if non existant yet
	 *
	 * @return object The unique MySQLi database driver
	 */
	public static function getDb()
	{
		if (DbDriver::$instance == null) {
			DbDriver::$instance = new DbDriver();
		}
		return DbDriver::$instance;
	}

	// Methods

	/**
	 * Function to check if a user exist with the given password and email
	 *
	 * @param string $email The email of the user to check
	 * @param string $pwd The password of the user to check
	 * @return array Returns NULL or the row of the user if the parameters were correct
	 */
	public function CheckPwdEmail($email, $pwd)
	{
		$sql = "SELECT * FROM users WHERE password = SHA2(?, 256) AND LOWER(email) = LOWER(?)";

		$query = DbDriver::$driver->prepare($sql);
		$query->bind_param("ss", $pwd, $email);
		$query->execute();
		$result = $query->get_result();

		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$query->close();
			return $row;
		} else {
			$query->close();
			return null;
		}
	}

	/**
	 * Function to check if a user exist with the given password and user id
	 *
	 * @param string $id The email of the user to check
	 * @param string $pwd The password of the user to check
	 * @return array Returns NULL or the row of the user if the parameters were correct
	 */
	public function CheckPwdId($id, $pwd)
	{
		$sql = "SELECT * FROM users WHERE password = SHA2(?, 256) AND user_id = ?";

		$query = DbDriver::$driver->prepare($sql);
		$query->bind_param("si", $pwd, $id);
		$query->execute();
		$result = $query->get_result();

		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$query->close();
			return $row;
		} else {
			$query->close();
			return null;
		}
	}

	/**
	 * Function to modify the password of a user
	 *
	 * @param string $email The new email to set
	 * @param int $id The id of the user to modify
	 */
	public function updatePassword($pwd, $id)
	{
		$sql = "UPDATE users SET password = SHA2(?, 256) WHERE user_id = ?";

		$query = DbDriver::$driver->prepare($sql);
		DbDriver::$driver->begin_transaction();
		$query->bind_param("si", $pwd, $id);

		$query->execute();
		DbDriver::$driver->commit();
		$query->close();
	}

	/**
	 * Function to check if an email is already in use by a different user
	 *
	 * @param string $email The email to check if already existing
	 * @param int $id The id of a user to exclude from the search
	 * (if trying to modify a user without changing email)
	 * @return int The number of rows returned by the query
	 */
	public function checkEmail($email, $id = 0)
	{
		$sql = "SELECT user_id, email FROM users WHERE LOWER(email) = LOWER(?) AND user_id != ?";

		$query = DbDriver::$driver->prepare($sql);
		$query->bind_param("si", $email, $id);
		$query->execute();
		$result = $query->get_result();

		$query->close();
		return $result->num_rows;
	}

	/**
	 * Function to modify the email of a user
	 *
	 * @param string $email The new email to set
	 * @param int $id The id of the user to modify
	 */
	public function updateEmail($email, $id)
	{
		$sql = "UPDATE users SET email = ? WHERE user_id = ?";

		$query = DbDriver::$driver->prepare($sql);
		DbDriver::$driver->begin_transaction();
		$query->bind_param("si", $email, $id);

		$query->execute();
		DbDriver::$driver->commit();
		$query->close();
	}

	/**
	 * Function to delete a user from the database
	 *
	 * @param int $id The id of the user to delete
	 * @return bool TRUE if the deletion was successful, FALSE otherwise
	 */
	public function deleteUser($id)
	{
		$sql = "DELETE FROM users WHERE user_id = " . $id;

		$result = DbDriver::$driver->query($sql);

		return ($result === TRUE);
	}

	/**
	 * Function to modify a user from the database
	 *
	 * @param array $values The values to apply to the user,
	 * the array should contain the id, fullname, email, role_id, active
	 * and possibly the password if changes are wanted
	 */
	public function updateUser($values)
	{
		// Password is empty and should not be changed
		if (empty($values["password"])) {
			$sql = "UPDATE users SET fullname = ?, email = ?, role_id = ?, active = ? WHERE user_id = ?";
		} else {
			$sql = "UPDATE users SET fullname = ?, email = ?, password = SHA2(?, 256), role_id = ?, active = ? WHERE user_id = ?";
		}

		$query = DbDriver::$driver->prepare($sql);
		DbDriver::$driver->begin_transaction();
		if (empty($values["password"])) {
			$query->bind_param(
				"ssiis",
				$values["fullname"],
				$values["email"],
				$values["role_id"],
				$values["active"],
				$values["user_id"]
			);
		} else {
			$query->bind_param(
				"sssiis",
				$values["fullname"],
				$values["email"],
				$values["password"],
				$values["role_id"],
				$values["active"],
				$values["user_id"]
			);
		}

		$query->execute();
		DbDriver::$driver->commit();
		$query->close();
	}

	/**
	 * Function to add a user to the database
	 *
	 * @param array $values The values to apply to the user,
	 * the array should contain the id, fullname, email, password, role_id, active
	 */
	public function addUser($values)
	{
		$sql = "INSERT INTO users (fullname, email, password, role_id, active) VALUES (?, ?, SHA2(?, 256), ?, ?)";

		$query = DbDriver::$driver->prepare($sql);
		DbDriver::$driver->begin_transaction();
		$query->bind_param(
			"sssii",
			$values["fullname"],
			$values["email"],
			$values["password"],
			$values["role_id"],
			$values["active"]
		);

		$query->execute();
		DbDriver::$driver->commit();
		$query->close();
	}

	/**
	 * Function to get all users from the database
	 *
	 * @param function $rowHandler The function that will be used to treat the different users
	 * @return int The number of users found
	 */
	public function getUsers($rowHandler)
	{
		$sql = "SELECT u.user_id, u.fullname, u.email, r.role_id, r.role_name, u.active FROM users AS u JOIN roles AS r ON u.role_id = r.role_id ORDER BY user_id ASC";

		$result = DbDriver::$driver->query($sql);

		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$rowHandler($row);
			}
			return $result->num_rows;
		} else {
			return 0;
		}
	}

	/**
	 * Function to get all roles from the database
	 *
	 * @param function $rowHandler The function that will be used to treat the different roles
	 * @return int The number of roles found
	 */
	public function getRoles($rowHandler)
	{
		$sql = "SELECT * FROM roles ORDER BY role_id ASC";

		$result = DbDriver::$driver->query($sql);

		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$rowHandler($row);
			}
			return $result->num_rows;
		} else {
			return 0;
		}
	}

	/**
	 * Function to update sessions by checking if the values match with the database
	 *
	 * @param string $sId The session id to check
	 * @return NULL|1 NULL if the user is now inactive or if the session was terminated, returns 1 otherwise
	 */
	public function updateSession($sId)
	{
		$sql = 'SELECT u.user_id, u.fullname, u.email, u.role_id, u.active AS uActive, s.session_id, s.active
		FROM sessions AS s
		JOIN users AS u ON s.user_id = u.user_id
		WHERE s.active = 1
		AND s.session_id = ?';

		$query = DbDriver::$driver->prepare($sql);
		$query->bind_param("s", $sId);
		$query->execute();
		$result = $query->get_result();
		if ($result->num_rows == 0) {
			return NULL;
		}
		$row = $result->fetch_assoc();
		if ($row["uActive"] == 0) {
			return NULL;
		}
		foreach (array_keys(array_diff_assoc($_SESSION,$row)) as $key) {
			$_SESSION[$key] = $row[$key];
		}
		return 1;
	}

	/**
	 * Funtion to add a new session to the database
	 *
	 * @param string $sessionId The session id
	 * @param int $userId The user id
	 */
	public function insertSession($sessionId, $userId)
	{
		$sql = "INSERT INTO sessions (session_id, user_id) VALUES (?, ?)";

		$query = DbDriver::$driver->prepare($sql);
		DbDriver::$driver->begin_transaction();
		$query->bind_param("si", $sessionId, $userId);

		$query->execute();
		DbDriver::$driver->commit();
		$query->close();
	}

	/**
	 * Function to end an active session by setting the end date in the database
	 *
	 * @param string $sessionId The session id to end
	 */
	public function endSession($sessionId)
	{
		$sql = "UPDATE sessions SET end_date = NOW(), active = 0 WHERE session_id = ?";

		$query = DbDriver::$driver->prepare($sql);
		DbDriver::$driver->begin_transaction();
		$query->bind_param("s", $sessionId);

		$query->execute();
		DbDriver::$driver->commit();
		$query->close();
	}
}
