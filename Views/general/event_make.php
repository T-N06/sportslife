<?php

  if (empty($_SERVER["HTTP_REFERER"])) {
    header('Location: ../login/login.php');
    exit;
  }

  session_start();

  require_once(ROOT_PATH .'Controllers/Controller.php');

  $planList = new Controller();
  $params = $planList->event_make_Id();

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
            <button class="btn" type="button" name="button" onclick="location.href='mypage.php'">Mypage</button>
            <button class="btn" type="button" name="button" onclick="location.href='make.php'">企画作成</button>
          </div>
        </div>
      </aside>
    </div>
    <div class="mypage_main">
      <div class="mypage_status">
        <h1>List</h1>
        <div class="lists">
          <?php foreach((array)$params['event'] as $event): ?>
              <div class="project"
              style="background-image: url(<?=$event['sports_img']?>);
                    background-size: cover;">
                <article class="project_a">
                  <h3 class="s_name"><?=$event['sports_name']?></h3>
                  <p class="plan_article"><?=$event['user_name']?></p>
                  <p class="plan_article">&#9632;開催地：<?=$event['location']?></p>
                  <button class="p_btn" type="button" name="button" onclick="location.href='event_edit.php?id=<?=$event['id']?>'">編集</button>
                  <a href="event_delete.php?id=<?=$event['id']?>"><button class="p_btn" type="button" name="button" onclick="return confirm('削除してもよろしいですか？')">削除</button></a>
                </article>
              </div>
          <?php endforeach;?>
        </div>
      </div>
      </div>
    </div>
  </body>
</html>
