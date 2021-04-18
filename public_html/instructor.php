<html class ="Instructor">
<?php
require_once("session.php");
require_once("functions.php");
require_once("database.php");

  $mysqli = Database::dbConnect();
  $mysqli -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $query = "SELECT * FROM Instructor WHERE InstructorID = ? LIMIT 1";
  $stmt = $mysqli -> prepare($query);
  $stmt -> execute([$_SESSION["id"]]);

  $row = $stmt->fetch(PDO::FETCH_ASSOC);

?>



<head>
    <meta charset="utf-8">
    <title>Instructor</title>
     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheets/instructor.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 

</head>
<body>
<center>
  <?php
	echo"<h1 class='Instructor-Name'>".$row["First_Name"]."  ".$row["Last_Name"]."</h1>";
	echo"<h2 class='Instructor-ID'>ID:  ".$_SESSION["id"]."</h2>";
  ?>

  <div class="Instructor-Info">
	    <label for="Instructor-Info">Student Info</label>
      <input type="button" id="showinfo" value="Show" onclick="infoShow()">
      <input type="button" id="hideinfo" value="Hide" onclick="infoHide()">
  </div>
  <div id="Instructor-Information" src="">
    <?php
      $query2 = "SELECT * FROM Student where advisorID = ?";
      $stmt2 = $mysqli -> prepare($query2);
      $stmt2 -> execute([$_SESSION["id"]]);
        while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
          echo "<ul><a href='www.something.com'>".$row2['First_Name']."  ".$row2['Last_Name']."</a></ul>";
    }
    ?>


  </div>
	<div class="Search"></div>
			<label>Student Search</label>--
      <input id="search-input" type="text" name="Student-Search" placeholder="Student Search..." value="" class ="auto">



      <input type="button" name="answer" value="Search" onclick="searchFunction()" />

		</div>
		<div id="StudentSearch" src="">
			<ul class="Student-Name">



			</ul>
		</div>
	</div>
  <div class="Course"   >
		<div class="Courser-Info" >
	    <label for="Course-Info">Course Info</label>
	    <select id="Course-Info" name="courses-display" class="Course-control" name="Info">
	      <option value="Enrolled">Current</option>
	      <option value="Favorite">Next</option>


		</select>
		<input type="button" id="show" value="Show" onclick="courseInfoShow()">
		<input type="button" id="hide" value="Hide" onclick="courseInfoHide()">

	</div>
			    <div id="Courses" src="">

	    	<ul class="Course-Name">

				<div><input id="course-Item" type="checkbox" value="testing CKbox"><label for="course-Item">Course 1</label></div>
				<div><input id="course-Item" type="checkbox" value="testing CKbox"><label for="course-Item">Course 2</label></div>


	    	</ul>
	    </div>
		<button>Add</button>
		<button>Drop</button>
		<button>Finalize</button>
	</div>
</center>

<footer>

</footer>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="Javascript/instruct.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
    <script type="text/javascript">
    $(function() {
      $('.auto').autocomplete({
        source: function (request, response) {
         $.ajax({
             url: "https://turing.cs.olemiss.edu/~group14/search.php",
             data: { input: request.term },
             dataType: "json",
             success: response,
             error: function () {
                 response([]);
                  }
                });
              }
            });
        });
         </script>



</body>



</html>
