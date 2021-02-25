<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package starter_theme
 */

get_header();
?>



    <?php
    while ( have_posts() ) :
      the_post();

      //get_template_part( 'template-parts/content', 'page' );
      ?>
      <article class="block videoheader">
        <div class="overlay"></div>
        <video class="video" id="myVideo" muted="muted" loop="loop" autoplay="autoplay">
            <source src="<?php echo get_template_directory_uri() ?>/assets/img/Hoge Vucht promotievideo-720fast.mp4" type="video/mp4">
                   Your browser does not support HTML5 video.
        </video> 
        <h1>hello</h1>
        <h1>hello</h1>
        <h1>hello</h1>
        <h1>hello</h1>
        <h1>hello</h1>
        <h1>hello</h1>
        <h1>hello</h1>
        <h1>hello</h1>
        <h1>hello</h1>
        <h1>hello</h1>
        <img src="https://picsum.photos/1200/500/" />
      </article>

      <?php
      
    endwhile; // End of the loop.
    ?>




<?php

get_footer();
