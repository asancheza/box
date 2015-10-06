<?php

include_once("Models/Users.php");

class NotfoundController {
  public $user;
  public $vars;

  public function __construct() {
  }

  public function render() {
    include_once("views/404.php");
    NotfoundView::render($this->user);
  }
}

?>