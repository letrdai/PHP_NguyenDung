<?php
session_start();

function uploadFile($fileName = 'avatar', $target_dir = "../upload/", $pathReturn = "upload/"){
	$target_file = $target_dir . basename($_FILES[$fileName]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES[$fileName]["tmp_name"]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }
	}
	// Check if file already exists
	if (file_exists($target_file)) {
	    echo "Sorry, file already exists.";
	    $uploadOk = 0;
	}
	// Check file size
	if ($_FILES[$fileName]["size"] > 1024000) {
	    echo "Sorry, your file is too large.";
	    $uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	    $uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded.";
	    die;
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($_FILES[$fileName]["tmp_name"], $target_file)) {
	    	return $pathReturn . basename( $_FILES[$fileName]["name"]);
	    } else {
	        echo "Sorry, there was an error uploading your file.";
	    }
	}
}

require 'database.php';

if ( !empty($_POST)) {
	// keep track post values
	$username = $_POST['username'];
	$password = $_POST['password'];
	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$status = 1;
	$avatar = '';
	if(array_key_exists('avatar', $_FILES)){
		$avatar = uploadFile();
	}
	
	// insert data
	// $conn = Database::connect();

	$connObject = new Database();
	$conn = $connObject->connect();

	$sql = "INSERT INTO users (`username`, `password`, `fullname`, `avatar`, `address`, `phone`, `email`, `status`) VALUES ('$username', '$password', '$fullname', '$avatar', '$address','$phone', '$email', $status)";
	// die($sql);
	$conn->query($sql);
	Database::disconnect();
	header("Location: index.php");
}

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="assets/css/style-signup.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Old+Standard+TT:400,400i,700" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'><!--web font-->
<!-- //web font -->
</head>
<body>
	<!-- main -->
	<div class="main main-agileits">
		<h1>Tạo tài khoản mới</h1>
		<h3 style="text-align: center; margin-top: 30px;"><a href="index.php" style="color: #E2E2E2;"> VỀ LẠI TRANG CHỦ</a></h3>
		<div class="main-agilerow"> 
			<div class="signup-wthreetop">
				<h2 style="text-align: center;">Chào mừng đến với</h2>
				<h2 style="text-align: center;"> X Store</h2>
			</div>	
			<div class="contact-wthree">
				<form action="#" method="post">
					<div class="form-w3step1">
						<input type="text" name="fullname" placeholder="Họ và tên" required=""> 
						<input type="email" name="email" placeholder="Email" required="">
						<input type="text" name="username" placeholder="Tên tài khoản" required="">
						<input type="password" name="password" placeholder="Mật khẩu" required="">
						<input type="text" name="phone" placeholder="Số điện thoại" required="">
						<input type="text" name="address" placeholder="Địa chỉ" required="">
						<label style="color: red">Avatar</label>
						<input type="file" name="avatar">
						<p>Chỉ ảnh đuôi .jpg, .png, .jpeg, .gif</p>
					</div>
					<input type="submit" value="ĐỒNG Ý">
				</form>
			</div>  
		</div>	
	</div>	
	<!-- //main -->
	<!-- copyright -->
	<div class="w3copyright-agile">
		<p>© 2018 <a href="index.php" target="_blank">X Store</a></p>
	</div>
	<!-- //copyright --> 
</body>
</html>