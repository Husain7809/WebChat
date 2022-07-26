<?php
session_start();
if (isset($_GET['Uniq_id'])) {
    $_SESSION['sender'] = $_GET['Uniq_id'];
}
if (!isset($_SESSION['Uniq_id'])) {
    header("location:auth/index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real-time Chat Web</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #dbd9d9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .chat-boxs {
            background-color: white;
            width: 500px;
            max-height: auto;
        }

        .profile-profile {
            background-color: white;
            justify-content: center;
        }

        .details-profile {
            padding: 10px 30px;
            display: flex;
            border-bottom: 1px solid #e6e6e6;
        }

        .prev i {
            padding-top: 10px;
            font-size: 20px;
            cursor: pointer;
            padding-right: 30px;
        }

        .prev i:focus {
            color: #683db8;
        }

        a {
            color: black;
        }

        .details-profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .details-profile #name {
            font-weight: bold;
            padding-left: 15px;
            text-transform: capitalize;
        }

        .details-profile .o {
            padding-left: 65px;
            margin: 0;
            color: grey;
            text-transform: capitalize;

        }

        .chat-box {
            position: relative;
            min-height: 500px;
            max-height: 500px;
            overflow-y: auto;
            padding: 10px 30px 20px 30px;
            background: #f7f7f7;
            box-shadow: inset 0 32px 32px -32px rgb(0 0 0 / 5%),
                inset 0 -32px 32px -32px rgb(0 0 0 / 5%);
        }

        .chat-box .text {
            position: absolute;
            top: 45%;
            left: 50%;
            width: calc(100% - 50px);
            text-align: center;
            transform: translate(-50%, -50%);
        }

        .chat-box .chat {
            margin: 15px 0;
        }

        .chat-box .chat p {
            word-wrap: break-word;
            padding: 8px 16px;
            box-shadow: 0 0 32px rgb(0 0 0 / 8%),
                0rem 16px 16px -16px rgb(0 0 0 / 10%);
        }

        .chat-box .outgoing {
            display: flex;
            margin: 0px;
        }

        .chat-box .outgoing .details {
            margin-left: auto;
            max-width: calc(100% - 130px);
        }

        .outgoing .details p {
            background: #683db8;
            color: #fff;
            border-radius: 18px 18px 0 18px;
        }

        .chat-box .incoming {
            display: flex;
            align-items: flex-end;
            margin: 0px;
        }

        .chat-box .incoming img {
            height: 35px;
            width: 35px;
        }

        .chat-box .incoming .details {
            margin-right: auto;
            margin-left: 10px;
            max-width: calc(100% - 130px);
        }

        .incoming .details p {
            background: #fff;
            color: #333;
            border-radius: 18px 18px 18px 0;
        }

        form {
            padding: 18px 30px;
            display: flex;
            justify-content: space-between;
        }

        form input {
            height: 45px;
            width: calc(100% - 58px);
            font-size: 16px;
            padding: 0 13px;
            border: 1px solid #e6e6e6;
            outline: none;
            border-radius: 5px 0 0 5px;
        }

        form button {
            color: white;
            background-color: #683db8;
            border: none;
            padding: 15px;
            font-size: 12px;
            cursor: pointer;
        }

        .text {
            color: lightgrey;
            padding: 10px;
            text-align: center;
            justify-content: center;
            padding-top: 40%;
            display: flex;
            user-select: none;
        }
    </style>
</head>

<body>
    <div class="chat-boxs">
        <section>
            <?php
            include './auth/config.php';
            $sql = "select *from users where uniq_id={$_GET['Uniq_id']}";
            $result = mysqli_query($conn, $sql) or die('Query failed');
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
            ?>
                <div class="profile">
                    <div class="details-profile">
                        <a class="prev" href="user.php?Uniq_id=<?php echo $_SESSION['Uniq_id'] ?>"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                        <img src="./profile/<?php echo $row['Profile_img'] ?>" alt="">

                        <div id="name"><?php echo  $row['fname'] . " " . $row['lname']; ?><span class="o"><br><?php echo $row['status']; ?></span></div>
                    </div>
                </div>
            <?php } ?>
            <div class="chat-box">

            </div>
            <form method="POST" id="send-message-form">
                <input type="text" name="message" id="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
                <button id="send"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
            </form>
        </section>
    </div>
</body>

</html>
<script>
    $(document).ready(function(e) {
        function load() {
            $.ajax({
                url: "load_message.php",
                type: "POST",
                success: function(data) {
                    $('.chat-box').html(data);
                }
            });
        }
        setInterval(() => {
            load();
        }, 500);
        $('#send').on('click', function(e) {
            e.preventDefault();
            message = $('.input-field').val();
            if (message == "") {
                alert('Message Empty');
            } else {
                $.ajax({
                    url: "send_message.php",
                    type: "POST",
                    data: {
                        Message: message,
                    },
                    success: function(data) {
                        if (data = 1) {
                            load();
                            $('#send-message-form').trigger('reset');
                        } else {
                            alert("can't send message");
                        }
                    }
                });
            }
        });

    });
</script>