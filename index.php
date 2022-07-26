<!DOCTYPE html>
<html lang="en">

<head>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="./css/bootstrap.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


     <title>Login Page</title>
     <style>
          body {
               background-color: #ADACAC;
               padding-top: 20px;
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
               box-shadow: none;
               border-color: #683db8;
          }

          a {
               color: #683db8;
               font-weight: bold;
               text-decoration: none;
          }

          a:hover {
               color: #683db8;
               text-decoration: underline;
          }

          #new {
               background-color: #683db8;
               color: white;
               padding: 7px;
               border-radius: 10px;
               font-weight: bold;
               letter-spacing: 1px;
          }

          #new:hover {
               text-decoration: none;
          }
          h2 {
               text-align: center;
               color: #683db8;
               font-style: italic;
               font-size: 30px;
               font-weight: 700;
          }
     </style>
</head>

<body>
     <div class="container">
          <div class="row">
               <div class="col-md-4 offset-4">
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                         <h2>Chat Login</h2>
                         <p class="text">Please login to your account.</p>
                         <div class="form-group">
                              <label for="">Username:</label>
                              <input type="number" name="uname" class="form-control" autocomplete="off" required>
                         </div>
                         <div class="form-group">
                              <label for="">Password:</label>
                              <input type="password" name="pass" class="form-control" autocomplete="off" required>
                         </div>
                         <div class="form-group">
                              <label for=""></label>
                              <input type="Submit" value="Login Now" name="login" id="btn">
                         </div>
                         <div class="text-center"> <a href="forgot.php">Forgot Password?</a></div><br>
                         <div class="text-center"><span style="color: #541154;">Don't have an account? </span><a href="sign.php" id="new"> Create new</a></div>
                    </form>
                    <?php
                    if (isset($_POST['login'])) {
                         include './auth/config.php';
                         $username = mysqli_real_escape_string($conn, $_POST['uname']);
                         $pass = $_POST['pass'];
                         $sql = "select phoneno,password,uniq_id,fname,lname from users where phoneno='$username' AND password='$pass'";
                         $result = mysqli_query($conn, $sql) or die("Query Failed.");
                         if (mysqli_num_rows($result) > 0) {
                              while ($row = mysqli_fetch_assoc($result)) {
                                   session_start();
                                   $_SESSION['username'] = $row['phoneno'];
                                   $_SESSION['password'] = $row['password'];
                                   $_SESSION['Uniq_id']= $row['uniq_id'];
                                   $_SESSION['name'] = $row['fname']." ".$row['lname'];
                                   $_SESSION['status']= $row['status'];
                                   ?>
                                   <script>
                                        location.href="user.php";
                                    </script>
                                   <?php
                              }
                         } else {
                              echo "<div class='alert alert-danger'>Username and Password not match..</div>";
                         }
                    }
                    ?>
               </div>
          </div>
     </div>

</body>

</html>