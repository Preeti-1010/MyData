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
if(count($params)>2){
	if($params[2]!= ""){
$cancelled_date =  urldecode($params[2]);

}
}

?>
<div class="islemag-content-right col-md-8">
	<div id="primary" class="content-area">
		<div class="info_content"><?php the_field('info_content') ?></div>
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
				<h3>CANCELLED TRAIN DETAILS:</h3>
				<p>Here you can get the details of those Trains which are cancelled or Trains which are not running according to Date due to some circumstances.</p>
				<br>
				<?php if(isset($cancel['response_code'])){ ?>
					<?php if($cancel['response_code'] == 200): ?>
					<h4 style="margin-bottom:5px;"><span class="red-color"><strong>CANCELLED TRAIN LISTS</strong></span></h4>
						<div class="table-responsive">
							<table class="table  table-bordered">
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
										<?php $uname = str_replace(' ','-',$result['name']);?>
										<td><a href="<?php echo site_url('irctc-trains-schedule/'.$uname.'-'.$result['number']);?>" target="_blank"><?php echo $result['number'] ?></a></td>
										<td><a href="<?php echo site_url('irctc-trains-schedule/'.$uname.'-'.$result['number']);?>" target="_blank"><?php echo $result['name'] ?></a></td>
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
					<p class="no-records alert alert-danger">
						<?php echo 'Train details are not found or Server is slow.'; ?>
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
</div>
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