<?php
session_start();
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
    <title>WebChat</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./css/bootstrap.css">

    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 50vh;
            font-family: Tahoma, sans-serif;
        }

        .wrapper {
            display: block;
            width: 400px;
        }

        .user {
            background-color: white;
            padding: 25px 30px;
            max-height: 500px;
            overflow: auto;
            scroll-behavior: smooth;
        }

        .user header {
            display: flex;
            padding-bottom: 20px;
            justify-content: space-between;
            border-bottom: 1px solid #e6e6e6;
        }

        .details {
            display: flex;
        }

        .details img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            user-select: none;
        }

        .details span {
            padding-left: 10px;
            padding-top: 7px;
            font-weight: bold;
            text-transform: capitalize;
        }

        #logout a {
            margin: 0;
            padding: 0;
        }

        #logout {
            background-color: #683db8;
            color: white;
            height: auto;
            padding: 7px;
            border-radius: 5px;
            text-decoration: none;
            margin-left: 10px;
        }

        .search input {
            height: 45px;
            width: 100%;
            font-size: 16px;
            padding: 0 13px;
            border: none;
            outline: none;
        }

        .message-contact {
            margin-top: 20px;
            display: flex;
        }

        .message-contact img {
            width: 40px;
            height: 40px;
            font-size: 40px;
            border-radius: 50%;
            cursor: pointer;
        }

        .Online {
            background-color: #683db8;
            width: 15px;
            height: 15px;
            border-radius: 50%;
            position: relative;
            left: -10px;
            top: 25px;
        }

        #contact a {
            text-decoration: none;
            display: flex;
            margin: 3px 15px;
            color: black;
            text-align: center;
            text-transform: capitalize;
        }

        #contact p {
            margin: 0;
            margin: 3px 15px;
            font-size: 12px;
            color: grey;
            cursor: pointer;
        }

        .add-contact-btn {
            background-color: #683db8;
            color: white;
            display: inline-flex;
            padding: 8px;
            cursor: pointer;
            float: right;
        }

        .add-contact-btn i {
            line-height: 25px;
        }

        .add-model {
            background-color: white;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1;
            overflow: auto;
        }


        #modal {
            background: rgb(0, 0, 0, 0.7);
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            z-index: 100;
            display: none;
        }

        #modal-form {
            background: #fff;
            width: 30%;
            height: 30%;
            position: relative;
            top: 20%;
            left: calc(50% - 15%);
            padding: 15px;
            border-radius: 4px;
        }
        #modal-form input{
            margin-top: 10px;
            width: 100%;
            height: 30px; 
            border: 2px solid #683db8;
        }
        #modal-form input:focus{
            border: none;
        }
        #add-contact{
            background-color: #683db8;
            color: white;
            padding: 3px 12px 3px 12px;
            border: none;
            float: right;
            margin-top: 15px;

        }
        #close {
            position: absolute;
            left: 97%;
            top: -5%;
            background: red;
            color: white;
            border-radius: 50%;
            padding-left: 7px;
            width: 25px;
            cursor: pointer;
        }       
    </style>
</head>

<body style="background-color: lightgrey;">
    <div class="wrapper">
        <section class="user">
            <header>
                <div class="content">
                    <?php
                    include './auth/config.php';
                    $sql1 = "select *from users where phoneno={$_SESSION['username']}";
                    $result1 = mysqli_query($conn, $sql1) or die('Query failed');
                    $row1 = mysqli_fetch_assoc($result1);
                    ?>
                    <div class="details">
                        <img src="./profile/<?php echo $row1['Profile_img'] ?>" alt="">
                        <span><?php echo $_SESSION['name'] ?></span>
                    </div>
                </div>
                <a href="logout.php" id="logout">Logout</a>
            </header>
            <div class="search">
                <input type="search" placeholder="Enter Name to Search" id="search" autocomplete="off">
            </div>
            <!-- <i class='fa fa-user-circle-o' aria-hidden='true'></i> -->
            <div class="user-list" id="userlist">

            </div>

            <div class="add-contact-btn">
                <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Add Contact
            </div>


        </section>

        <!-- add-contact-form -->

        <div id="modal">
            <div id="modal-form">
                <span id="close" data-dismiss="modal">X</span>
                <div id="modal-title">
                    <h2 class="text-center">Add-Contact</h2><hr>
                </div>

                <form action="">
                    <input type="no" class="form-controls" id="no" required autocomplete="off" placeholder="Enter Register Mobile Number">
                    <button id="add-contact">Save</button>
                </form>
                
            </div>
        </div>


        <!--Ajax user display  -->
        <script>
            $(document).ready(function() {

                function load_userlist() {
                    $.ajax({
                        url: "load_userlist.php",
                        type: "POST",
                        success: function(data) {
                            $('#userlist').html(data);
                        }
                    });
                }
                load_userlist();
                $(document).on('keyup', '#search', function() {
                    var searchKey = $('#search').val();
                    console.log(searchKey);
                    $.ajax({
                        url: "search.php",
                        type: "POST",
                        data: {
                            search: searchKey
                        },
                        success: function(data) {
                            $('.user-list').html(data);
                        }
                    });
                });


                // add -contact
                $('.add-contact-btn').on('click', function() {
                    $('#modal').show();
                });

                $('#close').on('click',function(){
                    $('#modal').hide();
                });

                $('#add-contact').on('click',function(){
                    $('#no').text();
                });

            });
            load_userlist();
        </script>


    </div>

</body>

</html>
<!-- Status Online mode code     -->
 