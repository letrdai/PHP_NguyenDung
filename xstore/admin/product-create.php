<?php 
session_start();

function uploadFile($fileName = 'thumbnail', $target_dir = "../upload/", $pathReturn = "upload/"){
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

if(array_key_exists('z', $_SESSION) && $_SESSION['userLogged']) {
	//Logged
} else {
	header('Location: login.php'); die;
}

require '../database.php';

if ( !empty($_POST)) {
	// keep track post values
	$name = $_POST['name'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	$saleoff = $_POST['saleoff'];
	$category_id = $_POST['category_id'];
	$status = 1;
	$thumbnail = '';
	if(array_key_exists('thumbnail', $_FILES)){
		$thumbnail = uploadFile();
	}
	
	// insert data
	// $conn = Database::connect();

	$connObject = new Database();
	$conn = $connObject->connect();


	$sql = "INSERT INTO `products`(`id`, `name`, `description`, `thumbnail`, `price`, `saleoff`, `category_id`, `status`) VALUES ('','$name','$description','$thumbnail','$price','$saleoff','$category_id','$status')";
	// die($sql);
	$conn->query($sql);
	Database::disconnect();
	header("Location: product-index.php");
}
?>


<?php  include_once'blocks/s.php'?> 
<?php include_once'blocks/h.php' ?>

        
            <div class="information">
                <div class="info container">
                    <div class="row">
						<form class="form-horizontal" method="post" enctype="multipart/form-data">
						  <div class="control-group">
						    <label class="control-label">Tên sản phẩm</label>
						    <div class="controls">
						      	<input  class="form-control"  name="name" type="text"  placeholder="Name Product" required="">
						    </div>
						  </div>
						  <div class="control-group">
						    <label class="control-label">Thumbnail</label>
						    <div class="controls">
						      	<input name="thumbnail" type="file">
						    </div>
						  </div>
						  <div class="control-group">
						    <label class="control-label">Giá</label>
						    <div class="controls">
						      	<input  class="form-control"  name="price" type="text"  placeholder="Price" required="">
						    </div>
						  </div>
						  <div class="control-group">
						    <label class="control-label">Sale off</label>
						    <div class="controls">
						      	<input  class="form-control"  name="saleoff" type="text"  placeholder="Sale off" required="">
						    </div>
						  </div>
						  <div class="control-group">
						    <label   class="control-label">Danh mục</label>
						    <div class="controls">
						    	<select  class="form-control"  name="category_id">
						    		<option value="1">Phone</option>
						    		<option value="2">Tablet</option>
						    		<option value="3">LapTop</option>
						    		<option value="4">Camera</option>
						    	</select>
						    </div>
						  </div>
						  <div class="control-group">
						    <label    class="control-label">Trạng thái</label>
						    <div class="controls">
						      	<select class="form-control"  name="status">
						      		<option value="1">Còn Hàng</option>
						      		<option value="2">Hết hàng</option>
						      	</select>
						    </div>
						  </div>
						  <div class="control-group">
						    <label class="control-label">Desciption</label>
						    <div class="controls">
						    	<textarea  class="form-control" name="description" id="ckeditor_address"></textarea>
						      	<!-- <input name="address" type="text"  placeholder="Mobile Number" required=""> -->
						    </div>
						  </div>
						  <div class="form-actions">
							  <button type="submit" class="btn btn-success">Tạo mới</button>
							  <a class="btn" href="product-index.php">Hủy</a>
							</div>
						</form>
                    </div>
                </div> 
            </div>
        </div>
    </div>

    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'ckeditor_address' );
    </script>
</body>
</html>