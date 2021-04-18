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

      $query = "SELECT * FROM admins WHERE username = ? LIMIT 1";
      $stmt = $mysqli -> prepare($query);
      $stmt -> execute([$_POST["username"]]);
      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      if($stmt) {  //Check if we have a username in database

        if(password_check($_POST["password"], $row["hashed_password"])){ //Check password on that username
          $_SESSION["username"] = $_POST["username"];
          $_SESSION["admin_id"] = $row["id"];
          redirect("in.html");
        }else{ // If password does not match
          $_SESSION["message"] = "Username/Password could not be found";
          redirect ("login.php");
        }

      }else{ // If username does not exist in database
        $_SESSION["message"] = "Username/Password could not be found";
        redirect ("login.php");
        }


      }else{ // If username/ password are empty
				$_SESSION["message"] = "Please log in first";
				redirect ("login.php");
			}
  }

?>
<body class="container" >
<center>
  <h1 class="logo-text">Login</h1>

  <form action="login.php" method="post">
    <table>
      <tr>
      <td>Username:</td>
      <td><input type="text" name="username"></td>
      </tr>
      <tr>
      <td>Password:</td>
      <td><input type="text" name="password"></td>
      </tr>
    </table>

    <button type="submit" name="submit"> Login</button>
		<a href="addLogin.php">Add User</a>
	</form>
</center>
</body>

<?php

new_footer("CSCI_387 Team");
$stmt -> close();
Database::dbDisconnect();


 ?>
