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

$sql = "DELETE FROM Mails WHERE UserID=".$_SESSION["id"];
$conn->query($sql);

$sql = "DELETE FROM Users WHERE ID=".$_SESSION["id"];
$conn->query($sql);

$conn->close();
?> 

<script type="text/javascript">
window.location.href = '/logout.php';
</script>