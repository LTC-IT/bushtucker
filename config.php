<?php
session_start();

function createTable($sqlStmt, $tableName) {
    global $conn;
    $stmt = $conn->prepare($sqlStmt);

    if ($stmt->execute()){
        echo "<p style='color: green'>".$tableName." Table Success</p>";
    }else{
        echo "<p style='color: red'>".$tableName." Table Failed</p>";
    }
}

// Database Configuration
$conn = new SQLite3('Bushtucker') or die("Unable to open database!");


$query = file_get_contents("sql/create-user.sql");
createTable($query, "User");
$query = file_get_contents("sql/create-messaging.sql");
createTable($query, "Messaging");
$query = file_get_contents("sql/create-orderDetails.sql");
createTable($query, "Order Details");
$query = file_get_contents("sql/create-products.sql");
createTable($query, "Products");

$query = $conn->query("SELECT COUNT(*) as count FROM `user`");
$row = $query->fetchArray();
$countRow = $row['count'];