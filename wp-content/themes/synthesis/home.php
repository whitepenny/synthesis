<?php
/*
 Template Name: Home Template
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
        


        <?php $query_args = array(
            'post_type' => 'slide',
            'posts_per_page' => 7
        );
        $custom_query = new WP_Query( $query_args ); ?>

         <?php $counter = $custom_query->post_count; ?>
        

        <div class="slides">
            
            <?php for ($i=1; $i<=$counter; $i++): ?>
            
            <input type="radio" name="slider" class="slide-radio<?php echo $i; ?>" <?php if ($i == 1) {
                echo 'checked';
            } ?> id="slider_<?php echo $i; ?>">
            
            <?php endfor; ?>
            
            
            <div class="next control">
                <?php for ($i=1; $i<=$counter; $i++): ?>
                <label for="slider_<?php echo $i; ?>" class="numb<?php echo $i; ?>"><i class="fa fa-angle-right"></i></label>
                <?php endfor ?>
        
            </div>
            <div class="previous control">
                
                <?php for ($i=1; $i<=$counter; $i++): ?>
                <label for="slider_<?php echo $i; ?>" class="numb<?php echo $i; ?>"><i class="fa fa-angle-left"></i></label>
                <?php endfor ?>

            </div>

            <div class="pagers">
                <?php for ($i=1; $i<=$counter; $i++): ?>
                <div class="pager-box numb<?php echo $i; ?>">
                    <b><?php echo $i; ?></b>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/pager-box.svg" alt="">
                    <i><?php echo $counter; ?></i>
                </div>
                <?php endfor ?>
                
            </div>

            
            <?php $slide_count = 1; ?>
            <?php
             if ( $custom_query->have_posts() ) :
                 while ( $custom_query->have_posts() ) :
                     $custom_query->the_post(); 
                 
                
                 ?>


            <?php $thumb = get_field('image'); ?>

            <div class="slide slide<?php echo $slide_count; ?> <?php the_field('style'); ?>"

            <?php if(get_field('style') == 'slide-default'): ?> 
            style="background-image: url('<?php echo $thumb['url']; ?>');"
            
            <?php else: ?>
            style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/back2.png');"
            <?php endif; ?>

            >

           
                <div class="slide__content">
                    <h1><?php the_field('heading'); ?></h1>
                    
                    <div class="excerpt-content">
                        <?php the_field('mobile_content'); ?>
                    </div>

                    <div class="content">
                    <?php the_field('content'); ?>
                    </div>
                </div>

                <?php if(get_field('style') == 'slide-left'): ?>
                <img class="right-hanger" src="<?php echo $thumb['url']; ?>" alt="">
                <?php endif; ?>

                <?php if(get_field('style') == 'slide-right'): ?>
                <img class="left-hanger" src="<?php echo $thumb['url']; ?>" alt="" >
                <?php endif; ?>
            </div>

            <?php $slide_count++; ?>

            <?php endwhile; ?>
        <?php endif; 


        wp_reset_postdata();

        ?>

            
        </div>
        
       
<?php get_footer(); ?>