<?php

  if (empty($_SERVER["HTTP_REFERER"])) {
    header('Location: ../login/login.php');
    exit;
  }

  session_start();

  require_once(ROOT_PATH .'Controllers/Controller.php');

  $userListAll = new Controller();
  $params = $userListAll->userPrisy();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ユーザ一覧</title>
    <link rel="stylesheet" href="/css/manager.css">
  </head>
  <body id="prisy">
    <div class="prisy_content">
      <div class="prisy_title">
        <h1><a href="index.php">SportsLife</a></h1>
        <div class="prisy_title_btn">
          <button class="btn" type="button" name="button" onclick="location.href='create.php'">新規登録</button>
        </div>
      </div>
      <div class="prisy_event">
        <?php foreach((array)$params['userListAll'] as $userListAll): ?>
            <div class="project"
            style="background-image: url(<?=$userListAll['sports_img']?>);
                  background-size: cover;">
              <article class="project_a">
                <h3 class="s_name"><?=$userListAll['account_name']?></h3>
                <p class="plan_article"><?=$userListAll['email']?></p>
                <p class="plan_article"><?=$userListAll['sports_name']?></p>
                <p class="plan_article">&#9632;所在地：<?=$userListAll['add_name']?></p>
                <button class="p_btn" type="button" name="button" onclick="location.href='user.php?id=<?=$userListAll['id']?>'">ユーザー詳細</button>
              </article>
            </div>
        <?php endforeach;?>
      </div>
    </div>
  </body>
</html>
