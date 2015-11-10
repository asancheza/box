<?php

@session_start();

class UserController {
  public $vars;

  public function login() {
  	if (isset($_POST["action"]) && $_POST["action"] == "login") {
  		include_once("models/Users.php");
  		$users = new Users();
  		if (true == $users->checkUsernamePassword()) {
        $_SESSION["user"] = serialize($users);
        $this->vars = array();
        $this->vars["user"] = $users;
        header("Location: dashboard");
      } else {
        $error = "usernamewrong";
  			header("Location: login?error=".$error);
      }
  	} 
  }

  public function showLogin() {
    if (isset($_SESSION["user"]))
      header("Location: dashboard");
    
    if (!isset($_POST["action"])) {
      include_once("views/login.php");
      LoginView::render($this->vars, "showLogin");
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
    include_once("models/Users.php");
    $users = new Users();
    $result = $users->create();

    if ($result) {
      $_SESSION["user"] = serialize($users);
      header("Location: dashboard");
    } else {
      $error = "register";
      header("Location: login?error=".$error);
    }
  }

  public function profile() {
    include_once("models/Users.php");
    $this->vars["user"] = unserialize($_SESSION["user"]);
    include_once("views/profile.php");
    ProfileView::render($this->vars, "showProfile");
  }

  public function update() {
    include_once("models/Users.php");
    $users = new Users();
    $users->update();
    //header("Location: ../profile?error=ok");
  }

  public function delete() {
    include_once("models/Users.php");
    $users = new Users();
    $users->delete();
    //header("Location: ../logout");
  }
}

?>