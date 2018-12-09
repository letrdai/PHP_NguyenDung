<?php
session_start();

$messageError = "";
include '../database.php';
//required
if ( !empty($_POST)) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $conn = Database::connect();
  $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND status = 1 AND `group` = 1";
  $results = mysqli_query($conn, $sql);
  if ($results->num_rows > 0) {
    $user = $results->fetch_array();
    $_SESSION['userLogged'] = $user;
    header('Location: user-update.php'); die;
  } else {
    $messageError = "Login fail! Please try again!";
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<!-- css files -->
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style-login.css" rel="stylesheet" type="text/css" media="all" />
<!-- /css files -->

<!-- online fonts -->
<link href="//fonts.googleapis.com/css?family=Sirin+Stencil" rel="stylesheet">
<!-- online fonts -->

<body>
<div class="container demo-1">
  <div class="content"> 
        <div id="large-header" class="large-header">
      <h1>ĐĂNG NHẬP VÀO X Store</h1>
      <h3 style="text-align: center; margin-bottom: 20px;"><a href="../index.php" style="color: #E2E2E2;"> VỀ LẠI TRANG CHỦ</a></h3>
        <div class="main-agileits">
        <!--form-stars-here-->
            <div class="form-w3-agile">
              <h2>Đăng nhập</h2>
              <form  method="post">
                <div class="form-sub-w3">
                  <input type="text" name="username" placeholder="Tài khoản " required="" />
                <div class="icon-w3" style="color: red;">
                  <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                </div>
                <div class="form-sub-w3">
                  <input type="password" name="password" placeholder="Mật khẩu" required="" />
                <div class="icon-w3">
                  <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                </div>
                </div><!-- 
                <p class="p-bottom-w3ls">Forgot Password?<a class href="#">  Click here</a></p> -->
                <a class href="user-update.php" style="color: red; text-align: center;"> Đăng kí mới</a>
                <div class="clear"></div>
                <div class="submit-w3l">
                  <input type="submit" value="Đăng nhập">
                </div>
              </form>
              <div class="social w3layouts">
                <div class="heading">
                  <h5>Hoặc với</h5>
                  <div class="clear"></div>
                </div>
                <div class="icons">
                  <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                  <div class="clear"></div>
                </div>
                <div class="clear"></div>
              </div>
            </div>
        <!--//form-ends-here-->
        </div><!-- copyright -->
          <div class="copyright w3-agile">
            <p> © 2017 Clean Login Form . All rights reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a></p>
          </div>
          <!-- //copyright --> 
        </div>
  </div>
</div>  

</body>
</html>