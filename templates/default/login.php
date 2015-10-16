<?php
  include("header.php");
?>

  <body class="pace-done">
    <div class="middle-box text-center loginscreen animated fadeInDown">
      <div>
        <img style="margin-top:50%" class="logo-name" src="http://www.ladderr.com/images/logo.png">
      </div>
      <h3 style="margin-top:5%">Welcome to Ladderr Box</h3>
      <p>Social content for hotels and restaurants</p>
      <br/>

      <?php if (isset($_GET["error"])) { ?>
      <div class="alert alert-danger">
          Alert: <?=$_GET["error"]?>
      </div>
      <? } ?>

      <form class="form-horizontal" action="index.php?url=login" method="POST">
        <input style="color:black" class="form-control" type="text" name="username" placeholder="Username">
        <input style="color:black" class="form-control" type="text" name="password" placeholder="Password">
        <input type="hidden" name="action" value="login">
        <input type="hidden" name="url" value="login">
        <button class="btn btn-primary block full-width m-b">Login</button>
      </form>
              
      <!--<button onclick="location.href='http://dashboard.ladderr.com/connect/twitter';" class="btn btn-primary block full-width m-b">Login with Twitter</button>-->
      <br/>
      <form action="register" method="POST" action="index.php?url=register" >
      	<input style="color:black"  class="form-control" type="text" name="username" placeholder="Username">
      	<input style="color:black" class="form-control" type="text" name="password" placeholder="Password">
      	<input style="color:black" class="form-control" type="text" name="company" placeholder="Company">
        <input style="color:black"  class="form-control" type="phone" name="phone" placeholder="Phone">
        <input class="form-control" type="email" placeholder="Email">
        <button class="btn btn-primary block full-width m-b">Register</button>
      </form>
      <p class="m-t"><small>Ladderr, 2015</small></p>
    </div>
  <body>
</html>