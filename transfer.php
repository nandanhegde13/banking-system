<?php 

$conn=mysqli_connect("localhost","root","","spark")or die("connection failed");
$id=$_GET['id'];
$sql="SELECT * FROM customers where id={$id} order by id";
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
 <h2> Transfer Money</h2>
 <div class="container">
<div class="table-responsive-sm styling">
  <table class=" table  table-hover table-dark grey table-striped" style="margin-top:30px">
    <tr>
    <th>ID</th>
    <th>NAME</th>
    <th>Email</th>
    <th>Balance</th>
    </tr>

<?php
  while($row=mysqli_fetch_assoc($result)){
?>

<tr>
 <td><?php echo $row['id']; ?></td>
 <td><?php echo $row['cname']; ?></td>
 <td><?php echo $row['email']; ?></td>
 <td><?php echo $row['balance']; ?></td> 
</tr>

<?php  } ?>

</table>
</div>   
</div>
<div class="container">
<form method="post" >

<label name="transfer" class="transfer">Transfer To</label><br>
<select name="customers" class="option">

<?php 
$sid=$_GET['id'];
$sql1="SELECT * FROM customers where id!=$sid";
$result1 = mysqli_query($conn,$sql1);
while($rows = mysqli_fetch_assoc($result1)){
?>

<option class="table" width="100px" value="<?php echo $rows['id'];?>">
<?php echo $rows['cname'];?>(Balance:<?php echo $rows['balance']; ?>)
</option>

<?php } ?>

</select><br><br>
<label name="amount" class="amount">Amount</label><br>
<input  name="amount" class="inbox" type="text" placeholder="Enter amount"><br><br>
<button type=submit name="transfer">Transfer</button>
<button type=submit name="cancel">Cancel</button>
</form>
</div>
</body>
</html>

<?php
if(isset($_POST['cancel'])){
    header("location:home.php");
}


if(isset($_POST['transfer'])){
    if($conn){
    $from = $_GET['id'];
    $to = $_POST['customers'];
    $amount=$_POST['amount'];

 

    $get_from="SELECT * FROM customers where id=$from";
    $result=mysqli_query($conn,$get_from);
    $get_result=mysqli_fetch_array($result);
    $from=$get_result['cname'];
    



    $get_to="SELECT * FROM customers where id=$to";
    $result=mysqli_query($conn,$get_to);
    $get_result1=mysqli_fetch_array($result);
    $to=$get_result1['cname'];
    

    $sql1 = "INSERT INTO transact(sender,reciever,amount)values('$from','$to','$amount')";
    $result1=mysqli_query($conn,$sql1);
}
    mysqli_close($conn);

$conn1=mysqli_connect("localhost","root","","spark")or die("connection failed");
if($conn1){
    $from = $_GET['id'];
    $to = $_POST['customers'];
    $amount=$_POST['amount'];
$newbalance=$get_result['balance'] - $amount;
$sql5="UPDATE customers set balance = $newbalance where id=$from";
mysqli_query($conn1,$sql5) or die("update failed");

$newbalance=$get_result1['balance'] + $amount;
$sql6="UPDATE customers set balance = $newbalance where id=$to";
mysqli_query($conn1,$sql6) or die("update failed");

header("location:transaction.php");

}


 
    

  

  



}


?>