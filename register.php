<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
     <link rel="stylesheet" href="style.css">
     <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <form action="register.php" method="post" style="border:1px solid #ccc">
        <div class="container">
          <div class="row">
               <div class = "col-md-3"> </div>
                <div class="col-md-6">
                    <p class="center">Join us</p>
                    <h1 class= "center">Create your account</h1> <hr>
                    
                    <label for="email"><b>Email</b></label>
                    <input type="text" placeholder="Enter Email" name="username" required>
                
                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="password" required>

                    <p>Make sure it's at least 15 characters OR least 8 characters including a number and a lowercase letter. </p>
                
                    <label for="psw-repeat"><b>Repeat Password</b></label>
                    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
                
                    <label>
                    <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
                    </label>
                
                    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
                
                    <div class="clearfix">
                    <button type="submit" class="signupbtn button">Sign Up</button>
                    </div>
                </div>
                <div class ="col-md-3"></div>
          </div>
        </div>
      </form>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $bool = true;

    $mysqli= new mysqli("localhost","root","","project") or die(mysql_error()); //Connect to server and database
    $query = $mysqli->query("Select * from users"); //Query the users table

    while($row = $query->fetch_assoc()) //display all rows from query
	{
		$table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
		if($username == $table_users) // checks if there are any matching fields
		{
			$bool = false; // sets bool to false
			Print '<script> alert("Username has been taken!"); </script>'; //Prompts the user
			Print '<script> window.location.assign("register.php"); </script>'; // redirects to register.php
		}
	}

	if($bool) // checks if bool is true
	{
		$mysqli->query("INSERT INTO users (username, password) VALUES ('$username','$password')"); //Inserts the value to table users
		Print '<script>alert("Successfully Registered!");</script>'; // Prompts the user
		Print '<script>window.location.assign("index.html");</script>'; // redirects to register.php
	}
}
?>

    <script src="app.js"> </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src=" js/bootstrap.min.js"> </script>
</body>
</html>