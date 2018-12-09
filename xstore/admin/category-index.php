<?php  include_once'blocks/s.php'?>
<?php include_once'blocks/h.php' ?>

        
            <div class="information">
                <div class="info container">
                	<h2>Quản lý danh mục</h2>
                    <div class="row">
                    	<?php echo '<a class="btn btn-success" href="create-category.php">Thêm mới</a>';?>
                    	<br>
                    	<br>
                       <table class="table table-striped table-bordered">
              	<thead>
	                <tr>
	                  	<th>Tên danh mục</th>
	                  	<th>Thông tin</th>
	                  	<th>Ảnh</th>
	                  	<th>Parent-id</th>
	                  	<th>Trạng thái</th>
	                  	<th>Quản lý</th>
	                </tr>
              	</thead>
              	<tbody>
              	<?php 
			   	include '../database.php';
			   	$conn = Database::connect();
			   	$sql = "SELECT * FROM categories";
				$results = mysqli_query($conn, $sql);
				if ($results->num_rows > 0) {
				    // output data of each row
				    while($row = $results->fetch_assoc()) {
				        echo '<tr>';
					   	echo '<td>'. $row['name'] . '</td>';
					   	echo '<td>'. $row['description'] . '</td>';
					   	echo '<td>'.$row['thumbnail'].'</td>';
					   	echo '<td>'.$row['parent_id'].'</td>';
					   	echo '<td>'. $row['status'] . '</td>';
					   	echo '<td width=250>';
					   	//echo '<a class="btn" href="read.php?id='.$row['id'].'">Read</a>';
					   	echo '&nbsp;';
					   	
					   	echo '&nbsp;';
					   	echo '<a class="btn btn-success" href="update-category.php?id='.$row['id'].'">Cập nhật</a>';
					   	echo '&nbsp;';
					   	echo '<a class="btn btn-danger" href="category-delete.php?id='.$row['id'].'">Xóa</a>';
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