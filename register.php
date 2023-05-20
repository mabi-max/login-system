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
        <p id="first" class="h1">Welcome to our website.</p> <span id="root"> Create an account with us.</span>
      </div>


      <!-- form section starts here -->
      <div class="container col-sm-6  mt-4 border rounded-3 p-3">
        <form class="">
            <div class="form-group mb-3">
                <label for="firstname">Firstname</label>
                <input type="text" name="firstname" id="" class="form-control rounded-3" >
            </div>
              
          <!-- error message for first name field
          <p style='color:red'></p>"; -->
        
            <div class="form-group mb-3">
              <label for="lastname">Lastname</label>
              <input type="text" name="lastname" id="" class="form-control rounded-3" >
            </div>
            <!-- error message for last name field
          <p style='color:red'></p>"; -->
    
        <div class="form-group mb-3">
          <label for="email">Email</label>
          <input type="text" name="email" id="" class="form-control rounded-3" >
        </div>
          <!-- error message for email field
          <p style='color:red'></p>"; -->
    
      <div class="form-group mb-3">
        <label for="password">Password</label>
        <input type="text" name="password" id="" class="form-control rounded-3" >
      </div>
        <!-- error message for password field
          <p style='color:red'></p>"; -->
            
            <div class="text-center">
              <button name="submit" class="w-25 text-center mb-2 btn btn-lg rounded-3 btn-primary" >Register</button>
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