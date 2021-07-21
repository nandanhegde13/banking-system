<?php 
$msg=""; 
$conn=mysqli_connect("localhost","root","","spark");




    $sql="SELECT * FROM customers order by id";
    $result=mysqli_query($conn,$sql);





if(mysqli_num_rows($result)>0)  


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="transfer.css">
    <title>Document</title>

</head>
<body>
    <h2>CUSTOMERS</h2>
    <div class="container">
    <div class="table-responsive-sm styling">
    <table class=" table  table-hover table-dark grey table-striped" style="margin-top:30px">
    <tr>
    <th>ID</th>
    <th>NAME</th>
    <th>EMAIL</th>
    <th>BALANCE</th>
    <th>TRANSFER</th>
  
    </tr>
<?php
  
while($row=mysqli_fetch_assoc($result)){






?>
 <tr>
 <td><?php echo $row['id']; ?></td>
 <td><?php echo $row['cname']; ?></td> 
 <td><?php echo $row['email']; ?></td> 
 <td><?php echo $row['balance']; ?></td> 
 <td><a class="btn btn-success " href="transfer.php?id=<?php echo $row['id']; ?>">Transfer</a></td>

 </tr>
<?php  } ?>
<!-- <?php  echo $msg;?> -->
</table>
</div>
</div>
</body>
</html>