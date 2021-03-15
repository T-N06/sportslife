<?php

  if (empty($_SERVER["HTTP_REFERER"])) {
    header('Location: ../login/login.php');
    exit;
  }

  session_start();

  require_once(ROOT_PATH .'Controllers/Controller.php');

  $chatMessage = new Controller();
  $params = $chatMessage->chatMessage();




?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>SportsLife - Chat</title>
    <link rel="stylesheet" href="/css/general.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">

    $(function(){
      $("#message_btn").on("click", function(event){
        let message = $("#message").val();
        let user = $("#user").val();
        let id = $("#id").val();
        $.ajax({
          type: "POST",
          url: "chat_sub.php",
          async: true,
          data: { "message" : message,
                  "user" : user,
                  "id" : id},
          dataType : "json"
        }).done(function(data){
          $("#result").append('<p>'+data.message+'</p>');

        }).fail(function(XMLHttpRequest, status, e){
          alert(e);
        });
        // return false;
      });
    });

    </script>

  </head>
  <body id="chat">
    <div class="chat_sidebar">
      <aside class="sidebar">
        <div class="sidebar_content">
          <h2><a href="index.php">SportsLife</a></h2>
          <div class="chat_button">
            <button class="btn" type="button" name="button" onclick="location.href='index.php'">top</button>
            <button class="btn" type="button" name="button" onclick="location.href='event.php?id=<?php echo $_GET['id']; ?>'">企画詳細</button>
          </div>
        </div>
      </aside>
    </div>
    <div class="chat_main">
      <h1>Chat</h1>
      <div class="chat_content">
        <div class="messages" id="talkField">
          <?php foreach((array)$params['findAll'] as $chat){ ?>
              <div class="">
                <p class="<?php if($_SESSION['id'] == $chat['users_id']){ echo "right_chat_account_name"; }else{ echo "left_chat_account_name"; } ?>"><?=$chat['account_name'] ?></p>
                <p class="<?php if($_SESSION['id'] == $chat['users_id']){ echo "right_balloon"; }else{ echo "left_balloon"; } ?>">
                  <?=$chat['message'] ?>
                </p>
              </div>
          <?php } ?>
          <br class="clear_balloon"/>
        </div>
        <form class="form-group" method="post">
          <input type="hidden" id="id" name="id" value="<?php echo $_GET['id']; ?>">
          <input type="hidden" id="user" name="user" value="<?php echo $_SESSION['id']; ?>">
          <input type="text" id="message" class="form-control" placeholder="メッセージを入力" name="message">
          <button id="message_btn" class="chat_btn" name="button">送信</button>
        </form>
      </div>
    </div>
  </body>
</html>
