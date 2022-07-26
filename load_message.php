<?php
session_start();
if (!isset($_SESSION['Uniq_id'])) {
    header("location:auth/index.php");
}
$reciver=$_SESSION['Uniq_id'];
$sender=$_SESSION['sender'];
include './auth/config.php';
$output = "";
$sql = "SELECT * FROM message LEFT JOIN users ON users.uniq_id = message.sender_id
                WHERE (sender_id = {$sender} AND reciver_id = {$reciver})
                OR (sender_id = {$reciver} AND reciver_id = {$sender}) ORDER BY message_id";

$result = mysqli_query($conn, $sql) or die(mysqli_error($conn) . "Query failed");
if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {

        if($row['sender_id'] === $sender){
            $output .= '<div class="chat outgoing">
                        <div class="details">
                            <p>'. $row['message'] .'</p>
                        </div>
                        </div>';
        }else{
            $output .= '<div class="chat incoming">
                        <div class="details">
                            <p>'. $row['message'] .'</p>
                        </div>
                        </div>';
        }
    
    }
} else {
    $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
}
echo  $output;
mysqli_close($conn);
?>
