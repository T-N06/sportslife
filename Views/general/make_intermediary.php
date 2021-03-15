<?php

  if (empty($_SERVER["HTTP_REFERER"])) {
    header('Location: ../login/login.php');
    exit;
  }

  session_start();

  if (empty($_POST['name'])) {
    $_SESSION['name_err'] = "入力必須です";
    header("Location: make.php");
  }

  if (empty($_POST['location'])) {
    $_SESSION['location_err'] = "入力必須です";
    header("Location: make.php");
  }

  if (empty($_POST['plan_text'])) {
    $_SESSION['plan_text_err'] = "入力必須です";
    header("Location: make.php");
  }

  require_once(ROOT_PATH .'Controllers/Controller.php');

  $make = new Controller();
  $params = $make->createMakeIntermediary();

  function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
  }


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>SportsLife　- 企画作成確認</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
    <script src="/js/jquery.js" type="text/javascript"></script>
    <link rel="stylesheet" href="/css/login.css">
  </head>
  <body id="create">
    <div class="header_all">
      <header>
        <h1>SportsLife</h1>
      </header>
    </div>
    <div class="create_content">
      <form class="create_form" action="make_complete.php" method="post">
        <h2>企画作成確認</h2>
        <dl class="">
          <div class="form_content">
            <p id="err">
              <br>
            </p>
            <dt>企画作成</dt>
            <dd><?php echo h($_POST['name']); ?></dd>
          </div>
          <div class="form_content">
            <p id="err">
              <br>
            </p>
            <dt>スポーツ名</dt>
            <dd><?= h($params['sports']['name']) ?></dd>
          </div>
          <div class="form_content">
            <p id="err">
              <br>
            </p>
            <dt>ステータス</dt>
            <dd><?= h($params['status']['status']) ?></dd>
          </div>
          <div class="form_content">
            <p id="err"></p>
            <dt>日付</dt>
            <dd>
              <?php echo h($_POST['day']); ?>
            </dd>
          </div>
          <div class="form_content">
            <p id="err">
              <br>
            </p>
            <dt>時間</dt>
            <dd><?php echo h($_POST['created_time']); ?></dd>
          </div>
          <div class="form_content">
            <p id="err"></p>
            <dt>場所</dt>
            <dd>
              <?php echo h($_POST['location']); ?>
            </dd>
          </div>
          <div class="form_content">
            <p id="err"></p>
            <dt>内容</dt>
            <dd>
              <?php echo nl2br(h($_POST['plan_text'])); ?>
            </dd>
          </div>
          <div class="flg">
            <p id="err"></p>
            <dt>備考</dt>
            <dd><?php echo nl2br(h($_POST['remarks'])); ?></dd>
          </div>
            <input type="hidden" name="users_id" value="<?php echo h($_POST['users_id']); ?>">
            <input type="hidden" name="name" value="<?php echo h($_POST['name']); ?>">
            <input type="hidden" name="sports_id" value="<?php echo h($_POST['sports_id']); ?>">
            <input type="hidden" name="status_id" value="<?php echo h($_POST['status_id']); ?>">
            <input type="hidden" name="day" value="<?php echo h($_POST['day']); ?>">
            <input type="hidden" name="created_time" value="<?php echo h($_POST['created_time']); ?>">
            <input type="hidden" name="location" value="<?php echo h($_POST['location']); ?>">
            <input type="hidden" name="plan_text" value="<?php echo h($_POST['plan_text']); ?>">
            <input type="hidden" name="remarks" value="<?php echo h($_POST['remarks']); ?>">
        </dl>
        <div class="create_btn">
          <input class="create_submit" type="submit" name="create_btn" onclick="return confirm('作成してもよろしいですか？')"　value="企画作成">
          <input class="create_submit" type="button" onclick="location.href='make.php'" value="キャンセル">
        </div>
      </form>
    </div>
  </body>
</html>
