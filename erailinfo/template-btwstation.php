<?php
/**
 * Template name: Station Between
 *
 * @package WordPress
 * @subpackage Islemag
 */
get_header();

$source_code = '';
$dest_code = '' ;
$doj = '';

$params = explode('/',$_SERVER['REQUEST_URI']);

if(count($params)>2){
	if($params[2]!= ""){	
		$source = urldecode($params[2]);
		$arr = explode('-', $source);
		$source_code = end($arr);
		
		$dest = urldecode($params[3]);
		$arr = explode('-', $dest);
		$dest_code = end($arr);

		$doj = $params[4];
	}
}
//echo $source_code. $dest_code. $doj;
?>
<div class="islemag-content-right col-md-8">
	<div id="primary" class="content-area">
		<div class="info_content"><?php the_field('info_content') ?></div>
		<div class="row">
		<?php $archive_content_classes = apply_filters( 'islemag_archive_content_classes', array( 'islemag-content', 'col-md-12' ) ); ?>
			<div
			<?php
			if ( ! empty( $archive_content_classes ) ) {
				echo 'class="' . implode( ' ', $archive_content_classes ) . '"';
			}
			?>
			>	
		     <?php if($source_code && $dest_code && $doj !== 'null') { ?>
			 <?php $btwstn = train_between_stations($source_code, $dest_code, $doj);
						//echo "<pre>";print_r($btwstn);?>
			<h3>RESERVED TRAIN BETWEEN STATIONS:</h3>
			<p>You can find all Indian train between two stations with time table, distance, availability and train name & number. </p>
			<br>

			<?php if(isset($btwstn['response_code'])) {?>
				<div class="content-section">
					<?php if($btwstn['response_code'] == 200): ?>
					<p class="class-info">
						<strong>Check route information click on train number. </strong>
						<br /><br />
						<!-- <strong>(If server responding slow of seat availability )</strong> -->
					</p>
					<div class="clearfix"></div>
						<div class="table-responsive">
							<table class="table  table-bordered">
								<thead>
									<tr class="table-head">
										<th>Train_No</th>
										<th>Train_Name</th>
										<th>From</th>
										<th>Dep</th>
										<th>To</th>
										<th>Arr</th>
										<th>Travel_Time</th>
										<th>M</th>
										<th>T</th>
										<th>W</th>
										<th>Th</th>
										<th>F</th>
										<th>S</th>
										<th>Su</th>
										
									</tr>
								</thead>
								<tbody>
									<?php $sortedclass = array('1A','2A','3A','SL','CC','2S','3E','FC'); ?>
									<?php foreach($btwstn['trains'] as $k => $result): ?>
									<tr>
										<?php $uname = str_replace(' ','-',$result['name']);?> 
										<td><a href="<?php echo site_url('irctc-trains-schedule/'.$uname.'-'.$result['number']);?>" target="_blank" id="<?php echo $result['number'] ?>" class="trainNumber"><?php echo $result['number'] ?></a></td>
										<td><a href="<?php echo site_url('irctc-trains-schedule/'.$uname.'-'.$result['number']);?>" target="_blank" id="<?php echo $result['name'] ?>" class="trainName"><?php echo $result['name'] ?></a></td>
										<td><?php echo $result['from_station']['code'] ?></td>
										<td><?php echo $result['src_departure_time']; ?></td>
										<td><?php echo $result['to_station']['code']; ?></td>
										<td><?php echo $result['dest_arrival_time'] ?></td>
										<td><?php echo $result['travel_time'] ?></td>
										<?php foreach($result['days'] as $day): ?>
											<?php if($day['runs'] == 'Y'): ?>
												<td><span class="run_icon"><?php echo 'Y' ?></span></td>
											<?php else: ?>
												<td><span class="close_icon"><?php echo 'N' ?></span></td>
											<?php endif; ?>
										<?php endforeach; ?>
										
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
							<?php else: ?>
							<p class="no-records alert alert-danger"><?php echo 'Data do not found or Server Response is slow'; ?></p>
							<?php endif; ?>
						</div>
				</div>	
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
		</div>
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