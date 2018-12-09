<?php  include_once'blocks/s.php'?> 
<?php include_once'blocks/h.php';
$order_id=$_GET['id'];

 ?>        
            <div class="information">
                <div class="info container">
                <h2>Quản lý đơn hàng số : <?php echo($order_id); ?></h2>
                
				<table class="table">
              	<thead>
	                <tr>
	                  	<th scope="col" style="width: 30%">Tên sản phẩm</th>
	                  	<th scope="col" style="width: 30%">Đơn giá(đồng)</th>
	                  	<th scope="col" style="width: 30%">Số lượng sản phẩm</th>
	                  	<th scope="col" style="width: 30%">Tổng số tiền(đồng)</th>
	                  	<th></th>
	                  	<th></th>
	                  	
	                </tr>
              	</thead>
              	<tbody>
              	<?php 
			   	include '../database.php';
			   	$conn = Database::connect();
			   	$sql = "SELECT * FROM `order_product` WHERE `order_id` = '$order_id'";
				$results = mysqli_query($conn, $sql);

				$total_item=0;
				if ($results->num_rows > 0) {
					
				    // output data of each row
				    while($row = $results->fetch_array()) {
				    		//var_dump($row);
					    	$total_item +=1;
					    	$product_id = $row['product_id'];
					    	$conn = Database::connect();
						   	$sql = "SELECT * FROM `products` WHERE `id`='$product_id'";
							$results = mysqli_query($conn, $sql);
							if ($results->num_rows > 0) {
								$data = $results->fetch_array();
							}
				        echo '<tr>';
					   	echo '<td style="width: 30%">'.$data['name'];'.</td>'; 
					   	 echo '<td style="width: 30%">'.$data['price'];'.</td>'; 
					   	echo '<td style="width: 30%">'. $row['quantity'];'.</td>';   	
					   	echo '<td style="width: 30%">'. $row['price']*$row['quantity'];'.</td>';
					   	//echo '<a class="btn" href="read.php?id='.$row['id'].'">Read</a>';	
					   	echo '<td>';
					   	// echo '&nbsp;';
					   	// echo '<a class="btn btn-success" href="product-update.php?id='.$row['id'].'">Cập nhật</a>';
					   	// echo '&nbsp;';
					   	// echo '<a class="btn btn-danger" href="product-delete.php?id='.$row['id'].'">Xóa</a>';
					   	// echo '</td>';
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