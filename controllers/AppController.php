<?php

include_once("models/Users.php");
include_once("models/App.php");
include_once("controllers/RouteInterface.php");

class appController implements RouteInterface {
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
    $app = new App();
    $result = $app->create();
    header("Location: show");
  }

  public function update() {
    $app = new App();
    $result = $app->update();
    header("Location: show"); 
  }

  public function delete() {
    $app = new App();
    $result = $app->delete();
    header("Location: show"); 
  }

  public function show() {
    include_once("views/app.php");
    $app = new App();
    $result = $app->show();

    $this->user = unserialize($_SESSION["user"]); 
    $this->vars = array();
    $this->vars["user"] = $this->user;

    $this->vars["result"] = $result;
    AppView::show($this->vars);
  }
}
?>