<?php
/*
 * Template Name: Index
 */
display_header(); 
?>
    <div class="animationFlash">
        <object width="1000" height="660">
            <param name="movie" value="<?php printf('%s/flash/animation-index.swf', get_template_directory_uri()); ?>">
            <param name="quality" value="high">
            <embed src="<?php printf('%s/flash/animation-index.swf', get_template_directory_uri()); ?>" quality="high" width="1000" height="660"></embed>
        </object>
    </div>
    <div class="logoSparklinglengua">
        <?php printf('<a href="%s" title="Sparkling Lengua"><img src="%s/img/logo.jpg" alt="Sparkling Lengua"></a>',home_url(), get_template_directory_uri()); ?>
    </div>
        <?php
        global $post;
        $postID = get_post_meta($post->ID, 'welcomeLink');
        printf('<div id="welcomeLink">%s</div>',$postID[0]);
        if (have_posts()){
            while (have_posts()) {
                the_post();
                the_content();
            }
        }
        display_footer();  