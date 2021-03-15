<?php

  if (empty($_SERVER["HTTP_REFERER"])) {
    header('Location: login.php');
    exit;
  }


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>パスワードリセット - SportsLife</title>
    <link rel="stylesheet" href="/css/login.css">
  </head>
  <body id="email_transmit">
    <div class="header_all">
      <header>
        <h1>SportsLife</h1>
      </header>
    </div>
    <div class="create_content">
      <form class="reset_form" action="email_transmit_complete.php" method="post">
        <h2>パスワードリセットメール送信</h2>
        <dl class="">
          <div class="form_content">
            <p id="err"></p>
            <dt>メールアドレス</dt>
            <dd><input class="create_input" type="text" name="email"></dd>
          </div>
          <div class="flg">
            <p id="err">
              <br>
              <?php if(isset($_SESSION['email_transmit_err'])){echo $_SESSION['email_transmit_err'];}  ?>
            </p>
            <dt>メールアドレス確認</dt>
            <dd><input class="create_input" type="text" name="email_sub"></dd>
          </div>
        </dl>
        <div class="create_btn">
          <input class="create_submit" type="submit" name="email_btn" value="送信">
        </div>
      </form>
    </div>
  </body>
</html>
