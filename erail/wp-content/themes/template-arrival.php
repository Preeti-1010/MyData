<?php
/**
 * Template name: Train Arrival
 *
 * @package WordPress
 * @subpackage Islemag
 */
get_header();

$station_code = '';
$hours = '';

$params = explode('/',$_SERVER['REQUEST_URI']);
if(count($params)>3){
	if($params[3]!= ""){
		$station = urldecode($params[3]);
		$arr = explode('-', $station);
		$station_code = end($arr);

		$hours = $params[4];
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
			     <?php if($station_code == true) { ?>
					<?php $arrival = trains_arrival($station_code,$hours);
						//echo "<pre>";print_r($arrival);die; ?>

					<?php if(isset($arrival['response_code'])) { ?>			
					<?php if($arrival['response_code'] == 200): ?>
					<h4><span class="red-color"><strong>Trains Arriving in next : <?php echo $hours; ?> Hours</strong></span></h4>
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr class="table-head">
									<th>S_No</th>
									<th>Train No.</th>
									<th>Train Name</th>
									<th>Schedule Arrival</th>
									<th>Schedule Departure</th>
									<th>Actual Arrival</th>
									<th>Actual Departure</th>
									<th>Delay Arrival</th>
									<th>Delay Departure</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($arrival['trains'] as $k => $result): ?>
								<tr>
									<!-- <?php $url = str_replace(' ','',$result['name']).'+-+'.str_replace(' ', '',$result['number']);?> -->
									<td><?php echo $k + 1 ?></td>
									<td><a href="<?php echo site_url('/irctc-trains-schedule/'.$result['name'].' - '.$result['number']);?>" target="_blank"><?php echo $result['number'] ?></a></td>
									<td><?php echo $result['name'] ?></td>
									<td><?php echo $result['scharr'] ?></td>
									<td><?php echo $result['schdep'] ?></td>
									<td><?php echo $result['actarr'] ?></td>
									<td><?php echo $result['actdep'] ?></td>
									<td><?php echo $result['delayarr'] ?></td>
									<td><?php echo $result['delaydep'] ?></td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
					<?php else: ?>
						<p class="no-records"><?php echo 'Server Slow Error'; ?></p>
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