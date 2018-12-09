<?php  include_once'blocks/s.php'?> 
<?php include_once'blocks/h.php' ?>        
            <div class="information">
                <div class="info container">
                <h2>Quản lý sản phẩm</h2>
                <a class="btn btn-success" href="product-create.php">Thêm mới</a>
				<table class="table">
              	<thead>
	                <tr>
	                  	<th scope="col" style="width: 10%">Ảnh</th>
	                  	<th scope="col" style="width: 10%">Tên sản phẩm</th>
	                  	<th scope="col" style="width: 30%">Thông tin</th>
	                  	<th scope="col" style="width: 10%">Giá</th>
	                  	<th scope="col" style="width: 5%">Giảm giá</th>
	                  	<th scope="col" style="width: 10%">Nhóm hàng</th>
	                  	<th scope="col" style="width: 10%">Trạng thái</th>
	                  	<th style="width: 100px;">Quản lý</th>
	                </tr>
              	</thead>
              	<tbody>
              	<?php 
			   	include '../database.php';
			   	$conn = Database::connect();
			   	$sql = "SELECT * FROM products";
				$results = mysqli_query($conn, $sql);
				$total_item=0;
				if ($results->num_rows > 0) {
				    // output data of each row
				    while($row = $results->fetch_assoc()) {
				    	$total_item +=1;
				    	$description =substr($row['description'], 0, 150);
				        echo '<tr>';
					   	echo '<td style="width: 10%"><img class="img-thumbnail" src="../'. $row['thumbnail'] . '"/></td>';
					   	echo '<td style="width: 10%">'. $row['name'] . '</td>';
					   	echo '<td style="width: 30%">'.$description.'</td>';
					   	echo '<td style="width: 10%">'.$row['price'].'</td>';
					   	echo '<td style="width: 5%">'. $row['saleoff'] . '</td>';
					   	 if($row['category_id']==1){
					   	echo '<td style="width: 10%"> Điện thoại</td>';
					   	}
					   	if($row['category_id']==2){
					   	echo '<td style="width: 10%"> Máy tính bảng</td>';
					   	}
					   	if($row['category_id']==3){
					   	echo '<td style="width: 10%"> Laptop</td>';
					   	}
					   	if($row['category_id']==4){
					   	echo '<td style="width: 10%"> Phụ kiện</td>';
					   	}
					   	if($row['category_id']==5){
					   	echo '<td style="width: 10%"> Âm nhạc</td>';
					   	}
					   	if($row['status']==1){
					   	echo '<td style="width: 10%; color:blue;">Hiển thị</td>';
					   	}
					   	echo '<td>';
					   	//echo '<a class="btn" href="read.php?id='.$row['id'].'">Read</a>';	
					   	echo '&nbsp;';
					   	echo '<a class="btn btn-success" href="product-update.php?id='.$row['id'].'">Cập nhật</a>';
					   	echo '&nbsp;';
					   	echo '<a class="btn btn-danger" href="product-delete.php?id='.$row['id'].'">Xóa</a>';
					   	echo '</td>';
					   	echo '</tr>';
				    }
				} else {
				    echo "0 results";
				}
			   	Database::disconnect();
			  	?>
	            </div>
			      </tbody>
            </table>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</body>
</html>