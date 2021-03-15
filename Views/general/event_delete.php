<?php

  if (empty($_SERVER["HTTP_REFERER"])) {
    header('Location: ../login/login.php');
    exit;
  }


  session_start();

  require_once(ROOT_PATH .'Controllers/Controller.php');

  $planAllDelete = new Controller();
  $params = $planAllDelete->planAllDelete();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>SportsLife - イベント削除完了</title>
    <link rel="stylesheet" href="/css/general.css">
  </head>
  <body id="complete">
    <div class="header_all">
      <header>
        <h1>SportsLife</h1>
      </header>
    </div>
    <div class="create_content">
      <div class="complete_content">
        <p>イベントを削除しました。</p><br>
        <input class="complete_btn" type="button" onclick="location.href='event_make.php'" value="企画マイページへ">
      </div>
    </div>
  </body>
</html>
