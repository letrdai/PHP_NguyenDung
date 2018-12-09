<?php
session_start();

require 'database.php';

if ( !empty($_POST)) {
	// keep track post values
	$fullname = $_POST['fullname'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$status = 0;
	date_default_timezone_set('Asia/Ho_Chi_Minh');
        $ldate = date('Y-m-d H:i:s');

	$connObject = new Database();
	$conn = $connObject->connect();

	$sql = "INSERT INTO orders (fullname, address, email, phone, status, created_time) VALUES ('$fullname', '$address', '$email', '$phone', $status, '$ldate')";
	// die($sql);
	$conn->query($sql);
	$order_id = $conn->insert_id;

	foreach ($_SESSION['cart'] as $productId => $product) {
		$sql = "INSERT INTO order_product (order_id, product_id, quantity, price) VALUES ($order_id, $productId, ".$product['quantity'].", ".$product['price'].")";
		$conn->query($sql);
	}

	unset($_SESSION['cart']);
	Database::disconnect();
	header("Location: index.php");
}