<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'facebook1');
$name=$_SESSION['uname'];
$url=$_SESSION['addr'];
$msg=$_POST['msg'];
$msg=trim($msg);
if($msg!=""){
    $res=mysqli_query($conn,"insert into comment(UserName,PostName,msg)values('$name','$url','$msg')");
}
header("location:comDisplay.php");
?>