<?php
  include("header.php");
?>

<div id="wrapper">
        <?php include("sidebar.php"); ?>
        
        <div id="page-wrapper" class="gray-bg" style="min-height: 923px;">
            <div class="row border-bottom">
    <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
        <ul class="nav navbar-top-links navbar-right">
                <li>
                    <a id="upgrade_button" href="javascript:void(0)">
      Upgrade
                    </a>
                </li>
                        <li>
                <a href="/box/logout">
                    <i class="fa fa-sign-out"></i> Log out
                </a>
            </li>
        </ul>
    </nav>
</div>
            
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2><i class="fa fa-wrench"></i> Settings</h2>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <form class="form-horizontal" action="create" method="post">
                        <a href="app/show">Create app</a>
                         <form class="form-horizontal" action="index.php?url=login" method="POST">
                            <input style="color:black" class="form-control" type="text" name="name" placeholder="Name">
                            <input style="color:black" class="form-control" type="text" name="description" placeholder="Description">
                            <input type="hidden" name="action" value="create">
                            <input type="hidden" name="url" value="app">
                            <input type="hidden" name="user_id" value="<?=$vars['user']->getId();?>">
                            <button class="btn btn-primary block full-width m-b">Create app</button>
                          </form>
                                                  <?php if (isset($_GET["error"])) { ?>
                          <div class="alert alert-danger">
                              Alert: <?=$_GET["error"]?>
                          </div>
                          <? } ?>


                        <h3>Apps</h3>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            
                                foreach ($vars["result"] as $app) { 
                            echo "<tr>
                                    <td colspan='5'>".$app["name"]."</td>
                                    <td colspan='5'>".$app["description"]." <a href='contents/".$app["id"]."'>Edit</a> <a href='delete?id=".$app["id"]."'>Delete</a></td>
                                </tr>";
                                
                             } ?>                           
                            </tbody>
                        </table>

                    </div>                
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
  <body>

<?php
include("footer.php");
?>