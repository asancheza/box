<?php

include_once("Models/Users.php");

class dashboardController {
  public $user;
  public $vars;

  public function __construct() {
    $this->user = unserialize($_SESSION["user"]);	
    $this->vars = array();
    $this->vars["user"] = $this->user;
  }

  public function render() {
    include_once("views/dashboard.php");
    dashboardView::render($this->user);
  }
}

?>