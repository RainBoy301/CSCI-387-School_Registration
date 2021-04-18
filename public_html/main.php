<?php
require_once("session.php");
require_once("functions.php");
require_once("database.php");
new_header("Login");


$mysqli = Database::dbConnect();
$mysqli -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (($output = message()) !== null) {
		echo $output;
	}

  if (isset($_POST["submit"])) {
    if (isset($_POST["username"]) && $_POST["password"] !== ""){

      $query = "SELECT * FROM Users WHERE username = ? LIMIT 1";
      $stmt = $mysqli -> prepare($query);
      $stmt -> execute([$_POST["username"]]);
      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      if($stmt) {  //Check if we have a username in database

        if(password_check($_POST["password"], $row["hashed_password"])){ //Check password on that username

				//	$_SESSION["username"] = $_POST["username"];
					//Store the ID of the one who log in so we can pull their data
					$_SESSION["id"] = $row["userID"];

						if($row["userType"]=='S'){
							redirect("student.php");
						}
						else if ($row["userType"]=='I'){
							redirect("instructor.php");
						}
						else{
							redirect("admin.html");
						}

        }else{ // If password does not match
          $_SESSION["message"] = "Username/Password could not be found";
          redirect ("main.php");
        }

      }else{ // If username does not exist in database
        $_SESSION["message"] = "Username/Password could not be found";
        redirect ("main.php");
        }


      }else{ // If username/ password are empty
				$_SESSION["message"] = "Please log in first";
				redirect ("main.php");
			}
  }

?>
<body class="container" >
<center>

<div id = formLocation>
  <h1 class="logo-text"><div id="logo-text">Login</div></h1>



  <form action="main.php" method="post">
    <table>
      <tr>
      <td>Username:</td>
      <td><input type="text" name="username"></td>
      </tr>
      <tr>
      <td>Password:</td>
      <td><input type="password" name="password"></td>
      </tr>
    </table>

	<div id="buttonLocation">
		<button id ="add-user" type ="button">Add User</button>
	    <button type="submit" id="Submit" name="submit"> Login</button>
		
	</div>

	</form>

</div>
</center>
</body>

<?php

new_footer("CSCI_387 Team");
$stmt -> close();
Database::dbDisconnect();


 ?>
