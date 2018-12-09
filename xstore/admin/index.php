<?php session_start();
if(array_key_exists('userLogged', $_SESSION) && $_SESSION['userLogged']) {
    //Logged
} else {
    header('Location: login.php'); die;
}?>
<?php
    include_once 'blocks/s.php';
    include_once 'blocks/h.php';
?>
            
                <div class="user-dashboard">
                    <h1>Hello, Admin</h1>
                    <div class="row">
                        <div class="card text-white bg-primary mb-3 " style="max-width: 18rem;">
                            <h3 style="text-align: center; " class="font-weight-normal">Tải khoản đang hoạt động</h3>
                            <hr>
                            <?php 
                            include '../database.php';
                            $conn = Database::connect();
                            $sql = "SELECT * FROM users where status = '1'";
                            $results = mysqli_query($conn, $sql);
                            ?>
                            <h2 style="text-align: center;"><?php
                            $i=0;
                            if ($results->num_rows > 0) {
                                // output data of each row
                                while($row = $results->fetch_assoc()) {
                                    $i=$i+1;
                                }
                            } else {
                                echo "0 results";
                            }
                            
                            echo $i;
                            ?>
                            </h2>
                        </div>
                        <div style="padding-right: 15px;"></div>
                        <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                            <h3 style="text-align: center;">Sản phẩm đang được bán tại cửa hàng</h3>
                            <hr>
                            <?php 
                            //include '../database.php';
                            $conn = Database::connect();
                            $sql = "SELECT * FROM products WHERE status ='1'";
                            $results = mysqli_query($conn, $sql);
                            ?>
                            <h2 style="text-align: center;"><?php
                            $j=0;
                            if ($results->num_rows > 0) {
                                // output data of each row
                                while($row = $results->fetch_assoc()) {
                                    $j=$j+1;
                                }
                            } else {
                                echo "0 results";
                            }
                            
                            echo $j;
                            ?>
                            </h2>
                        </div>
                        <div style="padding-right: 15px;"></div>    
                    </div>
                </div>
            </div>
        </div>

    </div>



    <!-- Modal -->
</body>
</html>
