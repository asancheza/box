<?php

include_once("Models/Users.php");

class appController {
  public $user;
  public $vars;

  public function __construct() {
    /*$this->user = unserialize($_SESSION["user"]);	
    $this->vars = array();
    $this->vars["user"] = $this->user;*/

    var_dump($_GET);
  }

  public function create() {
    /*include_once("Models/Users.php");
    $apps = new Apps();
    $result = $apps->insertApp();*/
  }

  public function modify() {
    
  }

  public function delete() {
    
  }
}

?>