<?php

if (isset($_GET["action"]) && !isset($_GET["id"])) {
    $templatePath = "../".$templatePath;
} 

if (isset($_GET["id"])) {
    $templatePath = "../../".$templatePath;
} 

if ($_GET["url"] == "library")
  $templatePath = "templates/default";

?>

<!DOCTYPE html>
<html lang="en-US" xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="apple-touch-icon" sizes="57x57" href="<?=$templatePath?>images/apple-touch-icon-57x57.png?v=1">
    <link rel="apple-touch-icon" sizes="60x60" href="<?=$templatePath?>images/apple-touch-icon-60x60.png?v=1">
    <link rel="apple-touch-icon" sizes="72x72" href="<?=$templatePath?>images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?=$templatePath?>images/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?=$templatePath?>images/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?=$templatePath?>images/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?=$templatePath?>images/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?=$templatePath?>images/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?=$templatePath?>images/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="<?=$templatePath?>images/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="<?=$templatePath?>images/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="<?=$templatePath?>images/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="<?=$templatePath?>images/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="<?=$templatePath?>/manifest.json">
    <meta name="msapplication-TileColor" content="#00aba9">
    <meta name="msapplication-TileImage" content="<?=$templatePath?>/mstile-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="shortcut icon" type="image/x-icon" href="<?=$templatePath?>/images/favicon.icon?v=1" />
    <title>Ladderr Box</title>
    <meta name="description" content="All in one social media management tool. Audience, monitor, publish and engagement for Twitter, Linkedin, Pinterest and Facebook" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/angularjs-toaster/0.4.15/toaster.min.css" />
    <link rel="stylesheet" type="text/css" href="<?=$templatePath?>/css/bootstrap.min.css?v=1" />
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?=$templatePath?>/css/morris-0.4.3.min.css" />
    <link rel="stylesheet" type="text/css" href="<?=$templatePath?>/js/jquery/gritter/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="<?=$templatePath?>/css/animate.css?v=1" />
    <link rel="stylesheet" type="text/css" href="<?=$templatePath?>/css/style.css?v=3.1" />

    <!--{% if app.request.host == "dashboard.ladderr.com" %}
    <script type="text/javascript">

        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

                    ga('create', 'UA-61698530-1', 'auto');
                                ga('send', 'pageview');
     </script>-->