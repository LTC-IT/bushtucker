<?php include "template.php";
/**
 *  This is the user's profile page.
 * It shows the Users details including picture, and a link to edit the details.
 *
 * @var SQLite3 $conn
 */
?>
<title>Edit your Profile</title>

<h1 class='text-primary'>Edit Your Profile</h1>

<?php
if (isset($_SESSION["username"])) {
    $userName = $_SESSION["username"];
    $userId = $_SESSION["user_id"];

    $query = $conn->query("SELECT * FROM user WHERE username='$userName'");
    $userData = $query->fetchArray();
    $userName = $userData[1];
    $password = $userData[2];
    $name = $userData[3];
    $profilePic = $userData[4];
    $accessLevel = $userData[5];
} else {
    header("Location:index.php");
}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <h3>Username : <?php echo $userName; ?></h3>
            <p> Name : <?php echo $name ?> </p>
            <p> Access Level : <?php echo $accessLevel ?> </p>
            <p>Profile Picture:</p>
            <?php echo "<img src='images/profilePic/" . $profilePic . "' width='100' height='100'>" ?>
        </div>
        <div class="col-md-6">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                <p>Name: <input type="text" name="name" value="<?php echo $name ?>"></p>
                <p>Access Level: <input type="text" name="accessLevel" value="<?php echo $accessLevel ?>"></p>
                <p>Profile Picture: <input type="file" name ="file"></p>
                <input type="submit" name="formSubmit" value="Submit">
            </form>
        </div>
    </div>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"]== "POST") {
    $newName = sanitise_data($_POST['name']);
    $newAccessLevel = sanitise_data($_POST['accessLevel']);

    $sql = "UPDATE user SET name = :newName, accessLevel=:newAccessLevel WHERE username='$userName'";
    $sqlStmt = $conn->prepare($sql);
    $sqlStmt->bindValue(":newName", $newName);
    if ($accessLevel == "Administrator") {
        $sqlStmt->bindValue(":newAccessLevel", $newAccessLevel);
    } else {
        $sqlStmt->bindValue(":newAccessLevel", $accessLevel);
    }
    $sqlStmt->execute();
}


?>
