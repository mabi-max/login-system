<?php
include('db.php');
if(isset($_POST['submit'])){
$user_name = mysqli_real_escape_string($conn, $_POST['username']);
$e_mail = mysqli_real_escape_string($conn, $_POST['email']);
$pass = mysqli_real_escape_string($conn, $_POST['password']);
$image = $_FILES['image']['name'];
$image_temp = $_FILES['image']['tmp_name'];
$image_size = $_FILES['image']['size'];


//we select all username fields from the database and check if username already exists
$sql_user = "SELECT * FROM login WHERE username = '$user_name'";
$user_query = mysqli_query($conn, $sql_user);

//we check if the username field is empty and less than 6 characters
if(empty($user_name)){
    $name_error = "Please insert your username";
}elseif(strlen($user_name) < 6){
    $name_error = "Username cannot be less than 6 characters";
}elseif(mysqli_num_rows($user_query) > 0){
    $name_error = "Username already exists";
}

//we check if the email address is valid
if (!filter_var($e_mail, FILTER_VALIDATE_EMAIL)) {
  $mail_error = "invalid email address";
}elseif(empty($e_mail)){
  $mail_error = "Please fill out the email field";
}

//we check if the password field is empty, less than 6 characters and contains an uppercase letter
if(empty($pass)){
    $pass_error = "Please fill out the password field";
}elseif(strlen($pass) < 6){
    $pass_error = "Password must be between 6 to 8 characters";
}elseif(!preg_match("/[A-Z]/", $pass)){
    $pass_error = "Password must contain at least one uppercase letter";
}

//we check if the file size is greater than 5kb
if($image_size > 5000){
  $size_error = "Maximum file size is 5KB";
}

//we send the data to the database table if there is no error
if(empty($name_error) && empty($pass_error) && empty($mail_error) &&empty($size_error)) {
  move_uploaded_file($image_temp, "img/$image");
$enter_values = "INSERT INTO login (username, mail, pass, img) 
VALUES('$user_name', '$e_mail', '$pass', '$image')";
$query = mysqli_query($conn, $enter_values);
if(!$query){
    die('An error occured'. mysqli_error($conn));
}else{
    $success = "Registration successful";
}

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
  <?php
  if(isset($success)){ 
    echo "
  <div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong> $success </strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div> "
    
  ;}
  ?>
    <div class="row m-5">
    <div class="text-center">
        <p id="first" class="h2">Create an account. </p>
      </div>
 
      
      <!-- form section starts here -->
      <div class="container col-sm-6  mt-4 border rounded-3 p-3">

        <form class="" method="POST" enctype="multipart/form-data">
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
          <label for="email">Email</label>
          <input type="text" name="email" id="" class="form-control rounded-3" >
        </div>
        <?php

        if(isset($mail_error)){ 
            echo "<p style='color:red'>$mail_error</p>";
        }
        ?>
    
      <div class="form-group mb-3">
        <label for="password">Password</label>
        <input type="text" name="password" id="" class="form-control rounded-3" >
      </div>
      <?php
        if(isset($pass_error)){ 
            echo "<p style='color:red'>$pass_error</p>";
        }
        ?>

          <div class="form-group mb-3">
        <label for="picture">Profile picture</label>
        <input type="file" name="image" id="" class="form-control rounded-3" >
      </div>
      <?php
      if(isset($size_error)){ 
            echo "<p style='color:red'>$size_error</p>";
        }
        ?>

          Agree to terms of service <input type="checkbox" name="agree" id="" >
          <!-- error message for terms of service field
          <p style='color:red'></p>"; -->
            
            <div class="text-center">
              <input type="submit" name="submit" class="w-25 mb-2 btn btn-lg rounded-3 btn-primary" >
             <a href="login.php"><p>already have an account? Login now</p> </a>  
            </div>
              <!-- success message for registration 
          <p style='color:blue'></p>"; -->
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