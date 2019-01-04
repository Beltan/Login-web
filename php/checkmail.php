<?php

session_start();

$servername = "db";
$username = "devuser";
$password = "devpass";
$dbname = "test_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO Mails (Mail, UserID)
VALUES ( '" . $_POST["mail"] . "','" . $_SESSION["id"] . "' ) ";

$conn->query($sql);

$conn->close();

?>

<script type="text/javascript">
window.location.href = '/mail.php';
</script>