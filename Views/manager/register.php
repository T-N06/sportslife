<?php

  if (empty($_SERVER["HTTP_REFERER"])) {
    header('Location: ../login/login.php');
    exit;
  }

  session_start();

  require_once(ROOT_PATH .'Controllers/Controller.php');

  if(mb_strlen($_POST['account_name']) > 10){
    $_SESSION['account_name_err'] = "*10文字以下で入力してください。";
    header("Location: create.php");
  }else if(empty($_POST['account_name'])){
    $_SESSION['account_name_err'] = "*入力必須です。";
    header("Location: create.php");
  }

  if(empty($_POST['email'])){
    $_SESSION['email_err'] = "＊入力必須です。";
    header("Location: create.php");
  }else if(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST['email'])){
    $_SESSION['email_err'] = "＊メールアドレスの形式で入力してください。";
    header("Location: create.php");
  }

  if(empty($_POST['password'])){
    $_SESSION['password_err'] = "＊入力必須です。";
    header("Location: create.php");
  }else if(!preg_match("/\A[a-z\d]{8,36}+\z/i", $_POST['password'])){
    $_SESSION['password_err'] = "＊パスワードは英数字8文字以上36文字以下にしてください。";
    header("Location: create.php");
  }

  if(empty($_POST['password_sub'])){
    $_SESSION['password_sub_err'] = "＊入力必須です。";
    header("Location: create.php");
  }else if($_POST['password_sub'] !== $_POST['password']){
    $_SESSION['password_sub_err'] = "＊パスワードが違います。";
    header("Location: create.php");
  }

  if(empty($_POST['name'])){
    $_SESSION['name_err'] = "＊入力必須です。";
    header("Location: create.php");
  }

  if(!preg_match("/^\d{10,11}$/", $_POST['num']) && mb_strlen($_POST['num']) >= 1){
    $_SESSION['num_err'] = "＊0~9の数字で10桁もしくは11桁で入力してください。";
    header("Location: create.php");
  }

  if(empty($_SESSION['account_name_err']) &&
     empty($_SESSION['email_err']) &&
     empty($_SESSION['password_err']) &&
     empty($_SESSION['password_sub_err']) &&
     empty($_SESSION['name_err']) &&
     empty($_SESSION['num_err'])){
    $user = new Controller();
    $user->register();
  }



?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>新規登録完了 - SportsLife</title>
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
        <p>新規登録が完了しました。</p><br>
        <input class="complete_btn" type="button" onclick="location.href='index.php'" value="TOPへ">
      </div>
    </div>
  </body>
</html>
