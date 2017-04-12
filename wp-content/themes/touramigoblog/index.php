<?php get_header(); ?>
<?php 

$posts = get_field('header_block', option);

if( $posts ): ?>
 <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>
   <section class="banner">
   <?php
$thumb_id = get_post_thumbnail_id();
$thumb_url = wp_get_attachment_image_src($thumb_id,'home', true);

?>
  <?php if($thumb_url[0]) {?>
                                
        <i class="banner__bg" style="background: url('<?php echo $thumb_url[0];?>') no-repeat center;"></i>
<?php } ?>
        <div class="content">
            <div class="banner-center">

<?php $term_list = wp_get_post_terms(get_the_ID(), array('category'), array("fields" => "ids")) ?>
                <a href="<?php  echo get_category_link($term_list[0]); ?>" class="banner__link"><?php  echo get_cat_name($term_list[0]); ?></a>
                <h1 class="banner__title">
                    <a href="<?php the_permalink(); ?>" class="bd-block">
                        <i class="border-top-right"></i>
                        <i class="border-bottom-left"></i>
                <?php the_title(); ?>
                    </a>
                </h1>

            </div><!--main-block-center-->

        </div><!--content-->

    </section><!--banner-->

     <?php endforeach; ?>
   <?php wp_reset_postdata();  ?>
<?php endif; ?>
    <section class="page content">
        <div class="articles-list">
<?php 

$posts = get_field('two_post_under_header', option);

if( $posts ): ?>
 <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>
            <article class="article-preview article-preview_big">
                <a href="<?php the_permalink(); ?>" class="a-p-photo">
   <?php
$thumb_id = get_post_thumbnail_id();
$thumb_url = wp_get_attachment_image_src($thumb_id,'related', true);

?>
  <?php if($thumb_url[0]) {?>
                                
        

                    <img src="<?php echo $thumb_url[0];?>" alt="">
<?php } ?>
                    <i class="a-p-photo__shadow a-p-photo__shadow_big"></i>
                    <span class="a-p-photo__signature">By <?php the_author(); ?></span>
                </a><!--a-p-photo-->

                <div class="a-p-bottom">

<?php $term_list = wp_get_post_terms(get_the_ID(), array('category'), array("fields" => "ids")) ?>
                    <a href="<?php  echo get_category_link($term_list[0]); ?>" class="a-p__type"><?php  echo get_cat_name($term_list[0]); ?></a>

                    <a href="<?php the_permalink(); ?>">
                        <span class="a-p-top">
                            <span class="a-p__reading"><?php the_field('mins_reading'); ?> <?php the_field('mins_reading_text'); ?></span>
                            <span class="a-p__time"><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' AGO'; ?></span>
                        </span><!--a-p-top-->

                        <span class="a-p__title">
                         <?php the_title(); ?>
                        </span>

                    </a>

                </div><!--a-p-bottom-->

            </article>

    <?php endforeach; ?>
   <?php wp_reset_postdata();  ?>
<?php endif; ?>

        </div><!--articles-list-->

        <div class="clear-fix pt-95">
            <div class="left-block left-block_no-tablet prt-4">
                <div class="trending">
                    <h3 class="trending__title">TRENDING</h3>

                    <div class="articles-list">

<?php 

$posts = get_field('trending', option);

if( $posts ): ?>
 <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>
                        <article class="article-preview article-preview_small">
                            <a href="<?php the_permalink(); ?>">
                                <span class="a-p-photo">
                                     <?php
$thumb_id = get_post_thumbnail_id();
$thumb_url = wp_get_attachment_image_src($thumb_id,'popular', true);

?>
  <?php if($thumb_url[0]) {?>
                                
        

                    <img src="<?php echo $thumb_url[0];?>" alt="">
<?php } ?>
                                </span><!--a-p-photo-->

                                <span class="a-p__title">
                                 <?php the_title(); ?>
                                </span>

                            </a>

                        
<?php $term_list = wp_get_post_terms(get_the_ID(), array('category'), array("fields" => "ids")) ?>
                    <a href="<?php  echo get_category_link($term_list[0]); ?>" class="a-p__type"><?php  echo get_cat_name($term_list[0]); ?></a>

                        </article>

<?php endforeach; ?>
<?php wp_reset_postdata();  ?>
<?php endif; ?>

                    </div><!--articles-list-->

                </div><!--trending-->

            </div><!--left-block-->

            <div class="right-block">
                <form class="subscribe validate" action="//touramigo.us15.list-manage.com/subscribe/post?u=ec465085aa92acf1fa8221481&amp;id=d890b24a6d" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank" novalidate>
                    <span class="subscribe__title">SIGN UP TO OUR NEWSLETTER</span>
                    <div class="subscribe-right">
                        <input type="email" name="EMAIL" class="subscribe__field" id="mce-EMAIL" placeholder="example@gmail.com">
                        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_ec465085aa92acf1fa8221481_d890b24a6d" tabindex="-1" value=""></div>
                        <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="purple-btn button subscribe__btn">
                    </div><!--subscribe-right-->

                </form>

                <div class="articles-list spacer">


<?php 

$posts = get_field('two_post_under_subscribe', option);

if( $posts ): ?>
 <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>


                    <article class="article-preview article-preview_middle">
                        <a href="<?php the_permalink(); ?>" class="a-p-photo">
                                                          <?php
$thumb_id = get_post_thumbnail_id();
$thumb_url = wp_get_attachment_image_src($thumb_id,'home2', true);

?>
  <?php if($thumb_url[0]) {?>
                                
        

                    <img src="<?php echo $thumb_url[0];?>" alt="">
<?php } ?>
                        </a><!--a-p-photo-->

                        <div class="a-p-bottom">
                   <?php $term_list = wp_get_post_terms(get_the_ID(), array('category'), array("fields" => "ids")) ?>
                    <a href="<?php  echo get_category_link($term_list[0]); ?>" class="a-p__type"><?php  echo get_cat_name($term_list[0]); ?></a>


                            <a href="<?php the_permalink(); ?>">
                                <span class="a-p__title">
                                   <?php the_title(); ?>
                                </span>

                            </a>

                        </div><!--a-p-bottom-->

                    </article>

   
<?php endforeach; ?>
<?php wp_reset_postdata();  ?>
<?php endif; ?>

                </div><!--articles-list-->

            </div><!--right-block-->

        </div><!--clear-fix-->

        <div class="clear-fix pt-66">
            <div class="left-block">
                <div class="articles-list">



<?php 

$posts = get_field('2_posts_under_trending', option);

if( $posts ): ?>
 <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>


                    <article class="article-preview article-preview_middle-in">
                        <a href="<?php the_permalink(); ?>">
                            <span class="a-p-photo">
                                                         <?php
$thumb_id = get_post_thumbnail_id();
$thumb_url = wp_get_attachment_image_src($thumb_id,'home2', true);

?>
  <?php if($thumb_url[0]) {?>
                                
        

                    <img src="<?php echo $thumb_url[0];?>" alt="">
<?php } ?>
                                <i class="a-p-photo__shadow a-p-photo__shadow_middle"></i>
                            </span><!--a-p-photo-->
                        </a>

                        <div class="a-p-bottom">
                               <?php $term_list = wp_get_post_terms(get_the_ID(), array('category'), array("fields" => "ids")) ?>
                    <a href="<?php  echo get_category_link($term_list[0]); ?>" class="a-p__type"><?php  echo get_cat_name($term_list[0]); ?></a>

                            <a href="<?php the_permalink(); ?>" class="a-p__title">
                <?php the_title(); ?>
                            </a>

                        </div><!--a-p-bottom-->

                    </article>

<?php endforeach; ?>
<?php wp_reset_postdata();  ?>
<?php endif; ?>

                </div><!--articles-list-->

            </div><!--left-block-->

            <div class="right-block">


<?php 

$posts = get_field('big_image_post', option);

if( $posts ): ?>
 <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>


                <article class="article-preview article-preview_large">
                    <a href="<?php the_permalink(); ?>">
                        <span class="a-p-photo">
 <?php
$thumb_id = get_post_thumbnail_id();
$thumb_url = wp_get_attachment_image_src($thumb_id,'home3', true);

?>
  <?php if($thumb_url[0]) {?>
                                
        

                    <img src="<?php echo $thumb_url[0];?>" alt="">
<?php } ?>
                                <i class="a-p-photo__shadow a-p-photo__shadow_large"></i>
                        </span><!--a-p-photo-->
                    </a>

                    <div class="a-p-bottom">
                                     <?php $term_list = wp_get_post_terms(get_the_ID(), array('category'), array("fields" => "ids")) ?>
                    <a href="<?php  echo get_category_link($term_list[0]); ?>" class="a-p__type"><?php  echo get_cat_name($term_list[0]); ?></a>

                        <a href="<?php the_permalink(); ?>" class="a-p__title">
                        <?php the_title(); ?>
                        </a>

                    </div><!--a-p-bottom-->

                </article>
<?php endforeach; ?>
<?php wp_reset_postdata();  ?>
<?php endif; ?>
            </div><!--right-block-->

        </div><!--clear-fix-->

        <div class="articles-list pt-75">

<?php 

$posts = get_field('3_posts_above_footer', option);

if( $posts ): ?>
 <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>
            <article class="article-preview article-preview_middle article-preview_middle_sm">
                <a href="<?php the_permalink(); ?>" class="a-p-photo">
        <?php
$thumb_id = get_post_thumbnail_id();
$thumb_url = wp_get_attachment_image_src($thumb_id,'home2', true);

?>
  <?php if($thumb_url[0]) {?>
                                
        

                    <img src="<?php echo $thumb_url[0];?>" alt="">
<?php } ?>
                </a><!--a-p-photo-->

                <div class="a-p-bottom">
               <?php $term_list = wp_get_post_terms(get_the_ID(), array('category'), array("fields" => "ids")) ?>
                    <a href="<?php  echo get_category_link($term_list[0]); ?>" class="a-p__type"><?php  echo get_cat_name($term_list[0]); ?></a>


                    <a href="<?php the_permalink(); ?>">
                        <span class="a-p__title">
                          <?php the_title(); ?>
                        </span>

                    </a>

                </div><!--a-p-bottom-->

            </article>

<?php endforeach; ?>
<?php wp_reset_postdata();  ?>
<?php endif; ?>

            <div class="trending trending_tablet">
                <h3 class="trending__title">TRENDING</h3>

                <div class="articles-list">
<?php 

$posts = get_field('trending', option);

if( $posts ): ?>
 <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
                    <article class="article-preview article-preview_small">
                        <a href="<?php the_permalink(); ?>">
                                <span class="a-p-photo">
                                <?php
$thumb_id = get_post_thumbnail_id();
$thumb_url = wp_get_attachment_image_src($thumb_id,'popular', true);

?>
  <?php if($thumb_url[0]) {?>
                                
        

                    <img src="<?php echo $thumb_url[0];?>" alt="">
<?php } ?>
                                </span><!--a-p-photo-->

                                <span class="a-p__title">
                                 <?php the_title(); ?>
                                </span>

                        </a>

                       
<?php $term_list = wp_get_post_terms(get_the_ID(), array('category'), array("fields" => "ids")) ?>
                    <a href="<?php  echo get_category_link($term_list[0]); ?>" class="a-p__type"><?php  echo get_cat_name($term_list[0]); ?></a>
                    </article>

<?php endforeach; ?>
<?php wp_reset_postdata();  ?>
<?php endif; ?>
                </div><!--articles-list-->

            </div><!--trending-->

        </div><!--articles-list-->

    </section><!--page-->
<?php get_footer(); ?>