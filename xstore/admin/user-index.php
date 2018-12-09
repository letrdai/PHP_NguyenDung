<?php  include_once'blocks/header.php'?>
<?php include_once'blocks/sidebar-left.php' ?>

        
            <div class="information">
                <div class="info container">
                    <div class="row">
                        <table class="table table-striped table-bordered">
              	<thead>
	                <tr>
	                	<th>Ảnh</th>
	                  	<th>Tên</th>
	                  	<th>Email</th>
	                  	<th>Số điện thoại</th>
	                  	<th>Quản lý</th>
	                </tr>
              	</thead>
              	<tbody>
              	<?php 
			   	include '../database.php';
			   	$conn = Database::connect();
			   	$sql = "SELECT * FROM users";
				$results = mysqli_query($conn, $sql);
				if ($results->num_rows > 0) {
				    // output data of each row
				    while($row = $results->fetch_assoc()) {
				        echo '<tr>';
				       	echo '<td>'.$row['avatar'].'</td>';
					   	echo '<td>'. $row['fullname'] . '</td>';
					   	echo '<td>'. $row['email'] . '</td>';
					   	echo '<td>'. $row['phone'] . '</td>';
					   	echo '<td width=250>';
					   	echo '<a class="btn btn-success" href="user-update.php?id='.$row['id'].'">Cập nhật</a>';
					   	echo '&nbsp;';
					   	echo '<a class="btn btn-danger" href="user-delete.php?id='.$row['id'].'">Xóa</a>';
					   	echo '</td>';
					   	echo '</tr>';
				    }
				} else {
				    echo "0 results";
				}
			   	Database::disconnect();
			  	?>
			      </tbody>
            </table>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</body>
</html>