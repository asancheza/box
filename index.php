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

	case "user":
		include_once ("controllers/UserController.php");
	  $user = new UserController();
	  if ($_GET["action"] == "update")	
			$user->update();

		if ($_GET["action"] == "delete")	
			$user->delete();

	  break;

	case "profile": 
	  include_once ("controllers/UserController.php");
	  $user = new UserController();	
		$user->profile();
	  break;
	  
	case "dashboard": 
		include_once ("controllers/DashboardController.php");
	  $dashboard = new dashboardController();
	  $dashboard->render();
	  break;

	 case "app": 
		include_once ("controllers/AppController.php");
	  $app = new appController();
	  //$app->render();
	  break;

	 case "contents": 
		include_once ("controllers/ContentController.php");
	  $contents = new contentController();
	  //$app->render();
	  break;

	 case "publish": 
		include_once ("controllers/ContentController.php");
	  $contents = new contentController();
	  $contents->publish();
	  break;

	 case "library": 
		include_once ("controllers/ContentController.php");
	  $contents = new contentController();
	  $contents->library();
	  break;

	 case "404": 
		include_once ("controllers/404.php");
		$notfound = new NotfoundController();
		$notfound->render404();
	  break;

	 case "500": 
		include_once ("controllers/404.php");
		$notfound = new NotfoundController();
		$notfound->render500();
	  break;
}

?>
