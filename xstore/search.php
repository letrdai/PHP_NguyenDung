<?php
include_once 'blocks/header.php';
?>
<style>
        body {
            background-color: rgba(238, 238, 238, 0.25);
        }
        /*---------<adv-container>---------*/
        .adv-container {
            margin-bottom: 20px;
        }
            /*jssor slider loading skin spin css*/
            .jssorl-009-spin img {
                animation-name: jssorl-009-spin;
                animation-duration: 0.3s;
                animation-iteration-count: infinite;
                animation-timing-function: linear;
            }

            @keyframes jssorl-009-spin {
                from { transform: rotate(0deg); }
                to { transform: rotate(360deg); }
            }

            /*jssor slider bullet skin 051 css*/
            .jssorb051 .i {position:absolute;cursor:pointer;}
            .jssorb051 .i .b {fill:#fff;fill-opacity:0.5;}
            .jssorb051 .i:hover .b {fill-opacity:.7;}
            .jssorb051 .iav .b {fill-opacity: 1;}
            .jssorb051 .i.idn {opacity:.3;}

            /*jssor slider arrow skin 051 css*/
            .jssora051 {display:block;position:absolute;cursor:pointer;}
            .jssora051 .a {fill:none;stroke:#fff;stroke-width:360;stroke-miterlimit:10;}
            .jssora051:hover {opacity:.8;}
            .jssora051.jssora051dn {opacity:.5;}
            .jssora051.jssora051ds {opacity:.3;pointer-events:none;}

        /*---------<main-container>---------*/
        .product_view .modal-dialog{max-width: 800px; width: 100%;}
        .pre-cost{text-decoration: line-through; color: #a5a5a5;}
        .space-ten{padding: 10px 0;}


        .main-product {
            background-color: #fff;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .section-header {
            height: 54px;
            width: 100%;
            border: solid 1px #eee;
        }
        .section-header p {
            text-align: left;
            font-weight: bold;
            font-family: sans-serif;
            font-size: 22px;
            padding: 12px 0 12px 18px;
        }
        .section-header p a {
            text-decoration: none;
            color: #393d3f;
        }
        .product {
            height: 355px; 
            padding: 0px;
        }
        .item {
            height: 355px; 
            margin-bottom: 0px;
        }
        .item a img {
            height: 200px;
            margin: 10px auto;
        }
        /************************************************************
        *************************Footer******************************
        *************************************************************/

        @import url(http://fonts.googleapis.com/css?family=Fjalla+One);
        @import url(http://fonts.googleapis.com/css?family=Gudea);
        .footer1 {
            background-color: rgba(238, 238, 238, 0.25) url("../images/footer/footer-bg.png") repeat scroll left top;
            padding-top: 40px;
            padding-right: 0;
            padding-bottom: 20px;
            padding-left: 0;/*  border-top-width: 4px;
            border-top-style: solid;
            border-top-color: #003;*/
        }
        .title-widget {
            color: #898989;
            font-size: 20px;
            font-weight: 300;
            line-height: 1;
            position: relative;
            text-transform: uppercase;
            font-family: 'Fjalla One', sans-serif;
            margin-top: 0;
            margin-right: 0;
            margin-bottom: 25px;
            margin-left: 0;
            padding-left: 28px;
        }
        .title-widget::before {
            background-color: #ea5644;
            content: "";
            height: 22px;
            left: 0px;
            position: absolute;
            top: -2px;
            width: 5px;
        }
        .widget_nav_menu ul {
            list-style: outside none none;
            padding-left: 0;
        }
        .widget_archive ul li {
            background-color: rgba(0, 0, 0, 0.3);
            content: "";
            height: 3px;
            left: 0;
            position: absolute;
            top: 7px;
            width: 3px;
        }
        .widget_nav_menu ul li {
            font-size: 13px;
            font-weight: 700;
            line-height: 20px;
            position: relative;
            text-transform: uppercase;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            margin-bottom: 7px;
            padding-bottom: 7px;
            width:95%;
        }
        .title-median {
            color: #636363;
            font-size: 20px;
            line-height: 20px;
            margin: 0 0 15px;
            text-transform: uppercase;
            font-family: 'Fjalla One', sans-serif;
        }
        .footerp p {font-family: 'Gudea', sans-serif; }
        #social:hover {
            -webkit-transform:scale(1.1); 
            -moz-transform:scale(1.1); 
            -o-transform:scale(1.1); 
        }
        #social {
            -webkit-transform:scale(0.8);
            /* Browser Variations: */
            -moz-transform:scale(0.8);
            -o-transform:scale(0.8); 
            -webkit-transition-duration: 0.5s; 
            -moz-transition-duration: 0.5s;
            -o-transition-duration: 0.5s;
        }           
        /*Only Needed in Multi-Coloured Variation */
        .social-fb:hover {
            color: #3B5998;
        }
        .social-tw:hover {
            color: #4099FF;
        }
        .social-gp:hover {
            color: #d34836;
        }
        .social-em:hover {
            color: #f39c12;
        }
        .nomargin { margin:0px; padding:0px;}

        .footer-bottom {
            background-color: #15224f;
            min-height: 30px;
            width: 100%;
        }
        .copyright {
            color: #fff;
            line-height: 30px;
            min-height: 30px;
            padding: 7px 0;
        }
        .design {
            color: #fff;
            line-height: 30px;
            min-height: 30px;
            padding: 7px 0;
            text-align: right;
        }
        .design a {
            color: #fff;
        }

/************************************************************
*************************Footer******************************
*************************************************************/

/*--------------Home-page----------------*/
            .homepage-container {
                margin-top: 40px;
            }
            .home-page {
                margin: auto;
                font-size: 18px;
                color: #393d3f;
            }
            .home-page ul {
                list-style-type: none;
                vertical-align: bottom;
            }
            .home-page ul li {
                display: inline-block;
            }
            .home-page ul li.home a {
                color: #e11b1e;
                font-family: sans-serif;
            }
    </style>
<div class="container">
    <div class="row homepage-container">
        <div class="col-md-12 home-page">
            <ul>
                <li class="home">
                    <a href="index.php" title="Go to home page">Trang chủ</a>
                    <i class="glyphicon glyphicon-chevron-right"></i>
                </li>
                <li>
                    <p style="color: #000000; font-family: sans-serif; text-decoration: none;">Kết quả tìm kiếm cho: </p>
                </li>
                <?php
                $search = $_GET['search'];
                include_once 'database.php';
                $conn = Database::connect();
                $sql = "SELECT * FROM products WHERE status = 1 AND name LIKE '%$search%' ORDER BY id DESC";
                $results = mysqli_query($conn, $sql);
                ?>
                <li>
                    <p>'<?php echo $search ?>'</p>
                </li>
            </ul>
        </div>
    </div>
    <div class="row main-product">
        <div class="col-md-12">
            <div class="row product-container">
                <?php
                $search = $_GET['search'];
                include_once 'database.php';
                $conn = Database::connect();
                $sql = "SELECT * FROM products WHERE status = 1 AND name LIKE '%$search%' ORDER BY id DESC";
                $results = mysqli_query($conn, $sql);
                if ($results->num_rows > 0) {
                    while($row = $results->fetch_assoc()) {
                ?>
                <div class="col-md-3 product">
                    <div class="thumbnail item">
                        <?php 
                         $imgSrc = $row['thumbnail'] ? $row['thumbnail'] : "http://placehold.it/320x150";
                        ?>
                        <a href="item.php?id=<?php echo $row['id'] ?>"><img src="<?php echo $imgSrc; ?>" alt="" class="img-responsive"></a>
                        <div class="caption">                           
                            <h4><a style="text-decoration: none;" href="item.php?id=<?php echo $row['id'] ?>"><?php echo $row['name'] ?></a></h4>
                            <h4 style="font-family: sans-serif; margin: 0; color: red; font-weight: bold;"><?php echo number_format($row['price'],0,'.',',') . 'đ' ?></h4>                          
                        </div>
                        <div class="space-ten"></div>                       
                    </div>
                </div>
                <?php
                    }//end while
                } else {
                    echo "Không tìm thấy kết quả";
                }//end if
                ?>
            </div>
        </div>        
    </div>
</div>
<?php 
    include_once 'blocks/footer.php';
?>
