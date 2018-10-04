<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package islemag
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="panel panel-default">
	<!-- <header class="entry-header"> --><div class="panel-heading">
		<?php the_title( '<h2 class="box-title">', '</h1>' ); ?>
	<!-- </header> --></div><!-- .entry-header -->
	<div class="panel-body">
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'islemag' ),
					'after'  => '</div>',
				)
			);
		?>
	</div><!-- .entry-content -->
</div>
</div>
	<?php
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', 'islemag' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<footer class="entry-footer"><span class="edit-link">',
			'</span></footer>'
		);
	?>

</article><!-- #post-## -->

