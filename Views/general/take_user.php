<?php

  if (empty($_SERVER["HTTP_REFERER"])) {
    header('Location: ../login/login.php');
    exit;
  }


  session_start();

  require_once(ROOT_PATH .'Controllers/Controller.php');

  $takeUserList = new Controller();
  $params = $takeUserList->takeUserPrisy();

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
          <button class="btn" type="button" name="button" onclick="location.href='event.php?id=<?php echo $_GET['id']; ?>'">企画詳細</button>
        </div>
      </div>
      <div class="prisy_event">
        <?php foreach((array)$params['takeUserList'] as $takeUserList): ?>
            <div class="project"
            style="background-image: url(<?=$takeUserList['sports_img']?>);
                  background-size: cover;">
              <article class="project_a">
                <h3 class="s_name"><?=$takeUserList['account_name']?></h3>
                <p class="plan_article"><?=$takeUserList['sports_name']?></p>
                <p class="plan_article">&#9632;所在地：<?=$takeUserList['add_name']?></p>
                <p class="plan_article"><?=$takeUserList['sex']?></p>
              </article>
            </div>
        <?php endforeach;?>
      </div>
    </div>
  </body>
</html>
