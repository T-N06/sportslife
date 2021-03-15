<?php

  if (empty($_SERVER["HTTP_REFERER"])) {
    header('Location: ../login/login.php');
    exit;
  }

  session_start();

  function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
  }

  require_once(ROOT_PATH .'Controllers/Controller.php');
    $make = new Controller();
    $make->make_complete();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>SportsLife - 企画作成完成画面</title>
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
        <p>企画作成が完了しました。</p><br>
        <input class="complete_btn" type="button" onclick="location.href='event_prisy.php'" value="イベント一覧へ">
      </div>
    </div>
  </body>
</html>
