<?php 
$id = null;
if ( !empty($_GET['id'])) {
	$id = $_REQUEST['id'];
}

if ( null==$id ) {
	header("Location: category-index.php");
}

require '../database.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// keep track post values
	$name = $_POST['name'];
	$description = $_POST['description'];
	$parent_id = $_POST['parent_id'];
	$status = $_POST['status'];
	$thumbnail = '';
	
	// update data
	$conn = Database::connect();
	$sql = "UPDATE `categories` SET `name`='$name',`description`='$description',`thumbnail`='',`parent_id`='$parent_id',`status`='$status' WHERE id=$id";
	$conn->query($sql);
	Database::disconnect();
	header("Location: category-index.php");
} else {
	$conn = Database::connect();
   	$sql = "SELECT * FROM categories WHERE id = $id";
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
                <div>
                	<div class="info container">
					<form class="form-horizontal" action="update-category.php?id=<?php echo $data['id']?>" method="post">
						<div class="control-group">
							<label class="control-label">Tên danh mục</label>
							<div class="controls">
								<input class="form-control" name="name" type="text"  placeholder="Name" value="<?php echo $data['name'];?>">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Thông tin</label>
							<div class="controls">
								<input class="form-control" name="description" type="text" placeholder="Description" value="<?php echo $data['description'];?>">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Ảnh</label>
							<div class="controls">
								<input  class="form-control" name="thumbnail" type="text" placeholder="Thumbnail" value="<?php echo $data['thumbnail'];?>">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Parent-id</label>
							<div class="controls">
								<input class="form-control" name="parent_id" type="text" placeholder="parent-id" value="<?php echo $data['parent_id'];?>">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Trạng thái</label>
							<div class="controls">
								<input class="form-control" name="status" type="text" placeholder="status" value="<?php echo $data['status'];?>">
							</div>
						</div>
						<div class="form-actions">
							<button type="submit" class="btn btn-success">Cập nhật</button>
							<a class="btn" href="category-index.php">Hủy</a>
						</div>
					</form>
                	</div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</body>
</html>