<?php 
$id = null;
if ( !empty($_GET['id'])) {
	$id = $_REQUEST['id'];
}

if ( null==$id ) {
	header("Location: product-index.php");
}

require '../database.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// keep track post values
	$name = $_POST['name'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	$saleoff = $_POST['saleoff'];
	$category_id = $_POST['category_id'];
	$status = 1;
	$thumbnail = '';
	
	// update data
	$conn = Database::connect();
	$sql = "UPDATE products SET `name`='$name',`description`='$description',`price`='$price',`saleoff`='$saleoff',`category_id`='$category_id',`status`='$status' WHERE id=$id";
	$conn->query($sql);
	Database::disconnect();
	header("Location: product-index.php");
} else {
	$conn = Database::connect();
   	$sql = "SELECT * FROM products WHERE id = $id";
	$results = mysqli_query($conn, $sql);
	if ($results->num_rows > 0) {
		$data = $results->fetch_array();
	}
	Database::disconnect();
}
?>

<?php  include_once'blocks/s.php'?> 
<?php include_once'blocks/h.php' ?>

        
            <div class="information">
                <div class="info container">
					<form class="form-horizontal" action="product-update.php?id=<?php echo $data['id']?>" method="post">
						<div class="row">
							<div class="col-md-5">
								<div class="control-group">
									<label class="control-label">Thumbnail</label>
									<div class="controls">
										<?php echo '<img class="img-thumbnail" src="../'. $data['thumbnail'] . '"/>'; ?>
									</div>
								</div>
							</div>
							<div class="col-md-7">
								<div class="control-group">
							<label class="control-label">Tên sản phẩm</label>
							<div class="controls">
								<input class="form-control" name="name" type="text"  placeholder="Name" value="<?php echo $data['name'];?>">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Thông tin sản phẩm</label>
							<div class="controls">
								
								<textarea id="ckeditor_address" class="form-control" name="description"><?php echo $data['description'];?></textarea>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Giá</label>
							<div class="controls">
								<input class="form-control" name="price" type="text" placeholder="Price" value="<?php echo $data['price'];?>">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Giảm giá</label>
							<div class="controls">
								<input class="form-control" name="saleoff" type="text" placeholder="Saleoff" value="<?php echo $data['saleoff'];?>">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" >Nhóm sản phẩm cũ</label>
							<div class="controls">
								<select class="custom-select">
									<option  class="form-control"><?php if($data['category_id']==1) echo "Điện thoại"; if($data['category_id']==2) echo "Tablet";if($data['category_id']==3) echo "Laptop";if($data['category_id']==4) echo "Camera";?></option>
									
								</select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Nhóm sản phẩm mới</label>
							<div class="controls">
								<select class="custom-select" name="category_id">
									<option name="category_id" value="1">Phone</option>
									<option name="category_id" value="2">Tablet</option>
									<option name="category_id" value="3">Laptop</option>
									<option name="category_id" value="4">Camera</option>
									
								</select>
							</div>
						</div>
						<div class="form-actions">
							<button type="submit" class="btn btn-success">Cập nhật</button>
							<a class="btn" href="product-index.php">Hủy</a>
						</div>
							</div>
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