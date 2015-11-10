<?php
include("header.php");
?>
    <div id="wrapper">
    
    <?php if ("admin" == $vars['user']->getRole()) { 
        include("sidebar.php"); 
        include("topbar.php");
    } ?>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                    <h3>Profile Information</h3>
                        <form class="form-horizontal" action="user/update" method="post">
                            <input class="form-control" type="text" name="username" value="<?=$vars['user']->getUsername()?>">
                            <input class="form-control" type="text" name="role" placeholder="Role" value="<?=$vars['user']->getRole()?>">
                            <input class="form-control" type="text" name="position" placeholder="Position" value="<?=$vars['user']->getPosition()?>">
                            <input class="form-control" type="text" name="company" placeholder="Company" value="<?=$vars['user']->getCompany()?>">
                            <input class="form-control" type="text" name="phone" placeholder="Phone" value="<?=$vars['user']->getPhone()?>">
                            <input class="form-control" type="text" name="email" placeholder="Email" value="<?=$vars['user']->getEmail()?>">
                            <input type="submit" class="btn btn-primary" value="Save">
                        </form>

                        <br/>
                        <a href="user/delete" class="btn btn-danger">Delete user</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

<div class="modal fade" id="publish" style="height:100%">
    <div class="modal-content">
        <div class="row">
            <div class="col-lg-3" style="margin:20px">
                <div class="content-onboard">
                    <h1>Thanks for using Ladderr Box</h1>
                    <p>Ladderr Box is the best way to communicate hotel and restaurant managers.</p>
                    <h2>How?</h2>
                    <p>Social Media Managers or any responsable of social media can create a strategy for all the year in a few simple steps.</p>
                    <h2>First step</h2>
                    <p>The first step is creating a place how you can see in the right.</p>
                    <p>A place is mainly a location where you can create contents. Easy, doesn't?
                </div>
                <div class="offset3">
                <br><br/>
                <button class="nxt btn btn-primary">Continue next step</button>
                <button class="btn btn-danger" data-dismiss="modal">Skip</button>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="content-image">
                    <img height="100%" src="images/box1.png"/>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.modal-dialog {
  width: 100%;
  height: 100%;
  padding: 0;
}

.modal-content {
  height: 100%;
  border-radius: 0;
}
</style>

<?php include("footer.php"); ?>

<script>
$( document ).ready(function() {
    <?php if (!isset($_SESSION["first"])) 
        echo "$('#publish').modal('show');";
    ?> 

    $('.nxt').click(function() {
        $('.content-onboard').html("<h1>Second Step</h1>" +
            "<p>Now that you have your app created, it is the turn to create your contents" +
            "<p>Create the content for your hotel or restaurant.</p>" +
            "<ul><li>Fill the title of your content</li>" +
            "<li>Fill the perfect copy</li>" +
            "<li>Add a great image</li></ul>"+
            "<p>And it is finished</p>");

        $('.content-image > img').attr('src', 'images/box2.png');
        $('.nxt').text("Lets do it!");
        $('.nxt').click(function(){
            $('#publish').modal('hide');
        });
        $('.btn-danger').hide();
    });
});
</script>
<?php $_SESSION["first"] = "first"; ?>