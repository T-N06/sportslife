<?php


  if (empty($_SERVER["HTTP_REFERER"])) {
    header('Location: ../login/login.php');
    exit;
  }


  session_start();

  require_once(ROOT_PATH .'Controllers/Controller.php');

  $take = new Controller();
  $take->takeCreate();
  header("Location: event_take.php");

?>
