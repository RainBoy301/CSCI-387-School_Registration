<?php

//require account to access database
require_once('/home/bqhoang/DBHoang.php');

class Database {

	private static $mysqli = null;

	public function __construct() {
		die('Init function error');
	}

	//connect to database on turing using account from DBHoang.php
	public static function dbConnect() {
		try {
			$mysqli = new PDO('mysql:host='.DBHOST.';dbname='.DBNAME,USERNAME,PASSWORD);
			echo "<div class='row'>";
			echo "<div data-alert class='alert-box info round'>";
			echo "Successful Connected to Database. Delete this message in database.php";
			echo "</div>";
			echo "</div>";
		} catch ( PDOEXCEPTION $Exception ) {
			echo "Could not Connect";
		}

		return $mysqli;
	}

	public static function dbDisconnect() {
		$mysqli = null;
	}
}
?>
