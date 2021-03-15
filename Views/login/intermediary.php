<?php

  if (empty($_SERVER["HTTP_REFERER"])) {
    header('Location: login.php');
    exit;
  }

  session_start();

  require_once(ROOT_PATH .'Controllers/Controller.php');

  $user = new Controller();
  $user->intermediary();


?>
