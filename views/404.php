<?php

class NotfoundView {
  public static function render404($vars) {
	  include_once("app/config/config.php");
	  $config = new Config();
	  $template = $config->template;
	  $templatePath = "templates/".$template."/";
	  $installPath = $config->path;
	  $page = include_once($templatePath."/show404.php");
	  echo $page;
  }

  public static function render500($vars) {
	  include_once("app/config/config.php");
	  $config = new Config();
	  $template = $config->template;
	  $templatePath = "templates/".$template."/";
	  $installPath = $config->path;
	  $page = include_once($templatePath."/show500.php");
	  echo $page;
  }
}
?>