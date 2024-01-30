<?php
 $conn = mysqli_connect('localhost', 'root', '', 'mydb');
 if(!$conn){
    die("cannot connect".mysqli_error($conn));
}

?>