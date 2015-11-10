<?php

include_once("models/Users.php");
include_once("models/Content.php");
include_once("controllers/RouteInterface.php");

class contentController implements RouteInterface {
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
    $content = new Content();
    $company = $this->user->getCompany()?"(".$this->user->getCompany().")": " ";
    $_POST["description"] .= " -- ".$this->user->getUsername().$company;
    $result = $content->create();
    header("Location: ".$_GET["id"]);
  }

  public function update() {
    $content = new Content();
    $result = $content->update();
    header("Location: ".$_POST["app"]); 
  }

  public function delete() {
    $content = new Content();
    $result = $content->delete();
    header("Location: ".$_GET["app"]); 
  }

  public function show() {
    $_SESSION["apps"] = $_GET["id"];

    include_once("views/content.php");
    $content = new Content();
    $result = $content->show();

    $this->vars["result"] = $result;
    ContentView::render($this->vars, "showContent");
  }

  public function library() {
    include_once("views/content.php");
    ContentView::render($this->vars, "showLibrary");
  }

  public function publish() {
    include_once("services/contentService.php");
    contentService::publish();
  }
}
?>