<?php

  session_start();

  require_once(ROOT_PATH .'Controllers/Controller.php');

  $pass = new Controller();
  $pass->password_create_complete();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>パスワード再設定完了 - SportsLife</title>
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
        <p>パスワードの再設定が完了しました。</p>
        <input class="complete_btn" type="button" onclick="location.href='login.php'" value="ログイン画面へ">
      </div>
    </div>
  </body>
</html>
