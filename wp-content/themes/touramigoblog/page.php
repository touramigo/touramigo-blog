<?php get_header(); ?>


 <section class="page search content pb-80">
        

        <h1 class="page__title"><?php the_title(); ?></h1>

     
   <div class="articles-list">
  <?php


 if (have_posts()) : ?>
<?php


 while (have_posts()) : the_post(); ?>
       
<?php endwhile; ?> 


<article class="article">
  <?php if (have_posts()) : ?>
 
<?php while (have_posts()) : the_post(); ?>
<?php the_content(); ?> 
 <?php endwhile; ?>  
<?php else : ?>
<?php endif; ?>

</article>

<?php else : ?>
<?php endif; ?> 



  </div><!--articles-list-->


      
    </section><!--page-->
<?php get_footer(); ?>