<!-- <?php
    include './auth/config.php';
    $ofline="Ofline";
    $sql1="UPDATE users SET status='{$ofline}' WHERE uniq_id={$_GET['Id']}";
    $result1 = mysqli_query($conn, $sql1) or die('Query failed');
    if($result1)
    {
        header("location:logout.php");
    }else{
        echo "error";
    }
?> -->