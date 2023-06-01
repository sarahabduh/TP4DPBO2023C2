<?php
include_once("conf.php");
include_once("models/Member.class.php");
include_once("models/Hobby.class.php");
include_once("views/Member.view.php");
include_once("views/Form.view.php");

class MemberController {
  private $member;
  private $hobby;

  function __construct(){
    $this->member = new Member(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    $this->hobby = new Hobby(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index() {
    $this->member->open();
    $this->member->getMember();

    $data = array();
    while($row = $this->member->getResult()){
      array_push($data, $row);
    }

    $this->member->close();

    $view = new MemberView();
    $view->render($data);
  }
  
  function add($data){
    $this->member->open();
    $this->member->add($data);
    $this->member->close();
    header("location:index.php");
    
  }

  function edit($id){
    if(!isset($_POST['submit'])){
        $this->member->open();
        $this->member->getMemberById($id);
        $row = $this->member->getResult();
        $data = array(
            'name' => $row['name'],
            'email' => $row['email'],
            'phone' => $row['phone'],
            'date' => $row['join_date'],
        );
        
        $this->member->close();
        $form = new FormView();
        $form->renderEdit($data);
    }
    else {
        $this->member->open();
        $data = array(
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'date' => $_POST['date']
        );
        
        $this->member->update($id, $data);
        $this->member->close();
        header("location:index.php");
    }
  }

  function delete($id){
    $this->member->open();
    $this->member->delete($id);
    $this->member->close();
    
    header("location:index.php");
  }

  function addForm(){
    $form = new FormView();
    $form->renderAdd();
  }
}