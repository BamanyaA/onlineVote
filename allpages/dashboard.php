
<?php
session_start();
if(!isset($_SESSION['id'])){
header('location:../allpages/pages.html');
}
$data = $_SESSION['data'];
if($_SESSION['statuss'] == 1){
  $status='<b class="text-success">voted </b>';
}else{
  $status='<b class="text-danger">Not voted </b>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin page </title>
   
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
 crossorigin="anonymous">


</head>
<body class="bg-secondary text-light">

 <div class="container my-5">

    <a href="../allpages/pages.html"><button class="btn btn-dark text-light px-3">Back</button></a>
    <a href="../allpages/logout.php"><button class="btn btn-dark text-light px-3">Logout</button></a>
    <h1 class="my-3"> Vote Your  Favourite</h1> 
 <div class="row my-5">
    <div class="col-md-7">
        <!-- candidates -->
      <?php
      if(isset($_SESSION['candidates'])){
        $candidates= $_SESSION['candidates'];
        for($i=0;$i<count($candidates);$i++){
          ?>
        <div class="row">
      <div class="col-md-4">
       <img src="../images/<?php echo $candidates[$i]['photo']?>" alt="Group Image" style="width: 100px; height: 100px;" >
      </div>
      <div class="col-md-8">
    
        <strong class="text-dark h5">Candidate Name:</strong>
        <?php echo  $candidates[$i]['firstname']?><br>
        <strong class="text-dark h5">Votes:</strong>
        <?php echo  $candidates[$i]['votes']?>
      </div>
      </div>

     <form action = "../backend/voting.php" method="post">
      <input type="hidden" name="candidatevotes" value="<?php echo $candidates[$i]['votes']?>">
      <input type="hidden" name="candidateid" value="<?php echo  $candidates[$i]['id']?>">
      <?php
      if($_SESSION['statuss'] ==1 ){
        ?>
        <button  class="bg-success  my-2  text-white px-3" > Voted </button>
        <?php
      }else{
        ?>
        <button class="bg-danger  my-2 text-white px-3" type = "submit"> Vote </button>
        <?php
      }
    
      ?>
    </form>
    <hr>
    <?php
        }
        
      }
      else{
        ?>
        <div class="container">
          <h2> NO Candidate has Registered Yet </h2>
        </div>
        <?php
      }
    ?>
    </div>

     <!-- voters -->

     <div class="col-md-5">
     <img src="../images/<?php echo $data['photo']?>" alt="Unsupported Image" style="width: 100px; height: 100px;">
      
     <br><br>
     <strong class="text-dark h5">Name:</strong>
      <?php echo $data['firstname'];?><br>
     <strong class="text-dark h5">Mobile:</strong>
     <?php echo $data['mobile'];?><br>
     <strong class="text-dark h5">Status:</strong>
     <?php echo $status;?><br>
    
    
     </div>
    </div>
    
</body>

</html>