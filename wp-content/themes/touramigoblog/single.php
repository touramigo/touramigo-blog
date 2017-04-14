<?php get_header(); ?>


   <section class="banner banner_article h-full">
<?php
$thumb_id = get_post_thumbnail_id();
$thumb_url = wp_get_attachment_image_src($thumb_id,'blog', true);

?>
        <i class="banner__bg" style="background: url('<?php echo $thumb_url[0];?>') no-repeat center;"></i>

        <div class="banner-center">
            <div class="content box">

<?php $term_list = wp_get_post_terms(get_the_ID(), array('category'), array("fields" => "ids")) ?>
                <a href="<?php  echo get_category_link($term_list[0]); ?>" class="banner__link"><?php  echo get_cat_name($term_list[0]); ?></a>
                <h1 class="banner__title">
                  <?php the_title(); ?> 
                </h1>

            </div><!--content-->

        </div><!--main-block-center-->

        <div class="next-block scroll-btn" data-href=".page">
            <span>Read article</span>
            <i class="icon icon-next"></i>
        </div><!--next-block-->

    </section><!--main-block-->

    <section class="page content ">
        <div class="clear-fix pb-112">
            <div class="page-left">
                <article class="article">
                  <?php if (have_posts()) : ?>
 
<?php while (have_posts()) : the_post(); ?>
<?php the_content(); ?> 
 <?php endwhile; ?>  
<?php else : ?>
<?php endif; ?>
                </article>

            </div><!--page-left-->

            <aside class="aside">

<?php
$terms = wp_get_post_terms(get_the_ID(), 'post_tag',  array("fields" => "all" ));
if($terms) {

?>
                <div class="tags">
                    <h3 class="tags__title">BLOG TAGS</h3>

                    <div class="tags-list">

	<?php  foreach( $terms as $term ){ ?>
		
<a href="<?php echo get_term_link( $term ); ?>" class="tag"><?php echo $term->name; ?></a>

	<?php } ?>


                        
                    </div><!--tags-list-->

                </div><!--tags-->
<?php } ?>
<?php 

$posts = get_field('popular_posts/related_articles');

if( $posts ): ?>
                <div class="popular-post">
                    <h3 class="popular-post__title">Popular posts</h3>

                    <div class="articles-list">


  
    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>

                        <article class="article-preview article-preview_small">
                            <a href="<?php the_permalink(); ?>">
                                <span class="a-p-photo">


<?php
$thumb_id2 = get_post_thumbnail_id();
$thumb_url2 = wp_get_attachment_image_src($thumb_id2,'popular', true);

?>
  <?php if($thumb_url2[0]) {?>
                                    <img src="<?php echo $thumb_url2[0];?>" alt="">
<?php } ?>
                                </span><!--a-p-photo-->

                                <span class="a-p__title">
                                 <?php the_title(); ?>
                                </span>

                            </a>
<?php $cat2 = get_the_category(); $cat2 = $cat2[0]; ?>
                            <a href="<?php  echo get_category_link($cat2->cat_ID); ?>" class="a-p__type"><?php  echo get_cat_name($cat2->cat_ID); ?></a>

                        </article>
   <?php endforeach; ?>
                     

                    </div><!--articles-list-->

                </div><!--trending-->
   <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>

            </aside>

        </div><!--clear-fix-->

        <div class="comments">
            <div class="content">

<?php /* disqus_embed(get_field('disqus_code', option)); */ ?>




               <!--     <p class="comments__fix">Disqus Comments</p> -->
            </div><!--content-->

        </div><!--comments-->

        <div class="api">
            <div class="content">


               <!-- <p class="api__fix">API TOURS</p> -->
            </div><!--content-->

        </div><!--comments-->



   </section><!--page-->




 <?php if(get_field('country_code')) { ?>
    <div class="tours">

	
<?php  
$countrycode = get_field('country_code');

  $countrycode =   str_replace (' ','+',$countrycode);

$json = file_get_contents('https://touramigo.com/search-tours/top?whereTo='.$countrycode); 

$sh = json_decode($json,true);
  
 
foreach ($sh as $s) { ?>



        <div class="tour clear-fix">
            <div class="tour-slider">
<?php  if($s['duration']) { ?>
                <p class="tours__time"><?php  echo $s['duration']; ?> days</p>
<?php } ?>
                <ul class="tour-slides">
                    <li>
                        <img src="<?php  echo $s['primaryImageUrl']; ?>" alt="">
                    </li>
                
                </ul>
<!--
                <div class="tour-slider-control">
                    <a href="#" class="tour-slider-control__link active" data-slide-index="0"></a>
                    <a href="#" class="tour-slider-control__link" data-slide-index="1"></a>
                    <a href="#" class="tour-slider-control__link" data-slide-index="2"></a>
                </div> --> <!--tour-slider-control-->
<!--
                <span class="tour-slider__prev"></span>
                <span class="tour-slider__next"></span>
-->
            </div><!--tour-slider-->

            <div class="tour-right">
                <h3 class="tour__title">
                  <?php  echo $s['title']; ?>
                </h3>

                <ul class="tour-params">
<?php  if($s['countries']) { ?>
                    <li class="tour-param">
<?php $counter=0; foreach ($s['countries'] as $s2) { ?>
<?php $counter++; } ?>
                        <span class="tour-param__alias"><?php echo $counter; ?> Countries Visited:</span>
                        <span class="tour-param__desc">
<?php $counter2=1; foreach ($s['countries'] as $s2) { ?>
                            <?php  echo $s2; ?><?php  if($counter2 == $counter) { ?><?php } else { ?>,<?php }  ?>
<?php $counter2++; } ?>
                        </span>
                    </li>
<?php } ?>

<?php  if($s['startCity']) { ?>
                    <li class="tour-param">
                        <span class="tour-param__alias">Start:</span>
                        <span class="tour-param__desc">
                            <?php  echo $s['startCity']; ?>
                        </span>
                    </li>
<?php } ?>
<?php  if($s['finishCity']) { ?>
                    <li class="tour-param">
                        <span class="tour-param__alias">Finish:</span>
                        <span class="tour-param__desc">
                            <?php  echo $s['finishCity']; ?>
                        </span>
                    </li>
<?php } ?>

                </ul>
<?php  if($s['tourOperatorLogoUrl']) { ?>
                <img src="<?php  echo $s['tourOperatorLogoUrl']; ?>" alt="<?php  echo $s['tourOperatorCode']; ?>" class="tour__operator">
<?php } ?>
<?php  if($s['price']) { ?>
                <p class="tour-price">
                    <span class="tour-price__title">Price From:</span>
                    <span class="tour-price__desc">
                        $<?php  echo $s['price']; ?> <em><?php  echo $s['currency']; ?></em>
                    </span>
                </p>
<?php } ?>
                <div class="tour-bottom">
                    <a target="_blank" href="<?php  echo $s['tourPageUrl']; ?>" class="tour__view-btn">view full itinerary</a>
                    <a  target="_blank" href="<?php  echo $s['tourBookingUrl']; ?>" class="tour__book-btn">book now</a>
                    <a  target="_blank" href="<?php  echo $s['tourCompareUrl']; ?>" class="purple-btn tour__compare-btn">compare tour</a>
                </div><!--tour-bottom-->

            </div><!--tour-right-->

        </div><!--tour-->

<?php   } ?>
  
    </div><!--tours-->
<?php } ?>



<section class="page page_no-pt pb-80 content">




<?php 

$posts = get_field('popular_posts/related_articles');

if( $posts ): ?>



        <h2 class="articles-list__title pt-116">RELATED ARTICLES</h2>

        <div class="articles-list">

    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>
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


<?php $term_list = wp_get_post_terms(get_the_ID(), array('category'), array("fields" => "ids")) ?>
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

     <?php endforeach; ?>

        </div><!--articles-list-->
   <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>
    </section><!--page-->
<?php get_footer(); ?>
