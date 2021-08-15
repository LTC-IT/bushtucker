<?php include "template.php";
/**
 *  This is the user's profile page.
 * It shows the Users details including picture, and a link to edit the details.
 *
 * @var SQLite3 $conn
 */
?>
<title>User Profile</title>

<h1 class='text-primary'>Your Profile</h1>

<?php
$userName = $_SESSION["username"];
$userId = $_SESSION["user_id"];

$query = $conn->query("SELECT * FROM user WHERE username='$userName'");
$userData = $query->fetchArray();
$userName = $userData[1];
$password = $userData[2];
$name = $userData[3];
$profilePic = $userData[4];
$accessLevel = $userData[5];

echo $userName."<p>";
echo $password ."<p>";
echo $name."<p>";
echo $profilePic."<p>";
echo $accessLevel."<p>";

?>

