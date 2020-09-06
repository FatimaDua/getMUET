<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project-GetMUET</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <form action="projectregister.php" method="post" style="border:1px solid #ccc">
        <div class="container">
          <div class="row">
               <div class = "col-md-3"> </div>
                <div class="col-md-6">
                  <h1 class= "center">Register your project</h1> <hr>

                    <label for="name"><b>Name</b></label>
                    <input type="text" placeholder="Enter your Name" name="name" required>

                    <label for="roll"><b>Roll Number</b></label>
                    <input type="text" placeholder="Enter Roll Number" name="roll" required>

                    <label for="project"><b>Project Title</b></label>
                    <input type="text" placeholder="Enter project name" name="projectname" required>
                
                    <label for="repoLink"><b>GitHub</b></label>
                    
                        <i class="fa fa-github" style="font-size:20px"></i>
                
                    <input type="text" placeholder="Enter GitHub Repository Link" name="repoLink" required>

                    <label for="subject"> <b>Subject</b></label>
                    <input type="text" placeholder="Enter the subject for the project" id="subject" name="subject" required >

                    <label for="teacher"> <b>Teacher</b></label>
                    <input type="text" placeholder = "Enter the teacher"  id="teacher" name="teacher" required >

                    <textarea name="description" id="" cols="75" rows="3" placeholder="Enter the description for the project"></textarea>
                
                    <div><button type="submit" class="signupbtn button">Submit</button></div>
                </div>
                <div class ="col-md-3"></div>
          </div>
        </div>
      </form>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=$_POST['name'];
    $roll=$_POST['roll'];
    $projectname=$_POST['projectname'];
    $repoLink=$_POST['repoLink'];
    $subject=$_POST['subject'];
    $teacher=$_POST['teacher'];
    $description=$_POST['description'];

    $bool = true;

    $mysqli= new mysqli("localhost","root","","project") or die(mysql_error()); //Connect to server and database
    $query = $mysqli->query("Select * from preg"); //Query the users table

    while($row = $query->fetch_assoc()) //display all rows from query
	{
		$table_projects_name = $row['projectname']; // the first username row is passed on to $table_users, and so on until the query is finished
		if($projectname == $table_projects_name) // checks if there are any matching fields
		{
			$bool = false; // sets bool to false
			Print '<script> alert("Project Name has been taken!"); </script>'; //Prompts the user
			Print '<script> window.location.assign("projectregister.php"); </script>'; // redirects to register.php
		}
  }
	if($bool) // checks if bool is true
	{
		$mysqli->query("INSERT INTO preg (name, roll_num, pname, repoLink, psubject, pteacher, pdescription, pdate) VALUES ('$name', '$roll', '$projectname', '$repoLink', '$subject', '$teacher', '$description', current_timestamp())"); //Inserts the value to table users
    Print '<script> alert("Successfully Registered!"); </script>'; // Prompts the user
		Print '<script> window.location.assign("home.php"); </script>'; // redirects to register.php
  } 
}
?>
<script src="app.js"> </script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src=" js/bootstrap.min.js"> </script>
</body>
</html>