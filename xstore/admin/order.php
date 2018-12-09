<?php  include_once'blocks/s.php'?>
<?php include_once'blocks/h.php' ?>  
<div class="information">
                <div class="info container">
                    <h2>Quản lý đơn đặt hàng</h2>
                    <div class="row">
                        <table class="table table-striped table-bordered" >

                            <thead>
                                <tr>
                                    <th>Họ tên</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Địa chỉ</th>
                                    <th>Thời gian</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            include '../database.php';
                            $conn = Database::connect();
                            $sql = "SELECT * FROM orders";
                            $results = mysqli_query($conn, $sql);
                            if ($results->num_rows > 0) {
                                // output data of each row
                                while($row = $results->fetch_assoc()) {
                                    echo '<tr>';
                                    echo '<td>'. $row['fullname'] . '</td>';
                                    echo '<td>'. $row['email'] . '</td>';
                                    echo '<td>'. $row['phone'] . '</td>';
                                    echo '<td>'. $row['address'] . '</td>';
                                    echo '<td>'. $row['created_time'] . '</td>';
                                    echo '&nbsp;';
                                    echo '<td><a class="btn btn-success" href="orders-product.php?id='.$row['id'].'">Xem</a></td>';
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