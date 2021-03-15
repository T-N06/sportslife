<?php

  session_start();

    if(mb_strlen($_POST['account_name']) > 10){
      $_SESSION['account_name_err'] = "*10文字以下で入力してください。";
      header("Location: create.php");
    }else if(empty($_POST['account_name'])){
      $_SESSION['account_name_err'] = "*入力必須です。";
      header("Location: create.php");
    }

    if(empty($_POST['email'])){
      $_SESSION['email_err'] = "＊入力必須です。";
      header("Location: create.php");
    }else if(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST['email'])){
      $_SESSION['email_err'] = "＊メールアドレスの形式で入力してください。";
      header("Location: create.php");
    }

    if(empty($_POST['password'])){
      $_SESSION['password_err'] = "＊入力必須です。";
      header("Location: create.php");
    }else if(!preg_match("/\A[a-z\d]{8,36}+\z/i", $_POST['password'])){
      $_SESSION['password_err'] = "＊パスワードは英数字8文字以上36文字以下にしてください。";
      header("Location: create.php");
    }

    if(empty($_POST['password_sub'])){
      $_SESSION['password_sub_err'] = "＊入力必須です。";
      header("Location: create.php");
    }else if($_POST['password_sub'] !== $_POST['password']){
      $_SESSION['password_sub_err'] = "＊パスワードが違います。";
      header("Location: create.php");
    }

    if(empty($_POST['name'])){
      $_SESSION['name_err'] = "＊入力必須です。";
      header("Location: create.php");
    }

    if(!preg_match("/^\d{10,11}$/", $_POST['num']) && mb_strlen($_POST['num']) >= 1){
      $_SESSION['num_err'] = "＊0~9の数字で10桁もしくは11桁で入力してください。";
      header("Location: create.php");
    }

    require_once(ROOT_PATH .'Controllers/Controller.php');

    $create = new Controller();
    $params = $create->createIntermediary();



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
            </p>
            <dt>アカウント名</dt>
            <dd><?php echo $_POST['account_name']; ?></dd>
          </div>
          <div class="form_content">
            <p id="err">
              <br>
            </p>
            <dt>メールアドレス</dt>
            <dd><?php echo $_POST['email']; ?></dd>
          </div>
          <div class="form_content">
            <p id="err">
              <br>
            </p>
            <dt>お名前</dt>
            <dd><?php echo $_POST['name']; ?></dd>
          </div>
          <div class="form_content">
            <p id="err"></p>
            <dt>生年月日</dt>
            <dd class="birth">
              <?php echo $_POST['birth']; ?>
            </dd>
          </div>
          <div class="form_content">
            <p id="err">
              <br>
            </p>
            <dt>電話番号</dt>
            <dd><?php echo $_POST['num']; ?></dd>
          </div>
          <div class="form_content">
            <p id="err"></p>
            <dt>住所</dt>
            <dd>
              <?= $params['add']['name'] ?>
            </dd>
          </div>
          <div class="form_content">
            <p id="err"></p>
            <dt>性別</dt>
            <dd>
              <?php echo $_POST['sex']; ?>
            </dd>
          </div>
          <div class="form_content">
            <p id="err"></p>
            <dt>職業</dt>
            <dd><?php echo $_POST['work']; ?></dd>
          </div>
          <div class="flg">
            <p id="err"></p>
            <dt>好きなスポーツ</dt>
            <dd>
              <?= $params['sports']['name'] ?>
            </dd>
            <input type="hidden" name="del_flg" value="<?php echo $_POST['del_flg']; ?>">
            <input type="hidden" name="account_name" value="<?php echo $_POST['account_name']; ?>">
            <input type="hidden" name="email" value="<?php echo $_POST['email']; ?>">
            <input type="hidden" name="password" value="<?php echo $_POST['passsword']; ?>">
            <input type="hidden" name="name" value="<?php echo $_POST['name']; ?>">
            <input type="hidden" name="birth" value="<?php echo $_POST['birth']; ?>">
            <input type="hidden" name="num" value="<?php echo $_POST['num']; ?>">
            <input type="hidden" name="add_id" value="<?php echo $_POST['add_id']; ?>">
            <input type="hidden" name="sex" value="<?php echo $_POST['sex']; ?>">
            <input type="hidden" name="work" value="<?php echo $_POST['work']; ?>">
            <input type="hidden" name="sports_id" value="<?php echo $_POST['sports_id']; ?>">
          </div>
        </dl>
        <div class="create_btn">
          <input class="create_submit" type="submit" name="create_btn" onclick="return confirm('新規登録してもよろしいですか？')"　value="新規登録">
          <input class="create_submit" type="button" onclick="location.href='create.php'" value="キャンセル">
        </div>
      </form>
    </div>
  </body>
</html>
