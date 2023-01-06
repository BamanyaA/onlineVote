<?php
include('connection.php');

$sql = "SELECT email FROM mydata WHERE email = " .$_POST['email'];
$select = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($select);

   if (mysqli_num_rows > 0) {
  echo "0"; // email exists
 }else{
  echo "1"; // email doesn't exists
 return;}
?>