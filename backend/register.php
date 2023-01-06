<?php
session_start();

include('connection.php');
if(isset($_POST['username'])){
 $firstname = $_POST['fname'];
 $lastname = $_POST['lname'];
 $email = $_POST['email'];
 $social_security= $_POST['security'];
 $password =$_POST['password'];
 $cpassword = $_POST['cpassword'];
 $gender = $_POST['gender'];
 $image = $_FILES['photo']['name'];
 $tmp_name= $_FILES['photo']['tmp_name'];
 $group = $_POST['std'];
 $mobile = $_POST['number'];
 //data encryption using md5
 $email = md5($email);
 $password = md5($password);
 $cpassword =md5($cpassword);
 $social_security= md5($social_security);
   
  if( $password !== $cpassword){
    echo '<script
     alert("unmatched password");
     window.loction= "../allpages/registration.html"
     </script';
  
 }
 else{
   move_uploaded_file($tmp_name,"../images/$image");
 $sql = "insert into mydata(firstname,lastname,email,pass,gender,social,standardd,mobile,photo,statuss,votes)
 VALUES('$firstname','$lastname','$email','$password','$gender','$social_security','$group','$mobile','$image',0,0)";

  $result = mysqli_query($conn,$sql);
   if($result){
      echo '<script>
    alert("You are successfully registered");
     window.location = "../allpages/login.html";
    </script>';
   }

   else{
      die(mysqli_error($conn));
}
 }
}    
?>