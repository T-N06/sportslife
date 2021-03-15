<?php

  if (empty($_SERVER["HTTP_REFERER"])) {
    header('Location: ../login/login.php');
    exit;
  }

  session_start();

  require_once(ROOT_PATH .'Controllers/Controller.php');

  $user = new Controller();
  $params = $user->mypage();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>SportsLife - Mypage</title>
    <link rel="stylesheet" href="/css/general.css">
  </head>
  <body id="mypage">
    <div class="mypage_sidebar">
      <aside class="sidebar">
        <div class="sidebar_content">
          <h2><a href="index.php">SportsLife</a></h2>
          <div class="mypage_button">
            <button class="btn" type="button" name="button" onclick="location.href='event_make.php'">企画マイページ</button>
            <button class="btn" type="button" name="button" onclick="location.href='event_take.php'">参加一覧</button>
          </div>
        </div>
      </aside>
    </div>
    <div class="mypage_main">
      <div class="mypage_status">
        <h1>Account</h1>
          <table>
            <tr>
              <th>アカウント名</th>
              <td><?= $params['mypage']['account_name'] ?></td>
            </tr>
            <tr>
              <th>メールアドレス</th>
              <td><?= $params['mypage']['email'] ?></td>
            </tr>
            <tr>
              <th>生年月日</th>
              <td><?= $params['mypage']['birth'] ?></td>
            </tr>
            <tr>
              <th>電話番号</th>
              <td><?= $params['mypage']['num'] ?></td>
            </tr>
            <tr>
              <th>住所</th>
              <td><?= $params['mypage']['add_name'] ?></td>
            </tr>
            <tr>
              <th>性別</th>
              <td><?= $params['mypage']['sex'] ?></td>
            </tr>
            <tr>
              <th>職業</th>
              <td><?= $params['mypage']['work'] ?></td>
            </tr>
            <tr class="flg">
              <th>好きなスポーツ</th>
              <td><?= $params['mypage']['sports_name'] ?></td>
            </tr>
          </table>
          <div class="event_btn">
            <button class="btn" type="button" name="button" onclick="location.href='user_edit.php'">編集</button>
          </div>
      </div>
    </div>
  </body>
</html>
