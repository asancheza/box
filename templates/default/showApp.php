<?php
  include("header.php");
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
                        <button class="btn btn-primary" onclick="goBack()">Go Back</button>                     

                        <? if ("admin" == $vars['user']->getRole()): ?>
                         <form class="form-horizontal" action="create" method="post">
                            <input style="color:black" class="form-control" type="text" name="name" placeholder="Name">
                            <input style="color:black" class="form-control" type="text" name="description" placeholder="Description">
                            <input type="hidden" name="action" value="create">
                            <input type="hidden" name="url" value="app">
                            <input type="hidden" name="user_id" value="<?=$vars['user']->getId();?>">
                            <button class="btn btn-primary block full-width m-b">Add a place</button>
                          </form>
                          <? endif; ?>
                          
                          <?php if (isset($_GET["error"])) { ?>
                          <div class="alert alert-danger">
                              Alert: <?=$_GET["error"]?>
                          </div>
                          <? } ?>

                          <h3>Places</h3>

                          <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            
                            foreach ($vars["result"] as $app) { 
                                echo "<tr>
                                    <td>".$app["name"]."</td>
                                    <td>".$app["description"]."</td>
                                    <td><a href='contents/".$app["id"]."' class='btn btn-info'><i class='fa fa-edit'></i></a>"; 
                                    if ("admin" == $vars['user']->getRole()) echo "<a href='delete?id=".$app["id"]."' class='btn btn-danger'><i class='fa fa-trash'></i></a></td>";
                                echo "</tr>";  
                             } ?>  

                            </tbody>


                        </table>

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