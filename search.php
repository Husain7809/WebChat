<?php
session_start();
include './auth/config.php';
$search= $_POST['search'];
$sql="select * from users where fname LIKE '%{$search}%' OR lname LIKE '%{$search}%'";
$result=mysqli_query($conn,$sql)or die(mysqli_error($conn).'failed');



$output="";
if(mysqli_num_rows($result)>0){
    $sql1 = "select *from users where phoneno!={$_SESSION['username']}";
    $result1 = mysqli_query($conn, $sql1) or die('Query failed');
    while ($row = mysqli_fetch_assoc($result)) {
        $output= "<div class='message-contact'>
        <img src='./profile/{$row['Profile_img']}' alt=''>
        <span id='contact'>
            <a href='chat.php?Uniq_id={$row['uniq_id']}'>{$row['fname']} {$row['lname']}</a>
            <p>You:Hello</p>
        </span>
         </div>";   
        echo $output; 
    }
}else{
    echo "<div class='alert alert-danger'>No record found...</div>";
}
