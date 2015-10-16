<?php

include_once("Models/Users.php");
include_once("Models/Content.php");

class contentController {
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
    $result = $content->create();
    header("Location: ".$_GET["id"]);
  }

  public function update() {
    
  }

  public function delete() {
    
  }

  public function show() {
    include_once("views/content.php");
    $content = new Content();
    $result = $content->listContents();

    $this->vars["result"] = $result;
    ContentView::show($this->vars);
  }
}
?>