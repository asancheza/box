<?php

//var_dump($vars);

?>

<html>
  <body>
  <h1>Login</h1>
  <form action="/box/index.php?url=login" method="POST">
  	<input type="text" name="username" placeholder="Username">
  	<input type="text" name="password" placeholder="Password">
    <input type="hidden" name="action" value="login">
    <input type="hidden" name="url" value="login">
  	<button>Login</button>
  </form>

  <h1>Register</h1>
  <form action="/box/register" method="POST">
  	<input type="text" placeholder="Username">
  	<input type="text" placeholder="Password">
  	<button>Register</button>
  </form>
  </body>
</html>