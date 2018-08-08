<?php
/**
 * Template name: Train Cancel
 *
 * @package WordPress
 * @subpackage Islemag
 */
get_header();
$cancelled_date = '';

$params = explode('/',$_SERVER['REQUEST_URI']);
if(count($params)>3){
	if($params[3]!= ""){
$cancelled_date =  urldecode($params[3]);

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
			     <?php if(!empty($cancelled_date)) { ?>
					<?php $cancel = cancelled($cancelled_date);
						//echo "<pre>";print_r($cancel);die; ?>

						<?php if(isset($cancel['response_code'])){ ?>
				<?php if($cancel['response_code'] == 200): ?>
				<h4 style="margin-bottom:5px;"><span class="red-color"><strong>CANCELLED TRAIN LISTS</strong></span></h4>
				
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr class="table-head">
								<th>Train No</th>
								<th>Train Name</th>
								<th>Source</th>
								<th>Destination</th>
								<th>Start Time</th>
								<th>Type</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($cancel['trains'] as $k => $result): ?>
							<tr>
								<td><a href="<?php echo site_url('/irctc-trains-schedule/'.$result['name'].' - '.$result['number']);?>" target="_blank"><?php echo $result['number'] ?></a></td>
								<td><?php echo $result['name'] ?></td>
								<td><?php echo $result['source']['name'].' ('.$result['source']['code'].')' ?></td>
								<td><?php echo $result['dest']['name'].' ('.$result['dest']['code'].')' ?></td>
								<td><?php echo $result['start_time'] ?></td>
								<td><?php echo $result['type'] ?></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<?php else: ?>
					<p class="no-records">
						<span class="alert alert-danger"><?php echo 'Server_Slow_Error'; ?></span>
					</p>
				<?php endif; ?>
				<?php } ?>
						

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