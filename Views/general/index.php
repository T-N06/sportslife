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
    <title>SportsLife - トップ</title>
    <link rel="stylesheet" href="/css/general.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
    <script>
  		window.addEventListener('load', (event) => {

  			document.getElementById('overview_btn').addEventListener('click', () => {

          // listAllの表示位置を取得
  				var listAll = document.getElementById('listAll');
  				var content_position = listAll.getBoundingClientRect();

          // listAllへ移動
  				window.scrollTo( 0, content_position.top);

  			});
  		});
    </script>
  </head>
  <body id="index">
    <section class="content">
      <div class="top">
        <header>
          <h2>SportsLife</h2>
          <ul>
            <li><a href="mypage.php">Mypage</a></li>
            <li><a href="logout_complete.php">Logout</a></li>
          </ul>
        </header>
        <div class="wrap">
          <div class="overview">
            <h1>Let's enjoy sports!</h1>
            <p>スポーツを通して、一人の人間として成長しよう。<br>そして、人と人の繋がりを大切にみんなでスポーツを楽しみましょう。</p>
            <button id="overview_btn" type="button">LISTへ</button>
          </div>
        </div>
      </div>
    </section>

    <section class="projects" id="listAll">
      <div class="projects_list">
        <h2>LIST</h2>
        <div class="lists">
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
    </section>

    <footer><p>-- SportsLife --</p></footer>
  </body>
</html>
