 <?php 
$id = null;
if ( !empty($_GET['id'])) {
	$id = $_REQUEST['id'];
}

if ( null==$id ) {
	header("Location: index.php");
}

require '../database.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// keep track post values
	$fullname = $_POST['fullname'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	
	// update data
	$conn = Database::connect();
	$sql = "UPDATE users SET `fullname`='$fullname', `phone`='$phone', `email`='$email', `address`='$address' WHERE id=$id";
	$conn->query($sql);
	Database::disconnect();
	header("Location: index.php");
} else {
	$conn = Database::connect();
   	$sql = "SELECT * FROM users WHERE id = $id";
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
                        <div class="span10 offset1">
							<form class="form-horizontal" action="user-update.php?id=<?php echo $data['id']?>" method="post">
								<div class="col-md-5">
									<div class="control-group">
										<label class="control-label">Ảnh đại diện</label>
										<div class="controls">
											<?php echo '<img class="img-thumbnail" src="../'. $data['avatar'] . '"/>'; ?>
										</div>
									</div>
								</div>
								<div class="col-md-7">
									<div class="control-group">
									<label class="control-label">Họ và tên</label>
									<div class="controls">
										<input name="fullname" type="text" class="form-control" placeholder="Name" value="<?php echo $data['fullname'];?>">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Số điện thoại</label>
									<div class="controls">
										<input name="phone" type="number" class="form-control" placeholder="Mobile Number" value="<?php echo $data['phone'];?>">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Email</label>
									<div class="controls">
										<input name="email" type="text" class="form-control" placeholder="Email" value="<?php echo $data['email'];?>">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Địa chỉ</label>
									<div class="controls">
										<input name="address" type="text" class="form-control" placeholder="address" value="<?php echo $data['address'];?>">
									</div>
								</div>
								<div class="form-actions">
									<button type="submit" class="btn btn-success">Cập nhật</button>
									<a class="btn" href="index.php">Hủy</a>
								</div>
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