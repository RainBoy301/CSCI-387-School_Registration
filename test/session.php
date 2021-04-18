<?php

	//to start the previous existing session
	session_start();

	//$_SESSION is a build in variable, where it stores data of current session
	function message() {
		if (isset($_SESSION["message"])) {

			$output = "<div class='row'>";
			$output .= "<div data-alert class='alert-box info round'>";
			// Convert all applicable characters to HTML entities
			$output .= htmlentities($_SESSION["message"]);

			$output .= "</div>";
			$output .= "</div>";

			// clear message after use
			$_SESSION["message"] = null;

			return $output;
		}
		else {
			return null;
		}
	}

	function errors() {
		if (isset($_SESSION["errors"])) {
			$errors = $_SESSION["errors"];

			// clear message after use
			$_SESSION["errors"] = null;

			return $errors;
		}
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////

	function verify_login() {
		if(!isset($_SESSION["admin_id"])&& $_SESSION["admin_id"] === NULL) {
			$_SESSION["message"] = "You must login in first!";
			header("Location: login.php");
			exit;
		}
	}

///////////////////////////////////////////////////////////////////////////////////////////////////

?>
