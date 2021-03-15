<?php

  if (empty($_SERVER["HTTP_REFERER"])) {
    header('Location: ../login/login.php');
    exit;
  }

  session_start();

  require_once(ROOT_PATH .'Controllers/Controller.php');

  $myPlanList = new Controller();
  $params = $myPlanList->eventTake();

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
          </div>
        </div>
      </aside>
    </div>
    <div class="mypage_main">
      <div class="mypage_status">
        <h1>List</h1>
        <div class="lists">
          <?php foreach((array)$params['myPlanList'] as $myPlanList): ?>
              <div class="project"
              style="background-image: url(<?=$myPlanList['sports_img']?>);
                    background-size: cover;">
                <article class="project_a">
                  <h3 class="s_name"><?=$myPlanList['sports_name']?></h3>
                  <p class="plan_article"><?=$myPlanList['user_name']?></p>
                  <p class="plan_article">&#9632;開催地：<?=$myPlanList['location']?></p>
                  <button class="p_btn" type="button" name="button" onclick="location.href='event.php?id=<?=$myPlanList['plans_id']?>'">企画詳細</button>
                  <button class="p_btn" type="button" name="button" onclick="location.href='myevent_delete.php?id=<?=$myPlanList['id']?>'">削除</button>
                </article>
              </div>
          <?php endforeach;?>
        </div>
      </div>
      </div>
    </div>
  </body>
</html>
