<?php
session_start();

if ($_SESSION["username"] !== null) { ?>
  <script type="text/javascript">
  window.location.href = '/mail.php';
  </script>
  <?php
}

?>
<html>

  <style>
    div.content {
      position: absolute;
      width: 246px;
      height: 164px;
      z-index: 15;
      top: 50%;
      left: 50%;
      margin: -82px 0 0 -123px;
      background: lightblue;
    }
    div.right {           
      float: right;
    }
    div.left {           
      float: left;
    }
  </style>

  <body>
  <div class="content">
    <form action="/submit.php" method="post">
        <legend>Login:</legend>
        Username:<br>
        <input type="text" name="username">
        <br>
        Password:<br>
        <input type="password" name="password">
        <br><br>
        <div class="left">
          <input type="submit" value="Submit">
        </div>
        <div class="right">
          <a href="/register.php" title="Go to Register">Not registered?</a> 
        </div>
    </form>
  </div>
  </body>
</html>