<?php

@session_start();

class UserController {
  public $vars;

  public function login() {
  	if (isset($_POST["action"]) && $_POST["action"] == "login") {
  		include_once("Models/Users.php");
  		$users = new Users();
  		if (true == $users->checkUsernamePassword()) {
        $_SESSION["user"] = serialize($users);
  			header("Location: dashboard");
      } else {
        $error = "usernamewrong";
  			header("Location: login?error=".$error);
      }
  	} else {
	  	$this->vars = array();
	  	$this->vars["nombre"] = "Alex"; 	
	   }
  }

  public function showLogin() {
    if (isset($_SESSION["user"]))
      header("Location: dashboard");
    
    if (!isset($_POST["action"])) {
      include_once("views/login.php");
      LoginView::render($this->vars);
    }
  }

  public function logout() {
    if (ini_get("session.use_cookies")) {
      $params = session_get_cookie_params();
      setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]);
    }

    // Destroy session
    session_destroy();
    header("Location: login");
  }

  public function register() {
    include_once("Models/Users.php");
    $users = new Users();
    $result = $users->insertUser();

    if ($result) {
      $_SESSION["user"] = serialize($users);
      header("Location: dashboard");
    } else {
      header("Location: login?error=registro");
    }
  }
}

?>