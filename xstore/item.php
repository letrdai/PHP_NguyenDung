<?php
if(array_key_exists('id', $_GET) && $_GET['id']){
    $productId = $_GET['id'];

    include 'database.php';
    $conn = Database::connect();
    $sql = "SELECT * FROM products WHERE status = 1 AND id = $productId";
    $results = mysqli_query($conn, $sql);
    if ($results->num_rows > 0) {
        $product = $results->fetch_assoc();
    } else {
        header("Location: index.php");
    }
} else {
    header("Location: index.php");
}

include_once 'blocks/header.php';
?>
<style type="text/css">
	ul > li{margin-right:0px;font-weight:lighter;cursor:pointer}
	li.active{border-bottom:3px solid silver;}

	.item-photo{display:flex;justify-content:center;align-items:center;border-right:1px solid #f6f6f6;}
	.menu-items{list-style-type:none;font-size:11px;display:inline-flex;margin-bottom:0;margin-top:20px}
	.btn-success{width:100%;border-radius:0;}
	.section{width:100%;margin-left:-15px;padding:2px;padding-left:15px;padding-right:15px;background:#f8f9f9}
	.title-price{margin-top:30px;margin-bottom:0;color:black}
	.title-attr{margin-top:0;margin-bottom:0;color:black;}
	.btn-minus{cursor:pointer;font-size:7px;display:flex;align-items:center;padding:5px;padding-left:10px;padding-right:10px;border:1px solid gray;border-radius:2px;border-right:0;}
	.btn-plus{cursor:pointer;font-size:7px;display:flex;align-items:center;padding:5px;padding-left:10px;padding-right:10px;border:1px solid gray;border-radius:2px;border-left:0;}
	div.section > div {width:100%;display:inline-flex;}
	div.section > div > input {margin:0;padding-left:5px;font-size:10px;padding-right:5px;max-width:18%;text-align:center;}
	.attr,.attr2{cursor:pointer;margin-right:5px;height:20px;font-size:10px;padding:2px;border:1px solid gray;border-radius:2px;}
	.attr.active,.attr2.active{ border:1px solid orange;}

	@media (max-width: 426px) {
	.container {margin-top:0px !important;}
	.container > .row{padding:0 !important;}
	.container > .row > .col-xs-12.col-sm-5{
	padding-right:0 ;    
	}
	.container > .row > .col-xs-12.col-sm-9 > div > p{
	padding-left:0 !important;
	padding-right:0 !important;
	}
	.container > .row > .col-xs-12.col-sm-9 > div > ul{
	padding-left:10px !important;

	}            
	.section{width:104%;}
	.menu-items{padding-left:0;}
	</style>
</style>
<script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
        showDivs(slideIndex += n);
    }

    function currentDiv(n) {
        showDivs(slideIndex = n);
    }

    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        if (n > x.length) {slideIndex = 1}
        if (n < 1) {slideIndex = x.length}
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
        }
        x[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " w3-opacity-off";
    }
</script>
<div class="container"">
	<div class="row">
		<div class="col-md-12" style="margin: auto;font-size: 18px; color: #393d3f;">
			<ul style="padding: 0; list-style-type: none; vertical-align: bottom;">
				<li style="display: inline-block; margin-right: 1px;">
					<a style="color: #e11b1e; font-family: sans-serif;" href="index.php" title="Trở về trang chủ">Trang chủ</a>
					<i class="glyphicon glyphicon-chevron-right"></i>
				</li>
				<?php 
			    include_once 'database.php';
			    $conn = Database::connect();
			    $sql = "SELECT * FROM products WHERE status = 1 AND id = $productId";
			    $results = mysqli_query($conn, $sql);
			    if ($results->num_rows > 0) {
			        while($row = $results->fetch_assoc()) {
			    ?>
				<li style="display: inline-block;">
					<p href="category.php?id=<?php echo $row['id'] ?>"><?php echo $row['name'] ?></p>
				</li>
				<?php 
        			}//end while
    			}//end if
    			?>
			</ul>
		</div>
	</div>
    <div class="row">
        <div class="col-md-12" style="float: left; width: 100%; margin-bottom: 15px; border-bottom: solid 2px #eee;">
            <?php 
            include_once 'database.php';
            $conn = Database::connect();
            $sql = "SELECT * FROM products WHERE status = 1 AND id = $productId";
            $results = mysqli_query($conn, $sql);
            if ($results->num_rows > 0) {
                while($row = $results->fetch_assoc()) {
            ?>
            <p style="margin-top: 0px; color: #393d3f; font-size: 24px; display: block; float: left; font-family: sans-serif;" href="item.php?id=<?php echo $row['id'] ?>"><?php echo $row['name'] ?></p>
            <?php 
                }//end while
            }//end if
            ?>
        </div>
    </div>    
	<div class="row">
        <div class="col-md-4 item-photo">
            <?php 
            include_once 'database.php';
            $conn = Database::connect();
            $sql = "SELECT * FROM products WHERE status = 1 AND id = $productId";
            $results = mysqli_query($conn, $sql);
            if ($results->num_rows > 0) {
                while($row = $results->fetch_assoc()) {
            ?>
            <?php 
            $imgSrc = $row['thumbnail'] ? $row['thumbnail'] : "http://placehold.it/320x150";
            ?>
            <img style="height: 350px;" src="<?php echo $imgSrc; ?>" />
            <?php 
                }//end while
            }//end if
            ?>
        </div>
        <div class="col-md-4" style="border:0px solid gray">
            <!-- Datos del vendedor y titulo del producto -->
            <h4>Bạn đang mua hàng từ Xstore</h4>
			</ul>
            <!-- Price -->
            <?php 
            include_once 'database.php';
            $conn = Database::connect();
            $sql = "SELECT * FROM products WHERE status = 1 AND id = $productId";
            $results = mysqli_query($conn, $sql);
            if ($results->num_rows > 0) {
                while($row = $results->fetch_assoc()) {
            ?>
            <h3 style="margin-top:0px; font-size: 22px; color: red; font-weight: bold;"><?php echo number_format($row['price'],0,'.',',') . 'đ' ?></h3>
            <?php 
                }//end while
            }//end if
            ?>
            <!-- Detalles especificos del producto -->
            <div class="section">
                <?php 
                include_once 'database.php';
                $conn = Database::connect();
                $sql = "SELECT * FROM products WHERE status = 1 AND id = $productId";
                $results = mysqli_query($conn, $sql);
                if ($results->num_rows > 0) {
                    while($row = $results->fetch_assoc()) {
                ?>
                <p>
                    <small>
                    <?php //echo $row['description'] ?>
                    </small>
                </p>
                <?php 
                    }//end while
                }//end if
                ?>               
            </div>
            <div class="section">
                
            </div>
            <div class="section" style="padding-bottom:5px;">
                
            </div> 
            <div class="section">
                <?php 
                include_once 'database.php';
                $conn = Database::connect();
                $sql = "SELECT * FROM products WHERE status = 1 AND id = $productId";
                $results = mysqli_query($conn, $sql);
                if ($results->num_rows > 0) {
                    while($row = $results->fetch_assoc()) {
                ?>
                <h3 style="color: red; margin-top: 5px; margin-bottom: 5px;">Giảm giá: <?php echo $product['saleoff'] . '%'; ?></h3>
                <?php 
                    }//end while
                }//end if
                ?>
            </div>  
            <div class="section" style="padding-bottom:20px;">
                <form action="cart.php" method="GET">
                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                    <h3 style="margin-top: 5px;">Số lượng</h3>
                    <input type="number" name="quantity" value="1">
                    <div class="section" style="padding-top:20px;">
                        <button type="submit" class="btn btn-success"><span style="margin-right:20px" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Mua ngay</button>
                    </div> 
                </form>
            </div>                                                        
        </div>                              

        <div class="col-md-4">
            <div style="width:100%;">
                <h2>Thông số kỹ thuật</h2>
                <?php 
                include_once 'database.php';
                $conn = Database::connect();
                $sql = "SELECT * FROM products WHERE status = 1 AND id = $productId";
                $results = mysqli_query($conn, $sql);
                if ($results->num_rows > 0) {
                    while($row = $results->fetch_assoc()) {
                ?>
                <p>
                    
                    <?php echo $row['description'] ?>
                   
                </p>
                <?php 
                    }//end while
                }//end if
                ?>    
            </div>
        </div>		
    </div>
</div>
<?php
    include_once 'blocks/footer.php';
?>   