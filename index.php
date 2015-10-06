<?php

session_start();
/*
 * Execute in command line
*/
if (!isset($_SERVER["HTTP_HOST"])) {
	parse_str($argv[1], $_GET);
 	parse_str($argv[1], $_POST);
}

/*
 * Sanitize vars
*/
if (!isset($_GET["url"])) 
	$url = "login";
else
	$url = filter_var($_GET['url'], FILTER_SANITIZE_STRING);

/*
 * Check URL to send request to the right controller
*/
switch($url) {
	case "login": 
	  include_once ("controllers/UserController.php");
	  $user = new UserController();	
	 	$user->login();
	  $user->showLogin();
	  break;

	case "logout": 
		include_once ("controllers/UserController.php");
		$user = new UserController();	
		$user->logout();
	  break;

	case "register": 
	  include_once ("controllers/UserController.php");
	  $user = new UserController();	
		$user->register();
	  break;
	  
	case "dashboard": 
		include_once ("controllers/DashboardController.php");
	  $dashboard = new dashboardController();
	  $dashboard->render();
	  break;

	 case "app": 
		include_once ("controllers/AppControllerA.php");
	  $app = new appController();
	  //$app->render();
	  break;

	 case "404": 
		include_once ("controllers/404.php");
		$notfound = new NotfoundController();
		$notfound->render();
	  break;
}

?>