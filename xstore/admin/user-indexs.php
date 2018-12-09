<?php  include_once'blocks/s.php'?>
<?php include_once'blocks/h.php' ?>        
            <div class="information">
                <div class="info container">
                    <h2>Quản lý tài khoản</h2>
                    <?php echo '<a class="btn btn-success" href="user-create.php">Thêm mới</a>';?>
                    <br>
                    <hr>
                    <br>
                    <div class="row">
                        <table class="table table-striped table-bordered" >
                            <thead>
                                <tr>
                                    <th style="width: 20%">Ảnh</th>
                                    <th style="width: 10%">Tên tài khoản</th>
                                    <th style="width: 20%">Email</th>
                                    <th style="width: 10%">Số điện thoại</th>
                                    <th style="width: 20%">Địa chỉ</th>
                                    <th style="width: 20%">Quản lý</th>
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
                                    echo '';
                                    echo '<td>'. '<img class="img-thumbnail" src="../'. $row['avatar'] . '"/>'.'</td>';
                                    echo '<td>'. $row['fullname'] . '</td>';
                                    echo '<td>'. $row['email'] . '</td>';
                                    echo '<td>'. $row['phone'] . '</td>';
                                    echo '<td>'. $row['address'] . '</td>';
                                    echo '<td width=250>';
                                    
                                    echo '&nbsp;';
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