<?php

include_once("Models/Users.php");
include_once("Models/App.php");

class appController {
  public $user;
  public $vars;

  public function __construct() {
    $this->user = unserialize($_SESSION["user"]);	
    $this->vars = array();
    $this->vars["user"] = $this->user;

    if (isset($_GET["action"])) { 
      switch ($_GET["action"]) {
        case "show": $this->show();
          break;
        case "create": $this->create();
          break;
        case "update": $this->update();
          break;
        case "delete": $this->delete();
          break;
      } 
    }
  }

  public function create() {
    include_once("Models/App.php");
    $app = new App();
    $result = $app->create();
    header("Location: show");
  }

  public function update() {
    include_once("Models/App.php");
    $app = new App();
    $result = $app->update();
    header("Location: show"); 
  }

  public function delete() {
    include_once("Models/App.php");
    $app = new App();
    $result = $app->delete();
    header("Location: show"); 
  }

  public function show() {
    include_once("views/app.php");
    $app = new App();
    $result = $app->listApps();

    $this->vars["result"] = $result;
    AppView::show($this->vars);
  }
}
?>