<?php

include_once("models/Users.php");

class NotfoundController {
  public $user;
  public $vars;

  public function __construct() {
  }

  public function render404() {
    include_once("views/404.php");
    NotfoundView::render404($this->user);
  }

  public function render500() {
    include_once("views/500.php");
    NotfoundView::render500($this->user);
  }
}

?>