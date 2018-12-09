<?php
session_start();

if(array_key_exists('product_id', $_GET) && $_GET['product_id']){
	//Add to cart

	//get data
	$productId = $_GET['product_id'];
	$quantity = $_GET['quantity'] ? $_GET['quantity'] : 1;
	// if($_GET['quantity']){
	// 	$quantity = $_GET['quantity'];
	// }else{
	// 	$quantity = 1;
	// }

	//get product info
	include 'database.php';
    $conn = Database::connect();
    $sql = "SELECT thumbnail, name, price FROM products WHERE status = 1 AND id = $productId";
    $results = mysqli_query($conn, $sql);
    if ($results->num_rows > 0) {
        $product = $results->fetch_assoc();
        $product['quantity'] = $quantity;
    } else {
    	//product not exist
        header("Location: index.php"); die;
    }
	
	//set SESSION cart
	if(array_key_exists('cart', $_SESSION) && $_SESSION['cart']){
		//cart have products
		if(array_key_exists($productId, $_SESSION['cart']) && $_SESSION['cart'][$productId]){
			//this product exist in cart
			$_SESSION['cart'][$productId]['quantity'] += $quantity;
            //unset($_SESSION['cart'][$productId]);
            //he
		} else {
			//this product not exist in cart
			$_SESSION['cart'][$productId] = $product;
		}
	} else {
		//new cart
		$_SESSION['cart'] = array(
			$productId => $product,
		);
	}
	header("Location: cart.php"); die;
} else {
?>
    <?php  include 'blocks/header.php'; ?>
    <link rel="stylesheet" href="assets/css/style1.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<div class="container">
        <div class="row">
            <div class="col-md-12">
                <table id="cart" class="table table-hover table-condensed">
                    <thead>
                        <tr>
                            <th style="width:15%">Ảnh</th>
                            <th style="width:35%">Tên sản phẩm</th>
                            <th style="width:10%">Sô lượng</th>
                            <th style="width:20%" class="text-center">Giá</th>
                            <th style="width:10%">Hủy</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $total = 0;
                        foreach ($_SESSION['cart'] as $productId => $product) { 
                            $total += $product['price'] * $product['quantity'];
                        ?>
                        <tr>
                            <td data-th="Product">
                                <div class="row">
                                    <div class="col-sm-12 hidden-xs"><img src="<?php echo $product['thumbnail']; ?>" alt="..." class="img-responsive"/>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Tên"><?php echo $product['name']; ?></td>
                            <td data-th="Số lượng"><?php echo $product['quantity']; ?></td>
                            <td data-th="Giá" class="text-center"><?php echo number_format($product['price'] * $product['quantity'], 0, ',', '.') . ' đ'; ?></td>
                            <td class="actions" data-th="">
                                <a href="remove-cart.php?id=<?php echo $productId ?>" class="btn btn-default btn-sm">
                                  <span class="glyphicon glyphicon-remove"></span> Hủy sản phẩm</a>                               
                            </td>
                        </tr>
                        <?php }//end foreach ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td><a href="index.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua sắm</a></td>
                            <td colspan="2" class="hidden-xs"></td>
                            <td class="hidden-xs text-center"><strong>Tổng tiền</strong></td>
                            <td><?php echo number_format($total, 0, ',', '.') . ' đ'; ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="col-md-12">
                <?php $userLogged = $_SESSION['userLogged'] ? $_SESSION['userLogged'] : array(); ?>
                <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">   
                        <div class="panel-body" >
                            <form method="post" action="checkout.php">
                                <input type='hidden' name='csrfmiddlewaretoken' value='XFe2rTYl9WOpV8U6X5CfbIuOZOELJ97S' />
                                <form  class="form-horizontal" method="post" >
                                    <input type='hidden' name='csrfmiddlewaretoken' value='XFe2rTYl9WOpV8U6X5CfbIuOZOELJ97S' />
                                    <div id="div_id_username" class="form-group required">
                                        <label for="id_username" class="control-label col-md-4  requiredField"> Họ tên<span class="asteriskField">*</span> </label>
                                        <div class="controls col-md-8 ">
                                            <input class="input-md  textinput textInput form-control" id="id_username" maxlength="30" name="fullname" placeholder="Họ tên của bạn" style="margin-bottom: 10px" type="text" value="<?php echo $userLogged['fullname'] ?>" required="" />
                                        </div>
                                    </div>
                                    <div id="div_id_name" class="form-group required"> 
                                        <label for="id_name" class="control-label col-md-4  requiredField"> Địa chỉ<span class="asteriskField">*</span> </label> 
                                        <div class="controls col-md-8 "> 
                                            <input class="input-md textinput textInput form-control" id="id_name" name="address" required="" value="<?php echo $userLogged['address'] ?>" placeholder="Đại chỉ của bạn" style="margin-bottom: 10px" type="text" />
                                        </div>
                                    </div>
                                    <div id="div_id_name" class="form-group required"> 
                                        <label for="id_name" class="control-label col-md-4  requiredField"> Số điện thoại<span class="asteriskField">*</span> </label> 
                                        <div class="controls col-md-8 "> 
                                            <input class="input-md textinput textInput form-control" id="id_name" name="phone" required="" value="<?php echo $userLogged['phone'] ?>" placeholder="Số điện thoại" style="margin-bottom: 10px" type="text" />
                                        </div>
                                    </div> 
                                    <div id="div_id_email" class="form-group required">
                                        <label for="id_email" class="control-label col-md-4  requiredField"> E-mail<span class="asteriskField">*</span> </label>
                                        <div class="controls col-md-8 ">
                                            <input class="input-md emailinput form-control" id="id_email" name="email" required="" value="<?php echo $userLogged['email'] ?>" placeholder="Email của bạn" style="margin-bottom: 10px" type="email" />
                                        </div>     
                                    </div>
                                    <div class="form-group"> 
                                        <div class="aab controls col-md-4 "></div>
                                        <div class="controls col-md-8 ">
                                            <input type="submit" name="Signup" value="Mua ngay" class="btn btn btn-primary" id="button-id-signup" />
                                        </div>
                                    </div>  
                                </form>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}//end if
?>