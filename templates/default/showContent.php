<?php

include("header.php");

if ("admin" == $vars['user']->getRole()) {

?>

    <div id="wrapper">
    <?php 
        include("sidebar.php"); 
        include("topbar.php");
    ?>
        
    <? } ?>

        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                        <button class="btn btn-success" onclick="goBack()">Go Back</button>
       
                        <?php if ("admin" == $vars['user']->getRole() || "emplo" == $vars['user']->getRole()) { ?>

                            <form class="form-horizontal" action="contents?action=create&id=<?=$_GET['id']?>" method="post">
                            <h3>Create content</h3>
                             <form class="form-horizontal" action="index.php?url=login" method="POST">
                                <input style="color:black" class="form-control" type="text" name="name" placeholder="Name">
                                <input style="color:black" class="form-control" type="text" name="description" placeholder="Description">
                                <div class="row">
                                    <div class="col-lg-9"><input style="color:black" class="form-control content-image" type="text" name="image" placeholder="Image url"></div>
                                    <div class="col-lg-3"><a class="btn btn-success block full-width m-b" data-toggle="modal" data-target="#search-modal" href="#"><i class="fa fa-search"></i>Search</a></div>
                                </div><br/>
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

                                <? if ($vars["result"] != '') {
                                    echo "<h3>Contents</h3>";  ?>
                                
                                <script>
                                function goBack() {
                                    window.history.go(-1);
                                }
                                </script>

                                <div class="row show-grid">
                                <?php foreach ($vars["result"] as $key => $content) { 
                                    echo "<div class='col-md-4'>    
                                            <p class='content-name'>".$content["name"]."</p>
                                            <p style='height:50px'  class='content-description'>".$content["description"]."</p>";
                                            if ($content["image"] != '') {
                                                if (strpos($content["image"], 'vimeo') !== false)
                                                    echo "<iframe class='content-image' width='100%' height='295px' src='".$content["image"]."'></iframe>";
                                                else
                                                    echo "<a href='#' data-toggle='modal' data-target='#publish'><img id='aviary_".$content["id"]."' width='100%' height='300px' class='content-image' src='".$content["image"]."'></a>";
                                                
                                            } else {
                                                echo "<img class='content-image' src='http://lorempixel.com/400/400/people/".$key."'>";
                                            } ?>
                                            

                                                <br/><br/><a href="javascript:void(0)" id="aviary_logo" onclick="return launchEditor('aviary_<?=$content["id"]?>', '<?=$content["image"]?>');" class="btn btn-warning">Edit image</a>


                                            <?php echo "<button class='btn btn-primary publish-content' data-toggle='modal' data-target='#publish'>Publish</button>";

                                            if ("admin" == $vars['user']->getRole())
                                                echo "<a href='#' data-toggle='modal' data-target='#edit_".$content["id"]."' class='btn btn-info publish-content'> <i class='fa fa-edit'></i></a>
                                            <a href='delete?id=".$content["id"]."&app=".$_GET["id"]."' class='btn btn-danger publish-content'> <i class='fa fa-trash'></i></a>";
                                            
                                            echo "</div>";

                                    echo '<div class="modal fade" id="edit_'.$content['id'].'">
                                            <div class="modal-content">
                                                <div class="row">
                                                    <div class="col-lg-3" style="margin:20px">
                                                        <div class="content-onboard">
                                                            <h1>Edit content</h1>
                                                            <form class="form-horizontal" action="edit" method="POST">
                                                                <input type="text" class="form-control" name="name" value="'.$content["name"].'">
                                                                <input type="text" class="form-control" name="description" value="'.$content["description"].'">
                                                                <input type="text" class="form-control" name="image" value="'.$content["image"].'">
                                                                <input type="hidden" name="id" value="'.$content["id"].'">
                                                                <input type="hidden" name="app" value="'.$_GET["id"].'">
                                                                <button class="btn btn-primary">Guardar</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
                                    }
                                } 

                              ?>   
                                </div>
                            </table>
                        </div>                
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="search-modal">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Search</h4>
        </div>
        <div class="modal-body">
        <input style="color:black" class="input-search form-control" type="text" name="search" placeholder="Search Image">
        <button class="search btn btn-success block full-width m-b"><i class="fa fa-search"></i> Search</button>   
        <div class="images"></div> 
         <input style="color:black" class="input-video form-control" type="text" name="search" placeholder="Search Video">
        <button class="search-video btn btn-success block full-width m-b"><i class="fa fa-search"></i> Search</button>   
        <div class="videos"></div> 
        <?php $dirname = "uploads/";
$images = glob($dirname."*");

foreach($images as $image) 
  echo '<img width="200px" src="http://'.$_SERVER['SERVER_NAME'].$installPath."/".$image.'" /><br />'; ?>
        </div>
    </div>
</div>

<div class="modal fade" id="publish">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Publish the content</h4>
        </div>
        <div class="modal-body">
        <?php $data = file_get_contents("http://dashboard.ladderr.com/api/v1/list/accounts?options={%22apiKey%22:%22b34566889cbbd9ffcefab22e104e18cf%22}");
$data_decoded = json_decode($data);

echo "<h1>Facebook</h1>";
foreach($data_decoded->facebook->accounts as $facebookAccount) {
    //echo $facebookAccount->name;
    //echo $facebookAccount->imageUrl;
    //echo $facebookAccount->id;
    echo "<img alt='".$facebookAccount->name."' src='".$facebookAccount->imageUrl."'>";
}

echo "<h1>Twitter</h1>";
foreach($data_decoded->twitter as $twitterAccount) {
    //echo $twitterAccount->name;
    //echo $twitterAccount->imageUrl;
    //echo $twitterAccount->id;
    echo "<img height='50px' alt='".$twitterAccount->name."' src='".$twitterAccount->imageUrl."'>";
}

echo "<h1>Pinterest</h1>";
foreach($data_decoded->pinterest[0]->pinBoards as $twitterAccount) {
    //echo $twitterAccount->name;
    //echo "<div class='col-md-1 col-sm-2 col-xs-3 text-center fb-acc'>;
    echo "<img class='img-circle' alt='".$twitterAccount->name."' src='".$twitterAccount->image."'>";
    //echo '<img src="'.$templatePath.'images/d6a2ee7.png" class="social-icon">';
} ?>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary publish-button" data-dismiss="modal">Publish</button>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>

<script>
$(document).ready(function() {
    var content = "";
    var image = "";

    $('.publish-content').click(function() {
        content = $(this).parent().find(".content-description").text();
        image = $(this).parent().find(".content-image").attr('src');

    });

    $('.publish-button').click(function() {
        $.ajax({
            url: "<?=$installPath?>/publish",
            data: { 'content': content ,
                    'image': image},
            type: "POST"
        });
    });

    $('.search-video').click(function() {
        $(".videos").html('');
        var video = $('.input-video').val();

        $.getJSON("<?=$installPath?>/sample.php?query="+video,
            function(data){
                for(x=0; x<data.length; x++){
                    /*var img = data.photos.photo[x];
                    var id = img.id;

                    if(img.url_q != "" && img.width_l > 1023 ){
                            $("<img >").attr("src", img.url_q)
                            .attr('class','image_filepicker')
                            .attr('alt',img.url_l)
                            .attr("title",img.width_l+"x"+img.height_l)  //muestra tamaño original
                            .attr("width",img.width_q)  //tamaño square
                            .attr("height",img.height_q)  
                            .appendTo(".images");
                    }//if*/
                    $("<div class='col-lg-4'>"+'<a href="#">'+data[x].name+'</a>'+'<a class="btn btn-primary select-video" href="#">Select video</a>'+data[x].embed.html+"</div>").appendTo(".videos");
                    $('iframe').attr("width", "100%");
                    $('iframe').attr("height", "300px");
                }
            }).done(function(){
                $('img').click(function() {
                    $('.content-image').val($(this).attr('alt'));   
            });
            
            $('.select-video').click(function() { 
                $('.content-image').val($(this).parent().find("iframe").attr("src")); 
                $('#search-modal').modal('toggle');
                $('.modal-backdrop').remove();
            });
        });
    });  

    $('.search').click(function() {
        $(".images").html('');
        var pic = $('.input-search').val();
        var url = "https://api.flickr.com/services/rest/?method=flickr.photos.search&api_key=ea22c522696dc206fee306a07f64f5b7&sort=relevance&extras=url_q,url_l&per_page=100&page=1&text="+pic+"&format=json&jsoncallback=?";

        $.getJSON(url,
            function(data){
                for(x=0 ; x<data.photos.photo.length ; x++){
                    var img = data.photos.photo[x];
                    var id = img.id;

                    if(img.url_q != "" && img.width_l > 1023 ){
                        $("<img >").attr("src", img.url_q)
                            .attr('class','image_filepicker')
                            .attr('alt',img.url_l)
                            .attr("title",img.width_l+"x"+img.height_l)  //muestra tamaño original
                            .attr("width",img.width_q)  //tamaño square
                            .attr("height",img.height_q)  
                            .appendTo(".images");
                    }
                }
            }).done(function(){
                $('img').click(function() {
                    $('.content-image').val($(this).attr('alt'));
                    $('#search-modal').modal('toggle');
                    $('.modal-backdrop').remove();
                });
            });
        });

        $('img').click(function() {   
            $('.content-image').val($(this).attr('src'));
            $('#search-modal').modal('toggle');
            $('.modal-backdrop').remove();
        });
    });   
</script>

<script type="text/javascript" src="http://feather.aviary.com/js/feather.js"></script>

<script type='text/javascript'>
   var featherEditor = new Aviary.Feather({
       apiKey: 'be32d2b596e0292b',
       apiVersion: 3,
       theme: 'light', // Check out our new 'light' and 'dark' themes!
       tools: 'all',
       appendTo: '',
       onSave: function(imageID, newURL) {
           var img = document.getElementById(imageID);
           img.src = newURL;
           // $('#edit_78').find("button").submit()
       },
       onError: function(errorObj) {
           alert(errorObj.message);
       }
   });
   function launchEditor(id, src) {
       featherEditor.launch({
           image: id,
           url: src
       });
      return false;
   }
</script>

<?php $_SESSION["first"] = "first"; ?>