<?php

  if (empty($_SERVER["HTTP_REFERER"])) {
    header('Location: login.php');
    exit;
  }

  if(empty($_POST['email'])){
    $_SESSION['email_transmit_err'] = "メールアドレスを入力してください。";
    header("Location: email_transmit.php");
    exit;
  }else if(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST['email'])){
    $_SESSION['email_transmit_err'] = "メールアドレスの形式で入力してください。";
    header("Location: email_transmit.php");
    exit;
  }else if($_POST['email'] !== $_POST['email_sub']){
    $_SESSION['email_transmit_err'] = "メールアドレスが一致しません。";
    header("Location: email_transmit.php");
    exit;
  }

  require_once(ROOT_PATH .'Controllers/Controller.php');

  $user = new Controller();
  $params = $user->email_transmit_complete();

  $case = "パスワード再設定メール";
  // $id = urlencode($params['user']['id']);

  // HPMailer のクラスをグローバル名前空間（global namespace）にインポート
  // スクリプトの先頭で宣言する必要があります
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  // PHPMailer のソースファイルの読み込み（ファイルの位置によりパスを適宜変更）
  require 'PHPMailer-master/src/Exception.php';
  require 'PHPMailer-master/src/PHPMailer.php';
  require 'PHPMailer-master/src/SMTP.php';

  //mbstring の日本語設定
  mb_language("japanese");
  mb_internal_encoding("UTF-8");

  // インスタンスを生成（引数に true を指定して例外 Exception を有効に）
  $mail = new PHPMailer(true);

  //日本語用設定
  $mail->CharSet = "iso-2022-jp";
  $mail->Encoding = "7bit";

  try {
  //サーバの設定
  // $mail->SMTPDebug = SMTP::DEBUG_SERVER;  // デバグの出力を有効に（テスト環境での検証用）
  $mail->isSMTP();   // SMTP を使用
  $mail->Host       = 'smtp.gmail.com';  // ★★★ Gmail SMTP サーバーを指定
  $mail->SMTPAuth   = true;   // SMTP authentication を有効に
  $mail->Username   = 'soccer.tkr1021@gmail.com';  // ★★★ Gmail ユーザ名
  $mail->Password   = 'zkrjzqweqthkztxv';  // ★★★ Gmail パスワード
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // ★★★ 暗号化（TLS)を有効に
  $mail->Port = 587;  //★★★ ポートは 587

  //受信者設定
  //差出人アドレス, 差出人名
  $mail->setFrom('sender@example.com', mb_encode_mimeheader('差出人名'));
  // 受信者アドレス, 受信者名（受信者名はオプション）
  $mail->addAddress($_POST['email'], mb_encode_mimeheader("受信者名"));

  //コンテンツ設定
  $mail->isHTML(true);   // HTML形式を指定
  //メール表題（タイトル）
  $mail->Subject = mb_encode_mimeheader($case);
  //本文（HTML用）
  $mail->Body  = mb_convert_encoding("※このメールはシステムからの自動返信です。<br>"

   ."下記URLからパスワードを再設定してください。<br>
   http://localhost:8888/login/password_create.php?create_key=".$key,"JIS","UTF-8");
  //テキスト表示の本文
  $mail->AltBody = mb_convert_encoding('プレインテキストメッセージ non-HTML mail clients',"JIS","UTF-8");

  $mail->send();  //送信
  // echo 'Message has been sent';
  } catch (Exception $e) {
  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }



?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>メール送信完了 - SportsLife</title>
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
        <p>メールを送信しました。</p><br>
        <input class="complete_btn" type="button" onclick="location.href='login.php'" value="ログイン画面へ">
      </div>
    </div>
  </body>
</html>
