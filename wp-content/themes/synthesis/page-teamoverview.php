<?php
/*
 Template Name: Team Overview
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

    <div class="page-container">

    <?php while(have_posts()) : the_post(); ?>

    <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>



        <div class="member-content__container">

            <div class="member-content member-overview-content">
                <div class="entry-content">
                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                </div>

            </div>
        </div>

    <?php endwhile; ?>


        <?php $query_args = array(
            'post_type' => 'member',
            'posts_per_page' => -1
        );
        $custom_query = new WP_Query( $query_args ); ?>

        
        

        <div class="leadership">
            
            <?php
             if ( $custom_query->have_posts() ) :
                 while ( $custom_query->have_posts() ) :
                     $custom_query->the_post(); 

                // Pagination fix
                $temp_query = $wp_query;
                $wp_query   = NULL;
                $wp_query   = $custom_query;
                 
                $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); 
                
            ?>

                <?php if(get_field('team_type') == 'principal'): ?>
                    
                    <div class="member">
                        <img src="<?php echo $thumb['0']; ?>" alt="">

                        <div class="member-details">
                            <div>
                                <h2><?php the_title(); ?></h2>
                                <h3><?php the_field('title'); ?></h3>

                                <a href="<?php the_permalink(); ?>" class="btn-primary">Learn More</a>
                            </div>
                        </div>
                    </div>

                    
                <?php endif; ?>

                <?php endwhile; ?>
            <?php endif; ?>

        </div>



        <div class="team">
            
            <header>
            <h1>Psychologists & Coaches</h1>
            </header>

            <div class="team-grid">
                
                <?php
                 if ( $custom_query->have_posts() ) :
                     while ( $custom_query->have_posts() ) :
                         $custom_query->the_post(); 

                    // Pagination fix
                    $temp_query = $wp_query;
                    $wp_query   = NULL;
                    $wp_query   = $custom_query;
                    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
                    
                ?>

                    <?php if(get_field('team_type') == 'coach'): ?>
                        <div class="member">
                            <img src="<?php echo $thumb['0']; ?>" alt="">

                            <div class="member-details">
                                <div>
                                    <h2><?php the_title(); ?></h2>
                                    <h3><?php the_field('title'); ?></h3>

                                    <a href="<?php the_permalink(); ?>" class="btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>                


            </div>


        </div>
        


       

    </div>


    
        
       
    <?php get_footer(); ?>