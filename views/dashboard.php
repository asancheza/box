<?php

class DashboardView {
  public static function render($vars) {
	  include_once("app/config/config.php");
	  $config = new Config();
	  $template = $config->template;
	  $templatePath = "templates/".$template."/";
	  $installPath = $config->path;
	  $page = include_once($templatePath."/showDashboard.php");
	  echo $page;
  }
}
?>