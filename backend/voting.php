 <?php 
session_start();
include('connection.php');
$votes =$_POST['candidatevotes'];
$totalvotes = $votes + 1;
 
$gid =$_POST['candidateid'];
$uid= $_SESSION['id'];

$updatevotes=mysqli_query($conn,"update `mydata` set votes = '$totalvotes' where id ='$gid'");

$updatestatus=mysqli_query($conn,"update `mydata` set statuss=1 where id ='$uid'");

if($updatevotes and $updatestatus){
    $getcandidates = mysqli_query($conn,"select firstname,lastname,photo,id,mobile,social,votes from 
    `mydata` where standardd ='Candidates'");
    $candidates = mysqli_fetch_all($getcandidates,MYSQLI_ASSOC);
    $_SESSION['candidates']= $candidates;
    $_SESSION['statuss'] = 1;
    echo '<script>
    alert("you voted successfully");
    window.location = "../allpages/dashboard.php";
    </script>';

}else{
    echo 'script>
    alert("Technical Error, try it later");
    window.location = "../allpages/dashboard.php";
    </script>';
}

?>
  
