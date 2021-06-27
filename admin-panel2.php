<!DOCTYPE html>
<?php 
$con=mysqli_connect("localhost","root","","myhmsdb");

include('newfunc.php');

if(isset($_POST['docsub']))
{
  $doctor=$_POST['doctor'];
  $dpassword=$_POST['dpassword'];
  $demail=$_POST['demail'];
  $spec=$_POST['special'];
  $docFees=$_POST['docFees'];
  $dgender = $_POST['dgender'];
  $docAddress = $_POST['docAddress'];
$docContact = $_POST['docContact'];
  $query="insert into doctb(username,password,email,spec,docFees,gender,docContact, docAddress)values('$doctor','$dpassword','$demail','$spec','$docFees','$dgender','$docContact', '$docAddress')";
 // $query="insert into doctb(username,password,email,spec,docFees)values('$doctor','$dpassword','$demail','$spec','$docFees')";
  $result=mysqli_query($con,$query);
  if($result)
    {
      echo "<script>alert('Doctor added successfully!');</script>";
     

  }
}
?>

<script>
  //changing the credentials login
window.location.href = "/index.php";
</script>
