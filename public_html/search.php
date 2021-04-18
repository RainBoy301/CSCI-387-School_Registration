<?php
require_once("session.php");
require_once("functions.php");
require_once('/home/group14/DataBase387.php');
	$mysqli = new PDO('mysql:host='.DBHOST.';dbname='.DBNAME,USERNAME,PASSWORD);
  $mysqli -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



	//if (isset($_GET['input'])){
	$return_arr = array();

	try {
			$input = '%'.$_GET['input'].'%';
      $query = "SELECT * FROM Student WHERE advisorID = ? AND First_Name LIKE ? ";
      $stmt = $mysqli -> prepare($query);
	    $stmt->execute([$_SESSION['id'],$input]);

	    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	        $return_arr[] =  "".$row['First_Name']." " .$row['Last_Name']."" ;
	    }

	} catch(PDOException $e) {
	    echo 'ERROR: ' . $e->getMessage();
	}


    /* Toss back results as json encoded array. */
    echo json_encode($return_arr);
//}


?>
