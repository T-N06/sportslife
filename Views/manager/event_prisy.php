<?php

  if (empty($_SERVER["HTTP_REFERER"])) {
    header('Location: ../login/login.php');
    exit;
  }

  session_start();

  require_once(ROOT_PATH .'Controllers/Controller.php');

  $planListAll = new Controller();
  $params = $planListAll->index();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>イベント一覧</title>
    <link rel="stylesheet" href="/css/manager.css">
  </head>
  <body id="prisy">
    <div class="prisy_content">
      <div class="prisy_title">
        <h1><a href="index.php">SportsLife</a></h1>
        <div class="prisy_title_btn">
          <button class="btn" type="button" name="button" onclick="location.href='make.php'">企画作成</button>
        </div>
      </div>
      <div class="prisy_event">
        <?php foreach((array)$params['planListAll'] as $planListAll): ?>
            <div class="project"
            style="background-image: url(<?=$planListAll['sports_img']?>);
                  background-size: cover;">
              <article class="project_a">
                <h3 class="s_name"><?=$planListAll['sports_name']?></h3>
                <p class="plan_article"><?=$planListAll['account_name']?></p>
                <p class="plan_article">&#9632;開催地：<?=$planListAll['location']?></p>
                <button class="p_btn" type="button" name="button" onclick="location.href='event.php?id=<?=$planListAll['id']?>'">企画詳細</button>
              </article>
            </div>
        <?php endforeach;?>
      </div>
    </div>
  </body>
</html>
