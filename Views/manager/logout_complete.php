<?php

  session_start();

  session_destroy();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>SportsLife - ログアウト完了</title>
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
        <p>ログアウトしました。</p><br>
        <input class="complete_btn" type="button" onclick="location.href='../login/login.php'" value="ログイン画面へ">
      </div>
    </div>
  </body>
</html>
