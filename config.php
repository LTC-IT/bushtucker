<?php
session_start();

// Database Configuration
$conn = new SQLite3('Bushtucker') or die("Unable to open database!");
//$query = "CREATE TABLE IF NOT EXISTS `user`(user_id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, username TEXT, password varchar(255), name TEXT, profilePic TEXT, accessLevel INTEGER)";
//$conn->exec($query);
//$query = "CREATE TABLE IF NOT EXISTS `messenging`(contact_id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, userEmail TEXT, message TEXT, dateSubmitted DATETIME)";
//$conn->exec($query);
//$query = "CREATE TABLE IF NOT EXISTS `products`(product_id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, productName TEXT, productQuantity INTEGER, productPrice DOUBLE, productImage TEXT)";
//$conn->exec($query);
//$query = "CREATE TABLE IF NOT EXISTS `orderDetails`(product_id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, productName TEXT, productQuantity INTEGER, productPrice DOUBLE, productImage TEXT)";
//$conn->exec($query);

$query = file_get_contents("sql/create-user.sql");
$stmt = $conn->prepare($query);

if ($stmt->execute()){
    echo "User Table Success";
}else{
    echo "User Table Fail";
}

$query = file_get_contents("sql/create-messaging.sql");
$stmt = $conn->prepare($query);

if ($stmt->execute()){
    echo "Messaging Table Success";
}else{
    echo "Messaging Table Fail";
}

$query = file_get_contents("sql/create-orderDetails.sql");
$stmt = $conn->prepare($query);

if ($stmt->execute()){
    echo "orderDetails Table Success";
}else{
    echo "orderDetails Table Fail";
}

$query = file_get_contents("sql/create-products.sql");
$stmt = $conn->prepare($query);

if ($stmt->execute()){
    echo "products Table Success";
}else{
    echo "products Table Fail";
}

$query = $conn->query("SELECT COUNT(*) as count FROM `user`");
$row = $query->fetchArray();
$countRow = $row['count'];