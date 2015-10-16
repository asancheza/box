<?php

class ContentView {
  public static function show($vars) {
	  include_once("app/config/config.php");
	  $config = new Config();
	  $template = $config->template;
	  $templatePath = "templates/".$template."/";
	  $page = include_once($templatePath."/content_show.php");
  }
}
?>