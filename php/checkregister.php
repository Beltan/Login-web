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

if ($_POST["password"] === $_POST["confpassword"] && ($_POST["password"] !== "" && ($_POST["username"] !== ""))) {
    $sql = "INSERT INTO Users (Username, Password)
    VALUES ( '" . $_POST["username"] . "','" . $_POST["password"] . "' ) ";

    if ($conn->query($sql)) {
        $conn->close();
        ?>
        <script type="text/javascript">
        window.location.href = '/index.php';
        </script>
        <?php
    } else {
        $conn->close();
        ?>
        <script type="text/javascript">
        window.location.href = '/register.php';
        </script>
        <?php
    }
} else {
    $conn->close();
    ?>
    <script type="text/javascript">
    window.location.href = '/register.php';
    </script>
    <?php
}

?> 