<?php


	require_once("session.php");
	require_once("functions.php");
	require_once("database.php");


    echo "<link rel='stylesheet' href='stylesheets/styles.css'>";
	$mysqli = Database::dbConnect();
	$mysqli -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	if (($output = message()) !== null) {
		echo $output;
	}

new_header("Add Users 387");
	if (($output = message()) !== null) {
		echo $output;
	}
 ///////////////////////////////////////////////////////////////////////////////////////////////
 			//Adding User function
if (isset($_POST["submit"])) {
	if (isset($_POST["username"]) && $_POST["password"] !== ""){
		$password = password_encrypt($_POST["password"]);


		$query = "SELECT * FROM Users WHERE userName = ?";


		$stmt = $mysqli -> prepare($query);
		$stmt -> execute([$_POST["username"]]);
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if($row > 0) {  //Check if this username already exists in database
			$_SESSION["message"] = "The username already exists";
			redirect("addLogin.php");
		}

		else{ //If username does not exist, we start adding this username
			//We must stop foreign key check because userID is refering to a non-existence Student or Instructor
			// In the future, we must also create a student or instructor who inherists the userID that just created
			$query = "SET FOREIGN_KEY_CHECKS = 0;
								INSERT INTO Users (userName, hashed_password, userType) VALUES (?,?,?);
								SET FOREIGN_KEY_CHECKS = 1;";
			$stmt = $mysqli -> prepare($query);

			$stmt -> execute([$_POST["username"], $password, $_POST["usertype"]]);

			if($stmt) {
				$_SESSION["message"] = "User successfully created";
			}
			else {
				$_SESSION["message"] = "User could not be created";
			}
		redirect("addLogin.php");
		}

	}else{
			$_SESSION["message"] = "Please fill in all data";
			redirect ("addLogin.php");
	}
}


////////////////////////////////////////////////////////////////////////////////////////////////
?>



		<h1 class = "logo-text">Add Users to 387!</h1>
<!--/////////////////////////////////////////////////////////////////////////////////////////////// -->
		<!-- FORM INPUT -->
<center>
	<form action="addLogin.php" method="post" background-color="white">
		<table>
			<tr>

			<tr>
			<td>Username:</td>
			<td><input type="text" name="username" value=""></td>
			</tr>
			<tr>
			<td>Password:</td>
			<td><input type="password" name="password" value=""></td>
			</tr>
			<tr>
				<td>User Type:</td>
				<td>
					<select class="dropdown" name="usertype">
					<option value="S">Student</option>
					<option value="I">Instructor</option>
					<option value="A">Admin</option>
				</select>
			</td>
			</tr>
		</table>
		<button type="submit" name="submit"> Add</button>
	</form>
</center>

<!--///////////////////////////////////////////////////////////////////////////////////////////////// -->
		<!-- A list of all current Users -->
			<p><br /><br /><hr />
			<h1 class = "logo-text">Current User</h1>

	<?php
	$query ="SELECT * from Users";
	$stmt = $mysqli -> prepare($query);
	$stmt -> execute();

	if ($stmt) {
		echo "<div class='row'>";
		echo "<center>";
		echo "<table>";
		echo "<thead>";
		//echo "<tr><th>Current Users</th><th></th></tr>";
		echo "</thead>";
		echo "<tbody>";
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			echo "<tr><td>".$row["userName"]."</td>";

			echo "<td><a href='deleteLogin.php?id=".urlencode($row[id])."' onclick='return confirm('Are you sure you want to delete?')'>Delete</a></td>";
			echo "</tr>";
	}
		echo "  </tbody>";
		echo "</table>";
		echo "</center>";
		echo "</div>";
	}
	echo "<br /><button id = 'back' type = 'button'>Back to main page</button>";
	?>
<!--//////////////////////////////////////////////////////////////////////////////////////////////// -->

	</div>
	</label>

<?php
new_footer("Bao Hoang");
$stmt -> close();
Database::dbDisconnect();
?>
