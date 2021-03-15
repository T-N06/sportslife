<?php

  if (empty($_SERVER["HTTP_REFERER"])) {
    header('Location: ../login/login.php');
    exit;
  }

  session_start();

  require_once(ROOT_PATH .'Controllers/Controller.php');

  $plan = new Controller();
  $params = $plan->event($_GET['id']);

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
            <button class="btn" type="button" name="button" onclick="location.href='event_prisy.php'">イベント一覧</button>
            <button class="btn" type="button" name="button" onclick="location.href='event_edit.php?id=<?php echo $_GET['id']; ?>'">編集</button>
          </div>
        </div>
      </aside>
    </div>

      <div class="mypage_main">
        <div class="mypage_status">
          <h1>Event</h1>
          <table>
            <tr>
              <th>スポーツ名</th>
              <td><?=$params['plan']['sports_name'] ?></td>
            </tr>
            <tr>
              <th>イベント名</th>
              <td><?=$params['plan']['name'] ?></td>
            </tr>
            <tr>
              <th>主催者</th>
              <td><?=$params['plan']['user_name'] ?></td>
            </tr>
            <tr>
              <th>ステータス</th>
              <td><?=$params['plan']['status_name'] ?></td>
            </tr>
            <tr>
              <th>日時</th>
              <td><?=$params['plan']['day']?>&nbsp;<?=$params['plan']['created_time'] ?></td>
            </tr>
            <tr>
              <th>場所</th>
              <td><?=$params['plan']['location']?></td>
            </tr>
            <tr>
              <th>内容</th>
              <td><?=$params['plan']['plan_text']?></td>
            </tr>
            <tr class="flg">
              <th>備考</th>
              <td><?=$params['plan']['remarks']?></td>
            </tr>
          </table>
          <div class="event_btn">
            <button class="btn" type="button" name="button" onclick="location.href='chat.php?id=<?php echo $_GET['id']; ?>'">Chat</button>
            <button class="btn" type="button" name="button" onclick="location.href='take_user.php?id=<?php echo $_GET['id']; ?>'">参加者一覧</button>
          </div>
        </div>
      </div>
  </body>
</html>
