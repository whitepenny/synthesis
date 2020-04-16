<?php get_header(); ?>

    <?php while(have_posts()) : the_post(); ?>

    <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>

    <div class="page-container">

        <div class="member-content__container">

            <div class="member-content single-member-content">
                <div class="single-member-image">
                    <img src="<?php echo $thumb['0']; ?>" alt="">
                    <?php if (get_field('email') || get_field('linkedin')): ?>
                    <div class="single-member-details">
                        <?php if(get_field('email')): ?>
                        <a href="mailto:<?php the_field('email') ?>"><i class="fa fa-envelope"></i></a>
                        <?php endif; ?>
                        
                        <?php if(get_field('linkedin')): ?>
                        <a target="_blank" href="<?php the_field('linkedin') ?>"><i class="fa fa-linkedin"></i></a>
                        <?php endif; ?>
                    </div>
                    <?php endif ?>
                </div>

                <div class="entry-content">
                    <h1><?php the_title(); ?></h1>
                    <h2><?php the_field('title'); ?></h2>
                    <?php the_content(); ?>
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

       

    </div>

    <?php endwhile; ?>


    
        
       
    <?php get_footer(); ?>