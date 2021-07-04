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

$query = file_get_contents("sql/tables.sql");
$stmt = $conn->prepare($query);

if ($stmt->execute()){
    echo "Success";
}else{
    echo "Fail";
}

$query = $conn->query("SELECT COUNT(*) as count FROM `user`");
$row = $query->fetchArray();
$countRow = $row['count'];