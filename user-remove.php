<?php include "template.php";
/**
 *  This the page to remove a given user from the database.
 * This should be for admins only.
 * @var SQLite3 $conn
 */
?>
<title>Remove User from Database</title>

<h1 class='text-primary'>Remove User from Database</h1>

<?php
// check first to confirm user is an administrator..

if (isset($_GET["user_id"])) {  // Has the user_id been set in the url parameter.
    // delete user from database
    $userToDelete = $_GET["user_id"];
//    echo "<p>".$userToDelete."</p>";
    $query = "DELETE FROM user WHERE user_id='$userToDelete'";
    $sqlstmt = $conn->prepare($query);
    $sqlstmt->execute();
    echo "<p>User ".$userToDelete." has been deleted from the database";

} else { // No user_id has been set
    echo "No User to Delete";
}
?>