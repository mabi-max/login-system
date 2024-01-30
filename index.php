<?php 
session_start();
include('db.php');
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
        <p id="first" class="h1">Welcome <?php echo $_SESSION['username'];?>
        </p> <span id="root"> We take imaginations and turn them into reality.</span>
      </div>


<!-- main page section starts here -->
<div class="d-flex justify-content-between pt-5">
<div>
    <img  class="img-fluid w-100" src="img/s.jpg" alt="Football">
</div>
<div>
    <h1>About our website</h1> 
    Lorem ipsum dolor sit amet
    consectetur adipisicing elit. Reiciendis, possimus
    ullam illo architecto illum, numquam ex tempora,
    in at quod maiores necessitatibus suscipit itaque vero corrupti!
    Reiciendis repellendus veritatis blanditiis?
</div>
</div>
<!-- main page section ends here -->

<?php include 'asset/footer.php'?>

</body>
<script>
    const d = new Date();
    let year = d.getFullYear();
    document.getElementById("yy").innerHTML = year;
    </script>
</html>