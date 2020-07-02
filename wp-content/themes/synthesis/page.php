<?php get_header(); ?>

    <?php while(have_posts()) : the_post(); ?>

    <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>

    <div class="page-container">

        <div class="page-header">
            <div>
            <img src="<?php echo $thumb['0']; ?>" alt="" />
            </div>

            <div class="page-header__content">
                <div>
                    <h1><?php the_title(); ?></h1>
                    <?php the_field('header_content'); ?>
                </div>
            </div>
        </div>

        <div class="page-highlight">

            <div class="page-highlight__container">
                <div class="leftTopBorder"></div>
                <div class="rightTopBorder"></div>
                <div class="rightBottomBorder"></div>
                <div class="leftBottomBorder"></div>    

                <?php the_field('highlight'); ?>
            </div>
        </div>

        <div class="page-content__container">

            <div class="page-content entry-content">
                <?php the_content(); ?>
            </div>
        </div>

    </div>

    <?php endwhile; ?>


    
        
       
    <?php get_footer(); ?>