<?php
session_start();

if ($_SESSION["username"] === null) { ?>
  <script type="text/javascript">
  window.location.href = '/index.php';
  </script>
  <?php
}

?>

<html>
  <body>

    Welcome <?php echo $_SESSION["username"] ?> <br><br>

    <form action="/checkmail.php" method="post">
    Mail:<br>
    <input type="text" name="mail">
    <br><br>
    <input type="submit" value="Add mail">

    </form>

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

    $sql = "SELECT Mail, ID FROM Mails WHERE '".$_SESSION["id"]."' = UserID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) { ?>
        <form action="/delete.php" method="post"> <?php
        while($row = $result->fetch_assoc()) { ?>
            <input type="radio" name="id" value=<?php echo $row["ID"]; ?> >
            <?php echo $row["Mail"]; ?> <br> <?php
        }
    ?> <br>
        <input type="submit" value="Delete">
        </form>
    <?php
    }
    ?>

    <form action="/logout.php">
    <input type="submit" value="Logout">
    </form>

    <form action="/deleteall.php">
    <input type="submit" value="Delete User">
    </form>

  </body>
</html>