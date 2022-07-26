<?php 
session_start();
if (!isset($_SESSION['Uniq_id'])) {
    header("location:auth/index.php");
}
include './auth/config.php';
$message=$_POST['Message'];
$reciver_id=$_SESSION['Uniq_id'];
$sender_id=$_SESSION['sender'];
$date=date("d-m-Y");
$time = date(' h:i A', time());
$sql="INSERT INTO `message`(`sender_id`, `reciver_id`, `message`,`Date`,`Time`) VALUES ('$sender_id','$reciver_id','$message','$date','$time')";
$result=mysqli_query($conn,$sql)or die('Query failed');
if($result)
{
    echo 1;
}else{
    echo 0;
}
?>