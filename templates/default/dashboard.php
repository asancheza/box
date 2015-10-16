<?php
include("header.php");
?>

<div id="wrapper">

<?include("sidebar.php") ?>
         
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
                        <form class="form-horizontal" action="/settings" method="post">
                        <h1>Welcome <?=$vars->getUsername()?></h1>
                        <a href="app/show">Create app</app>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
  </div>
</div>