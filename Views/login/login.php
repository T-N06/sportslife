<?php

  session_start();

  session_destroy();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ログイン - SportsLife</title>
    <link rel="stylesheet" href="/css/login.css">
  </head>
  <body id="login">
    <div class="login_content">
      <form class="login_form" action="intermediary.php" method="post">
        <h1>SportsLife</h1>
        <p>Mail：<input type="text" name="email"></p>
        <p>Pass：<input type="password" name="password"></p>
        <p><?php if(isset($_SESSION['login_err'])){ echo $_SESSION['login_err'];} ?></p>
        <input class="btn" type="submit" name="login" value="ログイン">
        <input class="btn" type="button" onclick="location.href='create.php'" value="新規登録">
        <br><a href="email_transmit.php">パスワードをお忘れの方はこちら</a>
      </form>
    </div>
  </body>
</html>
