<?php
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

$sql = "DELETE FROM Mails WHERE ID=".$_POST["id"];
$conn->query($sql);

$conn->close();
?> 

<script type="text/javascript">
window.location.href = '/mail.php';
</script>