<?php

class DashboardView {
  public static function render($vars) {
	  include_once("app/config/config.php");
	  $config = new Config();
	  $template = $config->template;
	  $page = include_once("templates/".$template."/dashboard.php");
	  echo $page;
  }
}
?>