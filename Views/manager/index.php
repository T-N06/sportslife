<?php

  if (empty($_SERVER["HTTP_REFERER"])) {
    header('Location: ../login/login.php');
    exit;
  }

  session_start();



?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>SportsLife - TOP</title>
    <link rel="stylesheet" href="/css/manager.css">
  </head>
  <body id="manager">
    <div class="content">
      <div class="title">
        <h1>SportsLife</h1>
        <div class="title_btn">
          <button class="btn" type="button" name="button" onclick="location.href='user_prisy.php'">ユーザ一覧</button>
          <button class="btn" type="button" name="button" onclick="location.href='event_prisy.php'">企画一覧</button>
        </div>
        <a href="logout_complete.php">Logout</a>
      </div>
    </div>
  </body>
</html>
