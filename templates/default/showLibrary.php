<?php

  include("header.php");
  $templatePath = "templates/default";
?>

    <div id="wrapper">
    <?php if ("admin" == $vars['user']->getRole()) { 
        include("sidebar.php"); 
        include("topbar.php");
      }
    ?>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                    
                        <? if ("admin" == $vars['user']->getRole()): ?>

                          <form method="POST" action="/dashboard/upload.php" enctype="multipart/form-data">
                            <input type="file" name="foo" value=""/>
                            <input type="hidden" name="upload" value="1"/>
                            <input class="btn btn-primary block full-width m-b" type="submit" value="Upload File"/>
                          </form>

                          <?php $dirname = "uploads/";
$images = glob($dirname."*");

foreach($images as $image) 
  echo '<img width="200px" src="'.$image.'" /><br />'; ?>

                          <? endif; ?>
                          
                          <?php if (isset($_GET["error"])) { ?>
                          <div class="alert alert-danger">
                              Alert: <?=$_GET["error"]?>
                          </div>
                          <? } ?>

                        
                          <script>
                          function goBack() {
                              window.history.back();
                          }
                          </script>
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