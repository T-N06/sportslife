<?php

  if (empty($_SERVER["HTTP_REFERER"])) {
    header('Location: ../login/login.php');
    exit;
  }

  session_start();

  require_once(ROOT_PATH .'Controllers/Controller.php');

  $create = new Controller();
  $params = $create->create();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>SportsLife - 企画作成</title>
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
      <form class="create_form" action="make_intermediary.php" method="post">
        <h2>企画作成</h2>
        <input type="hidden" name="users_id" value="<?php echo $_SESSION['id']; ?>">
        <dl class="">
          <div class="form_content">
            <p id="err">
              <br>
              <?php if(isset($_SESSION['name_err'])){ echo $_SESSION['name_err']; } ?>
            </p>
            <dt>企画名</dt>
            <dd><input class="create_input" type="text" name="name"></dd>
          </div>
          <div class="form_content">
            <p id="err"></p>
            <dt>スポーツ名</dt>
            <dd>
              <select class="" name="sports_id" required>
                <option disabled selected value>選択してください</option>
                <?php foreach($params['sports'] as $sports): ?>
                  <option value="<?=$sports['id']?>">
                    <?=$sports['name']?>
                  </option>
                <?php endforeach;?>
              </select>
            </dd>
          </div>
          <div class="form_content">
            <p id="err"></p>
            <dt>ステータス</dt>
            <dd>
              <select class="" name="status_id" required>
                <option disabled selected value>選択してください</option>
                <?php foreach($params['status'] as $status): ?>
                  <option value="<?=$status['id']?>">
                    <?=$status['status']?>
                  </option>
                <?php endforeach;?>
              </select>
            </dd>
          </div>
          <div class="form_content">
            <p id="err"></p>
            <dt>日付</dt>
            <dd class="birth">
              <input type="date" name="day">
            </dd>
          </div>
          <div class="form_content">
            <p id="err"></p>
            <dt>時間</dt>
            <dd class="time">
              <input type="time" name="created_time">
            </dd>
          </div>
          <div class="form_content">
            <p id="err">
              <br>
              <?php if(isset($_SESSION['location_err'])){ echo $_SESSION['location_err']; } ?>
            </p>
            <dt>場所</dt>
            <dd><input class="create_input" type="text" name="location"></dd>
          </div>
          <div class="form_content" >
            <p id="err">
              <br>
              <?php if(isset($_SESSION['plan_text_err'])){ echo $_SESSION['plan_text_err']; } ?>
            </p>
            <dt>内容</dt>
            <dd> <textarea name="plan_text" rows="10" cols="50"></textarea> </dd>
          </div>
          <div class="flg">
            <p id="err"></p>
            <dt>備考</dt>
            <dd><textarea name="remarks" rows="5" cols="50"></textarea></dd>
          </div>
        </dl>
        <div class="create_btn">
          <input class="create_submit" type="submit" name="create_btn" onclick="return confirm('新規登録してもよろしいですか？')"　value="新規登録">
          <a href="event_prisy.php"><input class="create_submit" type="button" value="キャンセル"></a>
        </div>
      </form>
    </div>
  </body>
</html>
