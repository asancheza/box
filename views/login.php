<?php

class LoginView {
  public static function render($vars) {
	  include_once("app/config/config.php");
	  $config = new Config();
	  $template = $config->template;
	  $templatePath = "templates/".$template."/";
	  $page = include_once($templatePath."/login.php");
	  echo $page;
  }
}
?>