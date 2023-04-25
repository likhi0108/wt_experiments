<?php
session_start();
    $name=$_SESSION['uname'];
    $fn= $_POST['url'];
    $conn = mysqli_connect('localhost', 'root', '', 'facebook1');
    $res = mysqli_query($conn,"select * from likes where UserName='$name' and PostName='$fn'");
    if(mysqli_num_rows($res)>0){
        $res=mysqli_query($conn,"select * from posts where fn='$fn'");
        $l = mysqli_fetch_assoc($res);
        $x=$l['likes'];
        $x=$x-1;
        $a=mysqli_query($conn,"UPDATE posts SET likes='$x' WHERE fn='$fn'");
        $b=mysqli_query($conn,"DELETE FROM likes WHERE UserName='$name' and PostName='$fn'");
    }
    else{
        $res = mysqli_query($conn,"select * from posts where fn='$fn'");
        $l = mysqli_fetch_assoc($res);
        $x=$l['likes'];
        $x=$x+1;
        $a=mysqli_query($conn,"UPDATE posts SET likes='$x' WHERE fn='$fn'");
        $b=mysqli_query($conn,"INSERT INTO likes(UserName,PostName)VALUES('$name','$fn')");
    }
    header("Location:wlcm.php");
?>