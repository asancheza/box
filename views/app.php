<?php

class AppView {
  public static function show($vars) {
	  include_once("app/config/config.php");
	  $config = new Config();
	  $template = $config->template;
	  $templatePath = "templates/".$template."/";
	  $installPath = $config->path;
	  $page = include_once($templatePath."/showApp.php");
  }
}
?>