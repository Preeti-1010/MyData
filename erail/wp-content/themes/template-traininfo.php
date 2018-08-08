<?php
/**
 * Template name: Train Info
 *
 * @package WordPress
 * @subpackage Islemag
 */
get_header();

//$train = basename($_SERVER['REQUEST_URI']);
$train_number = '';

$params = explode('/',$_SERVER['REQUEST_URI']);
if(count($params)>3){
	if($params[3]!= ""){
	$train = urldecode($params[3]);
	$arr = explode(' - ', $train);
	$train_number = end($arr);
}
}


?>

	<div id="primary" class="content-area">
		<?php $archive_content_classes = apply_filters( 'islemag_archive_content_classes', array( 'islemag-content', 'col-md-12' ) ); ?>
		<div 
		<?php
		if ( ! empty( $archive_content_classes ) ) {
			echo 'class="' . implode( ' ', $archive_content_classes ) . '"';
		}
		?>
		>
			     <?php

			      if(is_numeric($train_number)) { ?>
					<?php $info = train_information($train_number);
						//echo "<pre>";print_r($live);die(); ?>

					<div class="content-section ">
						<?php if(isset($info['response_code'])) { ?>
						<?php if($info['response_code'] == 200): ?>
						<div class="table-responsive">
							<table class="table table-center">
								<thead>
									<tr class="table-head">
										<th>Train No</th>
										<th>Train Name</th>
										<th>Mon</th>
										<th>Tue</th>
										<th>Wed</th>
										<th>Thu</th>
										<th>Fri</th>
										<th>Sat</th>
										<th>Sun</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><?php echo $info['train']['number'] ?></td>
										<td><?php echo $info['train']['name'] ?></td>
										<?php foreach($info['train']['days'] as $day): ?>
										<td>
											<?php if($day['runs'] == 'Y'): ?>
												<span class="run_icon"><?php echo $day['runs'] ?></span>
											<?php else: ?>
												<span class="close_icon"><?php echo $day['runs'] ?></span>
											<?php endif; ?>
										</td>
										<?php endforeach; ?>
									</tr>
								</tbody>
							</table>
						</div>
						<?php else: ?>
							<p class="no-records"><?php echo 'Server_slow_error'; ?></p>
						<?php endif; ?>
						<?php } ?>
					</div>

			     <?php }else{?>
			<main id="main" class="site-main" role="main">

				<?php
				while ( have_posts() ) :
					the_post();
?>

					<?php get_template_part( 'template-parts/content', 'page' ); ?>

					<?php
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

				<?php
				endwhile; // End of the loop.
				?>

			</main><!-- #main -->
			<?php }?>
		</div><!-- #primary -->
	</div><!-- #primary -->
	<div class="islemag-content-left col-md-4">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- fb-erail2 -->
		<ins class="adsbygoogle"
		     style="display:block"
		     data-ad-client="ca-pub-7503304934637797"
		     data-ad-slot="3314518194"
		     data-ad-format="auto"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>