<?php get_header(); ?>

   <section class="banner banner_dest">
<?php if(get_field('category_images', 'categorys_'.get_queried_object()->term_id)) { ?>

<?php $image = wp_get_attachment_image_src(get_field('category_images', 'categorys_'.get_queried_object()->term_id), 'cat'); ?>

 <i class="banner__bg" style="background: url('<?php echo $image[0]; ?>') no-repeat center;"></i>

<?php } else { ?>
        <i class="banner__bg" style="background: url('<?php bloginfo('template_url'); ?>/images/banner/banner-2.jpg') no-repeat center;"></i>

<?php } ?>
        <div class="content">
            <div class="banner-center">
                <a href="<?php echo home_url( '/' ); ?>" class="banner__link">Home</a>
                <h1 class="banner__title banner__title_sm">
                  <?php single_cat_title(); ?>
                </h1>

            </div><!--main-block-center-->

        </div><!--content-->

    </section><!--main-block-->

    <section class="page content pb-80">



     




<h2 class="articles-list__title articles-list__title_dest">ARTICLES ON TOUR</h2>



        <div class="articles-list">
<?php if (have_posts()) : ?>
 
<?php while (have_posts()) : the_post(); ?>
       <article class="article-preview article-preview_big">
                <a href="<?php the_permalink(); ?>" class="a-p-photo">
                 <?php
$thumb_id3 = get_post_thumbnail_id();
$thumb_url3 = wp_get_attachment_image_src($thumb_id3,'related', true);

?>
  <?php if($thumb_url3[0]) {?>
                                    <img src="<?php echo $thumb_url3[0];?>" alt="">
<?php } ?>
                    <i class="a-p-photo__shadow a-p-photo__shadow_big"></i>
                    <span class="a-p-photo__signature">By <?php the_author(); ?></span>
                </a><!--a-p-photo-->

                <div class="a-p-bottom">

<?php $term_list = wp_get_post_terms(get_the_ID(), 'category', array("fields" => "ids")) ?>
                            <a href="<?php  echo get_category_link($term_list[0]); ?>" class="a-p__type"><?php  echo get_cat_name($term_list[0]); ?></a>
                  

                    <a href="<?php the_permalink(); ?>">
                        <span class="a-p-top">
<?php if(get_field('mins_reading')) { ?>
                            <span class="a-p__reading"><?php the_field('mins_reading'); ?> <?php the_field('mins_reading_text'); ?></span>
<?php } ?>
                            <span class="a-p__time"> <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' AGO'; ?></span>
                        </span><!--a-p-top-->

                        <span class="a-p__title">
                        <?php the_title(); ?>
                        </span>

                    </a>

                </div><!--a-p-bottom-->

            </article>
<?php endwhile; ?>  
<?php else : ?>
<?php endif; ?> 



<?php if (  $wp_query->max_num_pages > 1 ) { 

$query_vars = serialize($wp_query->query_vars); 
$query_vars = base64_encode($query_vars);

?>
	<script id="true_loadmore">

	var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
	var true_posts = "<?php echo $query_vars; ?>";
	var current_page = "<?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>";
	</script>
<?php } ?>


        </div><!--articles-list-->

    </section><!--page-->
<?php get_footer(); ?>