<?php

session_start();

?>

<html>
  <body>

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

    $sql = "SELECT ID, Username, Password FROM Users WHERE '".$_POST["username"]."' = Username AND '".$_POST["password"]."' = Password";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {  
      
      $_SESSION["username"] = $_POST["username"];

      while($row = $result->fetch_assoc()) {
        $_SESSION["id"] = $row["ID"];
      }

      ?>

      <script type="text/javascript">
      window.location.href = '/mail.php';
      </script>
        
      <?php
    }
    else { ?>

    Username and password does not match<br>

    <form action="/index.php" method="get">
      <input type="submit" value="Retry">
    </form>

    <?php
    } 

    $conn->close(); ?>

  </body>
</html> 