<?php 
session_start();

function uploadFile($fileName = 'thumnail', $target_dir = "../upload/", $pathReturn = "upload/"){
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
require '../database.php';

if ( !empty($_POST)) {
	// keep track post values
	$name = $_POST['name'];
	$description = $_POST['description'];
	$parent_id = 1;
	$status = 1;
	$thumbnail = '';
	if(array_key_exists('thumbnail', $_FILES)){
		$thumnail = uploadFile();
	}
	// insert data
	// $conn = Database::connect();

	$connObject = new Database();
	$conn = $connObject->connect();

	$sql = "INSERT INTO `categories`(`id`, `name`, `description`, `thumbnail`, `parent_id`, `status`) VALUES ('','$name','$description','$thumbnail','$parent_id','$status')";
	$conn->query($sql);
	Database::disconnect();
	header("Location: category-index.php");
}
?>



<?php  include_once'blocks/s.php'?>
<?php include_once'blocks/h.php' ?>

		<div class="span10 offset1">	
			<form class="form-horizontal" action="create-category.php" method="post">
				
			  	<div class="input-group input-group-lg">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="inputGroup-sizing-lg">Tên Danh Mục</span>
				  </div>
				  <input type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" name="name">
				</div>
				<br>
				<div class="input-group input-group-lg">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="inputGroup-sizing-lg">Thông tin</span>
				  </div>
				  <input type="text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" name="description">
				</div>
			  	
				<div class="control-group">
				    <label class="control-label">Ảnh</label>
				    <div class="controls">
				      	<input name="thumnail" type="file">
				    </div>
				</div>
			  
			  	<div class="form-actions">
				  <button type="submit" class="btn btn-success">Xác nhận thêm mới</button>
				  <a class="btn" href="category-index.php">Hủy</a>
				</div>
			</form>
		</div>
    </div> <!-- /container -->
</body>
</html>