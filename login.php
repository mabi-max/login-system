<?php 
session_start();
include "db.php";
if(isset($_POST['submit'])){ 
    
    $user_name = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM login WHERE username = '{$user_name}'";

    $select_query = mysqli_query($conn, $query);
    if(!$select_query){
       die("Query failed". mysqli_error($conn)); 
    }
    while($row = mysqli_fetch_array($select_query)){
         $db_id = $row['id'];
         $db_user_name = $row['username'];
         $db_password = $row['pass'];
         $db_image = $row['img'];
         $db_mail =$row['mail'];
    }
if(empty($user_name) || empty($password)){
      $name_error = "Please insert your username and password";
    }elseif($user_name !==$db_user_name || $password !== $db_password ){
     $name_error = "Incorrect username and password";
    }else  if($user_name ==$db_user_name && $password == $db_password ) {
        $_SESSION['username'] = $db_user_name;
        $_SESSION['img'] = $db_image;
        header("Location: index.php");
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="dist/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="dist/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="dist/fontawesome/css/all.min.css">
</head>
<body>
    <style>
    .big{

background: linear-gradient(to right, #003300 0%, #ffffff 100%);
}
.root{
font-size: 25px;
}  

.foot{
background-color: blue;
}
    @media screen and (max-width:600px) {
        #first{
            font-size: 20px;
        }
        #root{
            font-size: 13px;
        }
    }

</style>
  <body>
  
   <?php include 'asset/header.php '?>
    <div class="row m-5">
    <div class="text-center">
        <p id="first" class="h1">Welcome to our website.</p> <span id="root">  Login to our website.</span>
      </div>


      <!-- form section starts here -->
      <div class="container col-sm-3  mt-4 border rounded-3 p-3">
        <form class="" method="POST">
        
            <div class="form-group mb-3">
                <label for="username">Username</label>
                <input type="text" name="username" id="" class="form-control rounded-3" >
            </div>
              
            <?php
        if(isset($name_error)){
            echo "<p style='color:red'>$name_error</p>";
        }
        ?>

      <div class="form-group mb-3">
        <label for="password">Password</label>
        <input type="text" name="password" id="" class="form-control rounded-3" >
      </div>
        <!-- error message for password field
          <p style='color:red'></p>"; -->
            
            <div class="text-center">
              <button name="submit" class="w-25 text-center mb-2 btn btn-md rounded-3 btn-primary" >Login</button>
             <a href="register.php"><p>Don't have an account? Register now</p> </a>  
            </div>
          </form>
        </div>
<!-- form section ends here -->


<?php include 'asset/footer.php'?>

</body>
<script>
    const d = new Date();
    let year = d.getFullYear();
    document.getElementById("yy").innerHTML = year;
    </script>
</html>