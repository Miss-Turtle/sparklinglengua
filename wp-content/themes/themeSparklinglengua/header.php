<!doctype html>
<html lang="<?php print(display_langue()); ?>">
<?php 
global $post;
$titlePage = get_the_title($post->ID);
if($titlePage == 'Home'){
    $titlePage = 'Sparkling Lengua';
}
?>
    <head>    
        <title><?php print($titlePage); ?></title>
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300italic,300|Montserrat+Subrayada:700,400|Kalam:700,400,300|Open+Sans:400,800italic,800,700italic,700,600italic,600,400italic,300italic,300&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <link rel="icon" rel="shortcut icon" href="<?php print(get_template_directory_uri().'/img/favicon.ico'); ?>">
        <?php display_meta_description($post->ID); ?>
        <meta name=viewport content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>
    </head>
    <body>
    <?php include_once("analyticstracking.php") ?>
        <div id="container">
                
                