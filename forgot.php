<!DOCTYPE html>
<html lang="en">

<head>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="./css/bootstrap.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
     <title>Forgot Password Page</title>
     <style>
          body {
               background-color: #ADACAC;
               padding-top: 100px;
          }

          form {
               background-color: whitesmoke;
               box-shadow: 1px 3px 30px 1px grey;
               padding: 30px;
               border-radius: 5px;
          }

          .form-group {
               padding-bottom: 5px;
          }

          h2 {
               text-align: center;
               color: #683db8;
               padding-bottom: 20px;
          }

          p {
               text-align: center;
               color: darkgrey;
               padding-bottom: 20px;
          }

          #btn {
               background: #683db8;
               border: none;
               width: 100%;
               color: white;
               height: 35px;
               letter-spacing: 1px;
          }

          .form-control {
               height: 40px;
               box-shadow: none;
               color: #683db8;
          }

          .form-control:focus {
               border-color: #683db8;
          }
          #back_page{
               text-align: center;
               letter-spacing: 1px;
               text-decoration: none;
               color:#683db8;
               font-weight: bold;
               display: block;
               padding-top: 10px;
          }
          #back_page:hover{
               text-decoration: underline;
          }
     </style>
</head>

<body>
     <div class="container">
          <div class="row">
               <div class="col-md-4 offset-4">
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                         <h2>Forgot Password </h2>
                         <div class="form-group">
                              <label for="">Username:</label>
                              <input type="number" name="user" class="form-control" autocomplete="off" required>
                         </div>
                         <!-- <div class="form-group">
                              <label for="">Old password:</label>
                              <input type="password" name="old_pass" class="form-control" autocomplete="off" required>
                         </div> -->
                         <div class="form-group">
                              <label for="">New password:</label>
                              <input type="password" name="new_pass" class="form-control" autocomplete="off" required>
                         </div>
                         
                         <div class="form-group">
                              <label for=""></label>
                              <input type="Submit" value="Reset password" name="reset" id="btn"><br>
                         </div>
                         <a href="index.php" id="back_page">Back to home</a>
                    </form>
                    <?php
                    include './auth/config.php';
                    if (isset($_POST['reset'])) {
                         $username = mysqli_real_escape_string($conn, $_POST['user']);
                         $new = $_POST['new_pass'];
                         $sql = "select *from users where phoneno={$username}";
                         $result = mysqli_query($conn, $sql) or die(mysqli_error($conn) . "Query Failed");
                         $row = mysqli_fetch_assoc($result);
                         if (mysqli_num_rows($result) > 0) {
                              $sql1 = "UPDATE users SET password='{$new}' WHERE phoneno={$username}";
                              $result1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn) . "Query Failed");
                              if ($row['password'] == $new) {
                                   echo "<br>" . "<div class='alert alert-danger'>New password and old password same. please diffent pasword choose.</div>";
                              } else {
                                   header("location:index.php");
                              }
                         } else {
                              echo "<br>" . "<div class='alert alert-danger'>Invalid Number</div>";
                         }
                    }
                    ?>
               </div>
          </div>
     </div>
</body>

</html>