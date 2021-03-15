<?php

  if (empty($_SERVER["HTTP_REFERER"])) {
    header('Location: ../login/login.php');
    exit;
  }

  session_start();

  require_once(ROOT_PATH .'Controllers/Controller.php');

  $eventEdit = new Controller();
  $eventEdit->eventEditComplete();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>SportsLife - 登録情報編集完成画面</title>
    <link rel="stylesheet" href="/css/login.css">
  </head>
  <body id="complete">
    <div class="header_all">
      <header>
        <h1>SportsLife</h1>
      </header>
    </div>
    <div class="create_content">
      <div class="complete_content">
        <p>編集が完了しました。</p><br>
        <input class="complete_btn" type="button" onclick="location.href='event_make.php'" value="企画マイページへ">
      </div>
    </div>
  </body>
</html>
