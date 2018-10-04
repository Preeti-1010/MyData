<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package islemag
 */
get_header(); 
	
$train_number =  get_post_meta( get_the_ID(), 'train_number', true );

$train_info = get_post_meta( get_the_ID(), 'train_info', true );
?>
<div class="islemag-content-right col-md-10">
	<div id="primary" class="content-area">
		<?php
		$archive_content_classes = apply_filters( 'islemag_archive_content_classes', array( 'islemag-content-left', 'col-md-9' ) );
		?>
			<div 
			<?php
			if ( ! empty( $archive_content_classes ) ) {
				echo 'class="' . implode( ' ', $archive_content_classes ) . '"'; }
			?>
			>
			<?php
			$olddate =get_the_modified_date("Y-m-d h:i:s");
			$updatedDate = new DateTime($olddate);
			$todaydate = new DateTime();
			$diffdate = $updatedDate->diff($todaydate)->format("%d");

			if($train_info =='' || $diffdate >= 15){
				$schedule = all_train($train_number, get_the_ID());
				//var_dump($schedule);
			} else {
				
				$schedule = json_decode($train_info,true);
			}	
			  if(is_numeric($train_number)) { ?>
					<h3>TRAIN INFORMATION: </h3>
					<p>Here you can catch the Train information with Arrival, Departure, Distance and Day of journey.</p>
					<br>

				<div class="content-section ">
				<?php if(isset($schedule['response_code'])) {?>
				<?php if($schedule['response_code'] == 200): ?>
					<div class="table-responsive">
						<table class="table table-center  table-bordered">
							<thead>
								<tr class="table-head">
									<th>TRAIN NUMBER</th>
									<th>TRAIN NAME</th>
									<th>MON</th>
									<th>TUE</th>
									<th>WED</th>
									<th>THUR</th>
									<th>FRI</th>
									<th>SAT</th>
									<th>SUN</th>
									<th>CLASS</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php echo $schedule['train']['number'] ?></td>
									<td><?php echo $schedule['train']['name'] ?></td>
									<?php foreach($schedule['train']['days'] as $day): ?>
									<td>
										<?php if($day['runs'] == 'Y'): ?>
											<span class="run_icon"><?php echo $day['runs'] ?></span>
										<?php else: ?>
											<span class="close_icon"><?php echo $day['runs'] ?></span>
										<?php endif; ?>
									</td>
									<?php endforeach; ?>
									<td>
										<?php foreach($schedule['train']['classes'] as $class): ?>
											<?php if($class['available'] == 'Y'): ?>
											<span class="class_icon"><?php echo $class['code'] ?></span>
												<?php endif; ?>
										<?php endforeach; ?>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="table-responsive">
						<table class="table  table-bordered">
							<thead>
								<tr class="table-head">
									<th width="60px">S_No</th>
									<th>STN CODE</th>
									<th>STN NAME</th>
									<th>ROUTE NO</th>
									<th>ARRIVAL TIME</th>
									<th>DEPARTURE TIME</th>
									<th>HALT TIME(MINUTES)</th>
									<th>DISTANCE(KM)</th>
									<th>DAY</th>
								</tr>
							</thead>
							<tbody>
								<?php $data = array();?>
								<?php foreach($schedule['route'] as $result): ?>
								
								<?php if(!in_array($result['station']['name'],$data )) { ?>
								<?php $data[] = $result['station']['name'] ?>
								<tr>
									<?php $sname = str_replace(' ','-', $result['station']['name']);?>

									<td><?php echo $result['no'] ?></td>
									<td><a href="<?php echo site_url('trains-arrival-at-stations/'. $sname.'-'.$result['station']['code']).'/2';?>" target="_blank"><?php echo $result['station']['code'] ?></td>
									<td><a href="<?php echo site_url('trains-arrival-at-stations/'. $sname.'-'.$result['station']['code']).'/2';?>" target="_blank"><?php echo $result['station']['name'] ?></td>
									<td><?php //echo $result['route'] ?></td>
									<td><?php echo $result['scharr'] ?></td>
									<td><?php echo $result['schdep'] ?></td>
									<td><?php echo $result['halt'] == -1? "---":$result['halt'].':00' ?></td>
									<td><?php echo $result['distance'] ?></td>
									<td><?php echo $result['day'] ?></td>
								</tr>
								<?php } ?>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				<?php else: ?>
					<p class="no-records alert alert-danger"><?php echo 'Train details are not available or Server is Slow.'; ?></p>
				<?php endif; ?>
				<?php } ?>
				</div>

			 <?php }
			
			else{?>
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
	</div>	
</div>

<div class="islemag-content-left col-md-2">
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
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
