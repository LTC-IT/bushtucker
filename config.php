<?php
session_start();

// Database Configuration
$conn = new SQLite3('Bushtucker') or die("Unable to open database!");


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