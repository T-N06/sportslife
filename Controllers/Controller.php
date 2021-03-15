<?php

  require_once(ROOT_PATH .'/Models/User.php');
  require_once(ROOT_PATH .'/Models/Add.php');
  require_once(ROOT_PATH .'/Models/Sports.php');
  require_once(ROOT_PATH .'/Models/Password_reset.php');
  require_once(ROOT_PATH .'/Models/Plans.php');
  require_once(ROOT_PATH .'/Models/Status.php');
  require_once(ROOT_PATH .'/Models/Chat.php');

  class Controller{
    private $request; //リクエストパラメータ(GET,POST,SESSION)
    private $User;    //Userモデル
    private $Add;  //Addモデル
    private $Sports;  //Sportsモデル
    private $Password_reset;  //Password_resetモデル
    private $Plans;  //Plansモデル
    private $Status;  //Statusモデル
    private $Chat;  //Chatモデル

    public function __construct() {
      //リクエストパラメータの取得
      $this->request['get'] = $_GET;
      $this->request['post'] = $_POST;

      //モデルオブジェクトの生成
      $this->User = new User();
      //別モデルと連携
      $dbh = $this->User->get_db_handler();
      $this->Add = new Add($dbh);
      $this->Sports = new Sports($dbh);
      $this->Password_reset = new Password_reset($dbh);
      $this->Plans = new Plans($dbh);
      $this->Status = new Status($dbh);
      $this->Chat = new Chat($dbh);
    }

    public function create(){
      $add = $this->Add->findAll();
      $sports = $this->Sports->findAll();
      $status = $this->Status->findAll();
      $params = [
        'add' => $add,
        'sports' => $sports,
        'status' => $status
      ];
      return $params;
    }

    public function createIntermediary(){
      $add = $this->Add->findId($this->request['post']['add_id']);
      $sports = $this->Sports->findId($this->request['post']['sports_id']);
      $params = [
        'add' => $add,
        'sports' => $sports,
      ];
      return $params;
    }

    public function createMakeIntermediary(){
      $sports = $this->Sports->findId($this->request['post']['sports_id']);
      $status = $this->Status->findId($this->request['post']['status_id']);
      $params = [
        'sports' => $sports,
        'status' => $status
      ];
      return $params;
    }

    public function register(){
      $create = $this->User->createUser();
    }

    public function intermediary(){
      $login = $this->User->login();
      $planDate = $this->Plans->planDate();
    }

    public function email_transmit_complete(){
      $user = $this->User->mail($this->request['post']['email']);
      $email = $this->User->keyCreate();
      $params = [
        'user' => $user
      ];
      return $params;
    }

    public function password_create_complete(){
      $password_reset = $this->Password_reset->findKey($this->request['post']);
    }

    public function index(){
      $planListAll = $this->Plans->planListAll();
      $params = [
        'planListAll' => $planListAll
      ];
      return $params;
    }

    public function mypage(){
      $mypage = $this->User->findById();
      $params = [
        'mypage' => $mypage
      ];
      return $params;
    }

    public function user(){
      $user = $this->User->findByUserId($this->request['get']['id']);
      $params = [
        'user' => $user
      ];
      return $params;
    }

    public function make_complete(){
      $make = $this->Plans->createPlan();
    }

    public function event_make_Id(){
      $event = $this->Plans->planListId();
      $params = [
        'event' => $event
      ];
      return $params;
    }

    public function event(){
      if (empty($this->request['get']['id'])) {
        echo '指定のパラメータが不正です。このぺージを表示できません。';
        exit;
      }

      $plan = $this->Plans->planById($this->request['get']['id']);
      $params = [
        'plan' => $plan
      ];
      return $params;
    }

    public function eventEdit(){
      if (empty($this->request['get']['id'])) {
        echo '指定のパラメータが不正です。このぺージを表示できません。';
        exit;
      }

      $plan = $this->Plans->planById($this->request['get']['id']);
      $sports = $this->Sports->findAll();
      $status = $this->Status->findAll();
      $params = [
        'plan' => $plan,
        'sports' => $sports,
        'status' => $status
      ];
      return $params;
    }

    public function eventEditComplete(){
      $eventUpdate = $this->Plans->eventUpdate($this->request['get']['id']);
    }

    public function chat(){
      $chatCreate = $this->Chat->chatCreate();
    }

    public function chatMessage(){
      $findAll = $this->Chat->findAll($this->request['get']['id']);
      $params = [
        'findAll' => $findAll
      ];
      return $params;
    }

    public function takeCreate(){
      $takeUser = $this->Plans->takeUser($this->request['get']['id']);
    }

    public function eventTake(){
      $myPlanList = $this->Plans->myPlanList();
      $params = [
        'myPlanList' => $myPlanList
      ];
      return $params;
    }

    public function myEventDelete(){
      $delete = $this->Plans->myplanDelete($this->request['get']['id']);
    }

    public function userEdit(){
      $add = $this->Add->findAll();
      $sports = $this->Sports->findAll();
      $mypage = $this->User->findById();
      $params = [
        'add' => $add,
        'sports' => $sports,
        'mypage' => $mypage
      ];
      return $params;
    }

    public function userEditManager(){
      $add = $this->Add->findAll();
      $sports = $this->Sports->findAll();
      $user = $this->User->findByUserId($this->request['get']['id']);
      $params = [
        'add' => $add,
        'sports' => $sports,
        'user' => $user
      ];
      return $params;
    }

    public function userEditComplete(){
      $userUpdate = $this->User->userUpdate($this->request['get']['id']);
    }

    public function planAllDelete(){
      $planDelete = $this->Plans->planDelete($this->request['get']['id']);
      $takeDelete = $this->Plans->takeDelete($this->request['get']['id']);
    }

    public function userPrisy(){
      $userListAll = $this->User->userListAll();
      $params = [
        'userListAll' => $userListAll
      ];
      return $params;
    }

    public function takeUserPrisy(){
      $takeUserList = $this->User->takeUserList($this->request['get']['id']);
      $params = [
        'takeUserList' => $takeUserList
      ];
      return $params;
    }

  }


?>
