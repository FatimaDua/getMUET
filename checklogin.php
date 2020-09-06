<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
     <link rel="stylesheet" href="style.css">
     <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>    
    <form action="checklogin.php" method="post" style="border:1px solid #ccc">
        <div class="container">
          <div class="row">
               <div class = "col-md-3"> </div>
                <div class="col-md-6">
                <p class="center"> New to GetMUET? <a href="register.php">Sign Up</a> </p>
                    <h1 class= "center">Sign In to GetMuet</h1> <hr>
                    
                    <label for="email"><b>Email</b></label>
                    <input type="text" placeholder="Enter Email" name="username" required>
                
                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="password" required>
                
                    <label>
                    <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
                    </label>
                
                    <div class="clearfix">
                    <button type="submit" class="signupbtn button">Sign In</button>
                    </div>
                </div>
                <div class ="col-md-3"></div>
          </div>
        </div>
      </form>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
  $mysqli = new mysqli("localhost","root","","project");  //Connect to server and database
	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];


	$query = $mysqli->query("SELECT * from users WHERE username='$username'"); //Query the users table if there are matching rows equal to $username
  // search for this mysql_num_rows
  $exists = mysqli_num_rows($query); //Checks if username exists
	$table_users = "";
	$table_password = "";
	if($exists > 0) //IF there are no returning rows or no existing username
	{
		while($row = $query->fetch_assoc()) //display all rows from query
		{
			$table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
			$table_password = $row['password']; // the first password row is passed on to $table_users, and so on until the query is finished
		}
		if(($username == $table_users) && ($password == $table_password)) // checks if there are any matching fields
		{
				if($password == $table_password)
				{
					$_SESSION['user'] = $username; //set the username in a session. This serves as a global variable
					header("location: home.php"); // redirects the user to the authenticated home page
				}
				
		}
		else
		{
			Print '<script>alert("Incorrect Password!");</script>'; //Prompts the user
			Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
		}

	}
	else
	{
		Print '<script>alert("Incorrect Username!");</script>'; //Prompts the user
		Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
  }
}
?>

    <script src="app.js"> </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src=" js/bootstrap.min.js"> </script>
</body>
</html>