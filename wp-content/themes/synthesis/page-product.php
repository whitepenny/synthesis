
<?php
/*
 Template Name: page product
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

    <div class="page-header">
        <img src="<?php echo $thumb['0']; ?>" alt="" />

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
    <?php
    $product_logo_image = get_field('product_logo_image');
    $product_boxes = get_field('product_boxes');
    if(!empty($product_logo_image)){
    ?>
    <div class="blue-section">
        <div class="blue-section__container">
            <img src="<?php echo $product_logo_image['url']; ?>" alt="<?php echo $product_logo_image['alt']; ?>" />
        </div>
    </div>
<?php } ?>
    <?php if(!empty($product_boxes)){ ?>
    <div class="white-section">
      <div class="white-section__container">
        <?php foreach ($product_boxes as $box){ ?>
        <div class="box-wrap">
          <div class="inner-wrap">
            <?php if(!empty($box['product_box_image'])){ ?>
            <div class="img-wrap">
                <img src="<?php echo $box['product_box_image']['url'] ?>" alt="<?php echo $box['product_box_image']['alt'] ?>" />
            </div>
            <?php } ?>
            <h2><?php echo $box['main_title'] ?></h2>

            <div class="text-wrap">
              <h3><?php echo $box['first_sub_title'] ?></h3>
              <p><?php echo $box['first_text'] ?></p>
            </div>

            <div class="text-wrap">
              <h3><?php echo $box['second_sub_title'] ?></h3>
              <p><?php echo $box['second_text'] ?></p>
            </div>
          </div>
        </div>
<?php } ?>




      </div>
    </div>
  <?php } ?>

<?php endwhile; ?>





<?php get_footer(); ?>
