<!DOCTYPE html>
<html lang="en">

<head>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>New Account Page</title>
     <style>
          body {
               background-color: #ADACAC;
               padding-top: 15px;
          }

          form {
               background-color: whitesmoke;
               box-shadow: 1px 3px 30px 1px grey;
               padding: 30px;
               margin: 0;
               border-radius: 5px;
          }

          .form-group {
               padding-bottom: 10px;
          }

          h2 {
               text-align: center;
               color: #683db8;
               font-style: italic;
               font-size: 30px;
               font-weight: 700;
          }

          p {
               color: darkgrey;
               text-align: center;
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
               color: grey;
          }

          .form-control:focus {
               border-color: #683db8;
          }

          a {
               color: #683db8;
               text-decoration: none;
               font-weight: bold;
          }

          a:hover {

               color: #683db8;
               text-decoration: underline;
          }
     </style>
</head>

<body>
     <div class="container">
          <div class="col-lg-5 col-md-offset-4">
               <?php
               if (isset($_POST['sign'])) {
                    include './auth/config.php';
                    $uniq_id = mt_rand(100000, 999999);
                    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
                    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
                    $No = mysqli_real_escape_string($conn, $_POST['no']);
                    $pass = $_POST['pass'];
                    $status = "Online";
                    
                    if (empty($_FILES['img']['name'])) {
                         $image_name = "";
                    } else {
                         $errors = array();
                         $file_name = $_FILES['img']['name'];
                         $file_size = $_FILES['img']['size'];
                         $file_tmp = $_FILES['img']['tmp_name'];
                         $file_type = $_FILES['img']['type'];
                         $file_ext = end(explode('.', $file_name));
                         $extensions = array("jpeg", "jpg", "png");

                         if (in_array($file_ext, $extensions) === false) {
                              $errors[] = "This file is not allwoed, please choose a JPG or PNG files.";
                         }
                         if ($file_size > 2097152) {
                              $errors[] = "File size must be 2mb or lower.";
                         }
                         $newname = time() . "-" . basename($file_name);
                         $target = "./profile/" . $newname;
                         $image_name = $newname;
                         if (empty($errors) == true) {
                              move_uploaded_file($file_tmp, $target);
                         } else {
                              print_r($errors);
                              die();
                         }
                    }


                    $sql1 = "select * from users where phoneno='$No'";
                    $result1 = mysqli_query($conn, $sql1) or die("Failed.");
                    if (!mysqli_num_rows($result1) > 0) {
                         $sql = "insert into users(uniq_id,fname,lname,phoneno,password,status,Profile_img) values($uniq_id,'$fname','$lname','$No','$pass','$status','$image_name')";
                         $result = mysqli_query($conn, $sql) or die(mysqli_error($conn) . "Query Failed.");
                         if ($result) {
                              header("location:index.php");
                         }
                    } else {
                         echo  "<div class='alert alert-danger text-center' style='font-weight: bold;'>Mobile Number already Exits.</div>";
                    }
               }
               ?>
               <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                    <h2>Chat Register</h2>
                    <p class="text">Create your account. It's free and only takes a minute.</p>
                    <div class="row">
                         <div class="col-lg-6" style="padding:0;">
                              <div class="form-group">
                                   <label for="">First Name:</label>
                                   <input type="text" name="fname" class="form-control" autocomplete="off" required>
                              </div>
                         </div>
                         <div class="col-lg-6">
                              <div class=" form-group">
                                   <label for="">Last Name:</label>
                                   <input type="text" name="lname" class="form-control" autocomplete="off" required>
                              </div>
                         </div>
                         <div class="form-group">
                              <label for="">Phone No:</label>
                              <input type="number" name="no" class="form-control" autocomplete="off" required>
                         </div>
                         <div class="form-group">
                              <label for="">Password:</label>
                              <input type="password" name="pass" class="form-control" autocomplete="off" required>
                         </div>
                         <div class="form-group">
                              <label for="">Profile Img:</label>
                              <input type="file" name="img" id="p_img" class="form-control" autocomplete="off" required>
                         </div>
                    </div>
                    <div class="form-group">
                         <label for=""></label>
                         <input type="Submit" value="Register Now" name="sign" id="btn">
                    </div>
               </form>
               <br>
               <div class="text-center">Already have an account? <a href="index.php">Sign in</a></div>
          </div>

     </div>
</body>

</html>