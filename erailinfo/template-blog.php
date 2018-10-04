<?php
/**
 * Template name: Blog
 *
 * @package WordPress
 * @subpackage Islemag
 */
get_header();?>	

<div class="col-md-12">
	<?php

       if ( get_query_var('paged') )

       $paged = get_query_var('paged');

       elseif ( get_query_var('page') )

       $paged = get_query_var('page');

       else
       $paged = 1;
       $args = array(

       'post_type' => 'post',

       'paged' => $paged

         );
       query_posts($args);
      ?>

<?php if (function_exists("wp_pagenavi")) { wp_pagenavi(); } ?>
<?php if (have_posts()) : $count = 0; ?>
<?php while (have_posts()) : the_post(); $count++; global $post; ?>
        <div class="single-blog">
            <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'site5framework' ); ?> <?php the_title(); ?>">
            <?php the_title(); ?>
            </a></h3>
        	<?php the_excerpt(); ?>   
        	<a href="<?php echo esc_url( get_the_permalink( $post->ID ) ); ?>" target="_blank">Read More</a> 
        </div>
        <hr>
            <?php endwhile; ?>
            <?php if (function_exists("wp_pagenavi")) { wp_pagenavi(); } ?>
            <?php else : ?>
        <article id="post-not-found">
              <header>
                <h1>
                  <?php _e("No Posts Yet", "site5framework"); ?>
                </h1>
              </header>
              <section class="post_content">
                <p>
                  <?php _e("Sorry, What you were looking for is not here.", "site5framework"); ?>
                </p>
              </section>
        </article>
            <?php endif; ?>
            <?php
			       ?> 
            <!-- <a href="https://www.erailinfo.in/home/news/1/artesyn-enters-indian-rail-market.html">read more...</a> -->
</div><br>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
