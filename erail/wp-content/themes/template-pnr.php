<?php
/**
 * Template name: PNR Status
 *
 * @package WordPress
 * @subpackage Islemag
 */
get_header();
/*$pnrnumber = '';*/
$pnrnumber = basename($_SERVER['REQUEST_URI']);
/*if(!empty($_GET)){

	$pnrnumber = $_GET['pnr'];
}*/
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
			     <?php if(is_numeric($pnrnumber)){?>
					<?php $print_result = pnr_status($pnrnumber);
					//echo "<pre>";print_r($print_result); ?>
						 
					<?php if($print_result['response_code'] == 200): ?>
				   <main id="main" class="site-main pnrresult" role="main">
					
					<h5><span class="red-color"><?php echo 'PNR No.'.' : '.$print_result['pnr'] ?></span></h5>
			
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr class="table-head">								
									<th>Passenger</th>
									<th>BOOKING STATUS</th>
									<th>CURRENT STATUS</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($print_result['passengers'] as $passenger): ?>
								<tr>
									<td><?php echo $passenger['no'] ?></td>
									<td><?php echo $passenger['booking_status'] ?></td>
									<td><?php echo $passenger['current_status'] ?></td>
								</tr>
								<?php endforeach; ?>
								<tr>
								<?php foreach($print_result['passengers'] as $passenger): ?>
									<td style="font-weight:bold"><?php echo 'PNR Status';?></td>
									 <td colspan="2"><?php if($print_result['chart_prepared'] == 'Y')
									 {
									 	echo $print_result['chart_prepared'];
									 }
									 else echo 'Chart Not Prepared' ?>
									 	
									 </td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
					<?php else: ?>
						<p class="no-records"><?php echo 'Server Slow Error'; ?></p>
					<?php endif; ?>
					
					<h2 class="">Frequently Asked Questions </h2>
					<div class="">
						<div><b>What time BNC Suvidha SPL depart from Bhubaneswar Railway Station?</b></div>
						<span>BNC Suvidha SPL(08451) departs from <a href="/trains/bhubaneswar-railway-station-bbs/">Bhubaneswar Railway Station</a> at 22:50.</span>
						<div><b>How much time BNC Suvidha SPL take to reach Krishnarajapuram Railway Station?</b></div>
						<span> BNC Suvidha SPL reach on day 1 to <a href="/trains/krishnarajapuram-railway-station-kjm/">Krishnarajapuram Railway Station</a>. The arrival time of BNC Suvidha SPL at Krishnarajapuram Railway Station is 23:00.</span>
						<div><b>Distance covered by BNC Suvidha SPL?</b></div>
						<span>BNC Suvidha SPL covers 1520 km to reach Krishnarajapuram Railway Station. BNC Suvidha SPL passes through 10 stations.</span>
					</div>
				</main>

			<!-- <?php //endif;?> -->
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