<?php

  if (empty($_SERVER["HTTP_REFERER"])) {
    header('Location: login.php');
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
    <title>新規登録 - SportsLife</title>
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
      <form class="create_form" action="register.php" method="post">
        <h2>新規登録</h2>
        <dl class="">
          <div class="form_content">
            <p id="err">
              <br>
              <?php if(isset($_SESSION['account_name_err'])){echo $_SESSION['account_name_err'];}  ?>
            </p>
            <dt>アカウント名</dt>
            <dd><input class="create_input" type="text" name="account_name"></dd>
          </div>
          <div class="form_content">
            <p id="err">
              <br>
              <?php if(isset($_SESSION['email_err'])){echo $_SESSION['email_err'];}  ?>
            </p>
            <dt>メールアドレス</dt>
            <dd><input class="create_input" type="text" name="email"></dd>
          </div>
          <div class="form_content">
            <p id="err">
              <br>
              <?php if(isset($_SESSION['password_err'])){echo $_SESSION['password_err'];}  ?>
            </p>
            <dt>パスワード</dt>
            <dd><input class="create_input" type="password" name="password"></dd>
          </div>
          <div class="form_content">
            <p id="err">
              <br>
              <?php if(isset($_SESSION['password_sub_err'])){echo $_SESSION['password_sub_err'];}  ?>
            </p>
            <dt>パスワード確認</dt>
            <dd><input class="create_input" type="password" name="password_sub"></dd>
          </div>
          <div class="form_content">
            <p id="err">
              <br>
              <?php if(isset($_SESSION['name_err'])){echo $_SESSION['name_err'];}  ?>
            </p>
            <dt>お名前</dt>
            <dd><input class="create_input" type="text" name="name"></dd>
          </div>
          <div class="form_content">
            <p id="err"></p>
            <dt>生年月日</dt>
            <dd class="birth">
              <input type="date" name="birth">
            </dd>
          </div>
          <div class="form_content">
            <p id="err">
              <br>
              <?php if(isset($_SESSION['num_err'])){echo $_SESSION['num_err'];}  ?>
            </p>
            <dt>電話番号</dt>
            <dd><input class="create_input" type="text" name="num"></dd>
          </div>
          <div class="form_content">
            <p id="err"></p>
            <dt>住所</dt>
            <dd>
              <select class="" name="add_id" required>
                <option disabled selected value>選択してください</option>
                <?php foreach($params['add'] as $add): ?>
                  <option value="<?=$add['id']?>">
                    <?=$add['name']?>
                  </option>
                <?php endforeach;?>
              </select>
            </dd>
          </div>
          <div class="form_content">
            <p id="err"></p>
            <dt>性別</dt>
            <dd>
              <select class="" name="sex" required>
                <option disabled selected value>選択してください</option>
                <option value="男性">男性</option>
                <option value="女性">女性</option>
              </select>
            </dd>
          </div>
          <div class="form_content">
            <p id="err"></p>
            <dt>職業</dt>
            <dd><input class="create_input" type="text" name="work"></dd>
          </div>
          <div class="flg">
            <p id="err"></p>
            <dt>好きなスポーツ</dt>
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
          <input type="hidden" name="del_flg" value="1">
        </dl>
        <div class="create_btn">
          <input class="create_submit" type="submit" name="create_btn" onclick="return confirm('新規登録してもよろしいですか？')"　value="新規登録">
          <input class="create_submit" type="button" onclick="location.href='login.php'" value="キャンセル">
        </div>
      </form>
    </div>
  </body>
</html>

<?php

  unset($_SESSION['account_name_err']);
  unset($_SESSION['email_err']);
  unset($_SESSION['password_err']);
  unset($_SESSION['password_sub_err']);
  unset($_SESSION['name_err']);
  unset($_SESSION['num_err']);

?>
