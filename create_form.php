<?php

$conn = mysqli_connect("localhost","root","","spark") ;
if (isset($_POST['cancel'])){
   header("location:home.php");


}


if (isset($_POST['create'])){


    if($conn){
        echo "success";
        $id=$_POST['id'];
    $name=$_POST['cname'];
    $email=$_POST['email'];
    $balance=$_POST['balance'];
   

    $sql="INSERT INTO customers(id,cname,email,balance) VALUES('$id','$name','$email','$balance')";
    $result=mysqli_query($conn,$sql) or die("query failed");
   
header("location:customers_table.php");

  }
 }


?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="create_form.css">
    <title>Document</title>
 
</head>
<body>
<h2 class="h2">CREATE CUSTOMER</h2><br>
<div class="container">
<form  method="post">
  <div class="imgcontainer">
    <img src="img_avatar.png" alt="Avatar" class="avatar">
  </div><br>


  <label for="id"><b>ID</b></label><br>
    <input type="text" placeholder="Enter id" name="id" ><br>

    <label for="cname"><b>Username</b></label><br>
    <input type="text" placeholder="Enter Username" name="cname" ><br>

    <label for="email"><b>Email</b></label><br>
    <input type="email" placeholder="Enter Email" name="email" ><br>

    <label for="balance"><b>Balance</b></label><br>
    <input type="balance" placeholder="Enter balance amount" name="balance"><br>
        
    <button class="create" type="submit" name="create">Create</button>
    <button class="cancel" type="submit" name="cancel">Cancel</button><br>
 

 
</form>
</div>  <br>
<p style="text-align:center">@COPYRIGHT 2021 NANDAN HEGDE</p>
</body>
</html>