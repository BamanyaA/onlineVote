<?php
session_start();

include('connection.php');
if(isset($_POST['username'])){

$username = $_POST['email'];
$password =  $_POST['password'];
$social = $_POST['security'];
$standard= $_POST['std'];
//data encryption using md5

$username = md5($username);
$password = md5($password);
$social  = md5($social);


$sql = "select * from `mydata`  where email= '$username' and pass='$password' and social='$social' and standardd ='$standard'";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num>0){ 
    $query = "select  firstname,lastname,id,social,email,photo,mobile,votes from `mydata` where standardd = 'Candidate'";
    $resultcandidates = mysqli_query($conn,$query);
    if(mysqli_num_rows($resultcandidates)>0){
       $candidates = mysqli_fetch_all($resultcandidates,MYSQLI_ASSOC);
       $_SESSION['candidates'] = $candidates;
    
    
    }
       $data=mysqli_fetch_array($result);
          
          $_SESSION['id'] = $data['id'];
          $_SESSION['email'] = $data['email'];
          $_SESSION['statuss'] =$data['statuss'];
          $_SESSION['mobile'] =$data['mobile'];
          $_SESSION['data'] = $data;
        echo '<script>
        window.location="../allpages/dashboard.php";
        </script>';
}


else{
    echo '<script>
    alert("Invalid Credentilas");
    window.location="../allpages/login.html";
    </script>';

}
}
?>