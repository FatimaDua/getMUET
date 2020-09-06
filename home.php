<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
     <link rel="stylesheet" href="style.css">
     <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<?php
  $mysqli = new mysqli("localhost","root","","project");
  $query = $mysqli->query("SELECT * from preg");
   session_start(); //starts the session
   if($_SESSION['user']){ // checks if the user is logged in  
   }
   else{
      header("location: index.php"); // redirects if user is not logged in
   }
   $user = $_SESSION['user']; //assigns user value
   ?>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">
            MEHRAN
        </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
  <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search for projects" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <a href="logout.php"><button class="btn btn-outline-success my-sm-0 mx-1" >Log out</button></a>
  </div>
      </nav>

<!-- nav bar ends here -->
<section>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-3 mt-5"><a href="projectregister.php"><button class="btn btn-outline-success my-2 my-sm-0">Register your Project</button></a></div>
      <div class="col-md-6 mt-5">
        <?php 
        	while($row = $query->fetch_assoc()){
        ?>
          <div class="card border-dark mb-3">
            <div class="card-body text-dark">
               <a href="<?php echo $row['repoLink'];?>" target="_blank"><h5 class="card-title"><?php echo $row['pname'];?>
               <i class="fa fa-external-link" style="font-size:15px"></i></h5></a>
               <p class="card-text"><?php echo $row['pdescription'];?></p> 
               <p class="card-text"><?php echo $row['roll_num'].'&nbsp;&nbsp;&nbsp;&nbsp;'.$row['psubject'].'&nbsp;&nbsp;&nbsp;&nbsp;'.$row['pteacher'];?></p>
             </div>
          </div>
          <?php } ?>
      </div>
    </div>
  </div>
</section>
</body>
</html>