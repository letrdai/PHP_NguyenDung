<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="assets/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
</head>
<body>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'ckeditor_address' );
    </script>
    <div class="admin-container">
        <div class="header-bar">
            <div class="header-left">
                <ul class="nav nav-pills">
                  <li role="presentation" class="active"><a href="../index.php">DLD Phone</a></li>
                  <li role="presentation"><a href="index.php">Quản lý tài khoản</a></li>
                  <li role="presentation"><a href="category-index.php">Danh mục</a></li>
                  <li role="presentation"><a href="product-index.php">Sản phẩm</a></li>
                  <li role="presentation"><a href="order.php">Đơn hàng</a></li>
                </ul>
            </div>
            <div class="header-right">
                <div class="signin" style="">
                    <a href="logout.php" class="logout">Đăng xuất<i class="fas fa-sign-out-alt"></i></a>
                </div>
            </div>        
        </div>