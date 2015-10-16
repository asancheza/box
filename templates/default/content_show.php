<?php

include("header.php");

if ("admin" == "admin") {

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
                            <a href="logout">
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
    <? } ?>

        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                        <?php if ("admin" == 'admin') { ?>
                            <form class="form-horizontal" action="contents?action=create&id=<?=$_GET['id']?>" method="post">
                            <h3>Create content</h3>
                             <form class="form-horizontal" action="index.php?url=login" method="POST">
                                <input style="color:black" class="form-control" type="text" name="name" placeholder="Name">
                                <input style="color:black" class="form-control" type="text" name="description" placeholder="Description">
                                <input type="hidden" name="action" value="create">
                                <input type="hidden" name="url" value="content">
                                <input type="hidden" name="app_id" value="<?=$_GET["id"];?>">
                                <button class="btn btn-primary block full-width m-b">Create content</button>
                              </form>
                            <? }

                                if (isset($_GET["error"])) { ?>
                                <div class="alert alert-danger">
                                Alert: <?=$_GET["error"]?>
                                </div>
                                <? } ?>

                                <h3>Contents</h3>

                                <div class="row show-grid">
                                <?php foreach ($vars["result"] as $key => $content) { 
                                    echo "<div class='col-md-4'>    
                                            <p>".$content["name"]."</p>
                                            <p>".$content["description"]."</p>
                                            <p><img src='http://lorempixel.com/400/400/people/".$key."'></p>
                                            <button class='btn btn-primary'>Publish</publish>
                                            </div>";
                                    }?>           
                                </div>
                            </table>
                        </div>                
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</html>

<?php
include("footer.php");
?>

<script>
var urlGetAccounts = "http://google.es";
var apiKey = "b34566889cbbd9ffcefab22e104e18cf";

$.get(urlGetAccounts);
</script>