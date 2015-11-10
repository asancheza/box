<?php

trait showView {
	public static function render($vars, $view) {
	  include_once("app/config/config.php");
	  $config = new Config();
	  $template = $config->template;
	  $templatePath = "templates/".$template."/";
	  $installPath = $config->path;
	  $page = include_once($templatePath."/".$view.".php");
	  echo $page;
	}
}

class ContentView {
  use showView;
}
?>