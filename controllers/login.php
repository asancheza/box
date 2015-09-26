<?php

class LoginController {
  public $vars;

  public function __construct() {
  	if (isset($_POST["action"]) && $_POST["action"] == "login") {
  		include_once("Models/Users.php");
  		$users = new Users();
  		if (true == $users->checkUsernamePassword()) {
        $_SESSION["user"] = serialize($users);
  			header("Location: dashboard");
      }
  		else
  			echo "Error login";
  	} else {
	  	$this->vars = array();
	  	$this->vars["nombre"] = "Alex"; 	
	   }
  }

  public function render() {
    if (!isset($_POST["action"])) {
      include_once("views/login.php");
      LoginView::render($this->vars);
    }
  }
}

?>