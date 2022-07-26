<?php
    session_start();
    include './auth/config.php';
    $sql = "select *from users where phoneno!={$_SESSION['username']}";
    $result = mysqli_query($conn, $sql) or die('Query failed');

    


    if (mysqli_num_rows($result) > 0) {
        $output="";
    while ($row = mysqli_fetch_assoc($result)) {
        if($row['status']=='Online'){
            $online="Online";
        }else{
            $online="Ofline";
        }
        $output= "<div class='message-contact'>
        <img src='./profile/{$row['Profile_img']}' alt=''>
        <div class='{$online}'></div>
        <span id='contact'>
            <a href='message_send.php?Uniq_id={$row['uniq_id']}'>{$row['fname']} {$row['lname']}</a>
            <p>You:Hello</p>
        </span>
         </div>";
         echo $output;
    }
    
    }
?>