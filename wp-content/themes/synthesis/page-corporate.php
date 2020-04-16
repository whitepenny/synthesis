<?php
/*
 Template Name: Corporate Info
 *
 * This is your custom page template. You can create as many of these as you need.
 * Simply name is "page-whatever.php" and in add the "Template Name" title at the
 * top, the same way it is here.
 *
 * When you create your page, you can just select the template and viola, you have
 * a custom page template to call your very own. Your mother would be so proud.
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/
?>

<?php get_header(); ?>

    <?php while(have_posts()) : the_post(); ?>

    <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>

    <div class="page-container">

        <div class="page-content__container">

            <div class="page-content corporate-content">
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
            </div>
        </div>

    </div>

    <?php endwhile; ?>


    
        
       
    <?php get_footer(); ?>