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
$url = filter_var($_GET['url'], FILTER_SANITIZE_STRING);

/*
 * Check URL to send request to the right controller
*/
switch($url) {
	case "login": 
	  include_once ("controllers/login.php");
	  $login = new LoginController();
	  $login->render();
	  break;

	case "logout": 
	  //include_once ("controllers/logout.php");
	  //$logout = new LogoutController();
	  //$logout->execute();
		// Remove cookies
		if (ini_get("session.use_cookies")) {
			$params = session_get_cookie_params();
			setcookie(session_name(), '', time() - 42000,
		        $params["path"], $params["domain"],
		        $params["secure"], $params["httponly"]
		  );
		}

		// Destroy session
		session_destroy();
	  break;
	  
	case "dashboard": 
		include_once ("controllers/dashboard.php");
	  $dashboard = new dashboardController();
	  $dashboard->render();
	  break;

	 case "404": 
		echo "Error 404";
	  break;
}

?>