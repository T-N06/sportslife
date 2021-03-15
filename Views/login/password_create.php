<?php

  session_start();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>パスワード再設定 - SportsLife</title>
    <link rel="stylesheet" href="/css/login.css">
  </head>
  <body id="password_create">
    <div class="header_all">
      <header>
        <h1>SportsLife</h1>
      </header>
    </div>
    <div class="create_content">
      <form class="reset_form" action="password_create_complete.php" method="post">
        <h2>パスワード再設定</h2>
        <input type="hidden" name="create_key" value="<?php echo $_GET['create_key']; ?>">
        <dl class="">
          <div class="form_content">
            <p id="err"></p>
            <dt>パスワード</dt>
            <dd><input class="create_input" type="password" name="password"></dd>
          </div>
          <div class="flg">
            <p id="err">
              <br>
              <?php if(isset($_SESSION['password_reset_err'])){echo $_SESSION['password_reset_err'];}  ?>
            </p>
            <dt>パスワード確認</dt>
            <dd><input class="create_input" type="password" name="password_sub"></dd>
          </div>
        </dl>
        <div class="create_btn">
          <input class="create_submit" type="submit" name="email_btn" value="送信">
        </div>
      </form>
    </div>
  </body>
</html>
<?php session_destroy(); ?>
