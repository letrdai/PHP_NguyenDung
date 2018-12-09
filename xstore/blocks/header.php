<?php
 	error_reporting(0);
 	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="description" content="Demo website ban hang">
	<meta name="author" content="Nguyen Anh Duc, Le Trong Dai, Tran Van Tai, Tran Nam Quang">
	<title>Xstore - Hệ thống bán lẻ điện thoại, iPad, phụ kiện chính hãng</title>
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css">
	<script type="text/javascript" src="assets/bootstrap/css/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery-1.11.1.js"></script>
    <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="http://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css"> -->
    <style>
        .mySlides {display:none}
        .demo {cursor:pointer}
    </style>
	<script type="text/javascript">
        $(document).ready(function(){
            $(".dropdown").hover(            
                function() {
                    $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
                    $(this).toggleClass('open');        
                },
                function() {
                    $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
                    $(this).toggleClass('open');       
                }
            );
        });

        $(document).ready( function() {
            $('#myCarousel').carousel({
                interval:   4000
            });
            
            var clickEvent = false;
            $('#myCarousel').on('click', '.nav a', function() {
                    clickEvent = true;
                    $('.nav li').removeClass('active');
                    $(this).parent().addClass('active');        
            }).on('slid.bs.carousel', function(e) {
                if(!clickEvent) {
                    var count = $('.nav').children().length -1;
                    var current = $('.nav li.active');
                    current.removeClass('active').next().addClass('active');
                    var id = parseInt(current.data('slide-to'));
                    if(count == id) {
                        $('.nav li').first().addClass('active');    
                    }
                }
                clickEvent = false;
            });
        });   
    </script>
</head>
<body>

<nav class="navbar navbar-default" role="navigation" style="background-color: rgb(51,79,111);">
    <div class="container" style="background-color: rgb(51,79,111);">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	        </button>
	        <a class="navbar-brand" href="index.php"><img style="margin-top: -15px; width: 70px; height: 50px;" src="../xstore/assets/img/logo/logo-02.png"></a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="navbar-collapse style= collapse in" id="bs-megadropdown-tabs" style="padding-left: 0px;">
	        <ul class="nav navbar-nav">
	            <li><a href="index.php"><i class="fa fa-globe"></i> STORE</a></li>	            
	            <li class="dropdown mega-dropdown">
				    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-space-shuttle"></i> DANH MỤC <span class="caret"></span></a>				
					<div id="filters" class="dropdown-menu mega-dropdown-menu">
	                    <div class="container-fluid2">
	    				    <!-- Tab panes -->
	                        <div class="tab-content">                        
	                            <div class="tab-pane active" id="kids">
	                                <ul class="nav-list list-inline">
	                                    <?php 
	                                    include_once 'database.php';
	                                    $conn = Database::connect();
	                                    $sql = "SELECT * FROM categories WHERE status = 1";
	                                    $results = mysqli_query($conn, $sql);
	                                    if ($results->num_rows > 0) {
	                                        while($row = $results->fetch_assoc()) {
	                                            // echo "<pre>";
	                                            // var_dump($row); 
	                                            // echo "</pre>";
	                                            // die;
	                                    ?>
	                                    <li>
	                                        <a data-filter=".89" href="category.php?id=<?php echo $row['id'] ?>"><img src="<?php echo $row['thumbnail']?>">
	                                            <span style="text-align: center;"><?php echo $row['name'] ?></span>
	                                        </a>
	                                    </li>
	                                    <?php 
	                                        }//end while
	                                    }//end if
	                                    ?>
	                                </ul>
	                            </div>
	                        </div>
	                    </div>                   
					</div>				
				</li>
	        </ul>
	        <form class="navbar-form navbar-left" action="search.php" method="GET" role="search">
	            <div class="form-group">
	               <input type="text" name="search" class="form-control" placeholder="Vui lòng nhập">
	            </div>
	            <button type="submit" class="btn btn-default">Tìm Kiếm</button>
	        </form>
	        <ul class="nav navbar-nav navbar-right">
	            <li class="dropdown">
	                <a href="cart.php" class="dropdown-toggle" data-toggle="dropdown">
	                    <span class="glyphicon glyphicon-shopping-cart"></span> 
	                    <strong>GIỎ HÀNG</strong>
	                </a>
	            </li>
	            <li class="dropdown">
	                <a href="new-register.php" class="dropdown-toggle" data-toggle="dropdown">
	                    <span class="glyphicon glyphicon-edit"></span> 
	                    <strong>ĐĂNG KÝ</strong>
	                </a>
	            </li>
	            <?php if(array_key_exists('userLogged', $_SESSION) && $_SESSION['userLogged']){ ?>
	            <li class="dropdown">
	                <a href="user-index.php" class="dropdown-toggle" data-toggle="dropdown">
	                    <span class="glyphicon glyphicon-user"></span> 
	                    <strong><?php echo $_SESSION['userLogged']['username'] ?></strong>
	                </a>
	            </li>
	            <li class="dropdown">
	                <a href="logout.php" class="dropdown-toggle" data-toggle="dropdown">
	                    <span class="glyphicon glyphicon-log-out"></span>
	                </a>
	            </li>
	            <?php } else { ?>
	            <li class="dropdown">
	                <a href="login.php" class="dropdown-toggle" data-toggle="dropdown">
	                    <span class="glyphicon glyphicon-user"></span> 
	                    <strong>ĐĂNG NHẬP</strong>
	                </a>
	            </li>
                <?php } ?>
	        </ul>
	    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>