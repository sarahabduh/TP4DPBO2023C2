<?php
include_once("conf.php");
include_once("models/Hobby.class.php");
include_once("views/Hobby.view.php");
include_once("views/FormHobby.view.php");

class HobbyController {
  private $hobby;

  function __construct(){
    $this->hobby = new Hobby(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index() {
    $this->hobby->open();
    $this->hobby->getHobby();

    $data = array();
    while($row = $this->hobby->getResult()){
      array_push($data, $row);
    }

    $this->hobby->close();

    $view = new HobbyView();
    $view->render($data);
  }
  
  function add($data){
    $this->hobby->open();
    $this->hobby->add($data);
    $this->hobby->close();
    header("location:hobby.php");
    
  }

  function edit($id){
    if(!isset($_POST['submit'])){
        $this->hobby->open();
        $this->hobby->getHobbyById($id);
        $row = $this->hobby->getResult();
        $data = array(
            'name' => $row['hobby_name']
        );
        
        $this->hobby->close();
        $form = new FormView();
        $form->renderEdit($data);
    }
    else {
        $this->hobby->open();
        $data = array(
            'name' => $_POST['name'],
        );
        
        $this->hobby->update($id, $data);
        $this->hobby->close();
        header("location:hobby.php");
    }
  }

  function delete($id){
    $this->hobby->open();
    $this->hobby->delete($id);
    $this->hobby->close();
    
    header("location:hobby.php");
  }

  function addForm(){
    $form = new FormView();
    $form->renderAdd();
  }
}