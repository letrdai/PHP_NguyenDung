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

if(array_key_exists('userLogged', $_SESSION) && $_SESSION['userLogged']) {
	//Logged
} else {
	header('Location: login.php'); die;
}

require '../database.php';

if ( !empty($_POST)) {
	// keep track post values
	$username = $_POST['username'];
	$password = $_POST['password'];
	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$status = 1;
	$avatar = '';
	if(array_key_exists('avatar', $_FILES)){
		$avatar = uploadFile();
	}
	
	// insert data
	// $conn = Database::connect();

	$connObject = new Database();
	$conn = $connObject->connect();

	$sql = "INSERT INTO users (username, password, fullname, avatar, address, phone, email, status) VALUES ('$username', '$password', '$fullname', '$avatar', '$address','$phone', '$email', $status)";
	// die($sql);
	$conn->query($sql);
	Database::disconnect();
	header("Location: user-indexs.php");
}
?>


<?php  include_once'blocks/s.php'?>
<?php include_once'blocks/h.php' ?>

        
            <div class="information">
                <div class="info container">
                    <div class="row">
                        <div class="span10 offset1">	
							<form class="form-horizontal" method="post" enctype="multipart/form-data">
							  <div class="control-group">
							    <label class="control-label">Tài khoản</label>
							    <div class="controls">
							      	<input class="form-control" name="username" type="text"  placeholder="Username" required="">
							    </div>
							  </div>
							  <div class="control-group">
							    <label class="control-label">Mật khẩu</label>
							    <div class="controls">
							      	<input class="form-control" name="password" type="password"  placeholder="Password" required="">
							    </div>
							  </div>
							  <div class="control-group">
							    <label class="control-label">Họ và tên</label>
							    <div class="controls">
							      	<input class="form-control" name="fullname" type="text"  placeholder="Name" required="">
							    </div>
							  </div>							  
							  <div class="control-group">
							    <label class="control-label">Email</label>
							    <div class="controls">
							      	<input class="form-control" name="email" type="text" placeholder="Email Address" required="">
							    </div>
							  </div>
							  <div class="control-group">
							    <label class="control-label">Điện thoại</label>
							    <div class="controls">
							      	<input class="form-control" name="phone" type="number" placeholder="Số điện thoại" required="">
							    </div>
							  </div>
							  <div class="control-group">
							    <label class="control-label">Địa chỉ</label>
							    <div class="controls">
							    	<textarea  class="form-control" name="address" id="ckeditor_address"></textarea>
							      	<!-- <input name="address" type="text"  placeholder="Mobile Number" required=""> -->
							    </div>
							  </div>
							  <div class="control-group">
							    <label class="control-label">Avatar</label>
							    <div class="controls">
							      	<input name="avatar" type="file">
							      	<p>Chỉ ảnh đuôi .jpg, .png, .jpeg, .gif</p>
							    </div>
							  </div>
							  <div class="form-actions">
								  <button type="submit" class="btn btn-success">Xác nhận tạo mới</button>
								  <a class="btn" href="../index.php">Hủy</a>
								</div>
							</form>
						</div>
					<script>
				        // Replace the <textarea id="editor1"> with a CKEditor
				        // instance, using default configuration.
				        CKEDITOR.replace( 'ckeditor_address' );
				    </script>

                    </div>
                </div> 
            </div>
        </div>

    </div>

</body>
</html>