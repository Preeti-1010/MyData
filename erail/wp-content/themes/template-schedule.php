<?php
/**
 * Template name: Train Schedule
 *
 * @package WordPress
 * @subpackage Islemag
 */
get_header();

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
			     <?php if(is_numeric($train_number)) { ?>
					<?php $schedule = train_schedule($train_number);
					//echo "<pre>";print_r($print_schedule); ?>
					

					<div class="content-section ">
					<?php if(isset($schedule['response_code'])) {?>
					<?php if($schedule['response_code'] == 200): ?>
					<div class="table-responsive">
						<table class="table table-center">
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
												<span class="class_icon"></span>
											<?php endif; ?>
										<?php endforeach; ?>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr class="table-head">
									<th width="60px">S_No</th>
									<th>STN CODE</th>
									<th>STN NAME</th>
									<th>ROUTE NO</th>
									<th>ARRIVAL TIME</th>
									<th>DEPARTURE TIME</th>
									<th>HALF TIME(MINUTES)</th>
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
									<td><?php echo $result['no'] ?></td>
									<td><?php echo $result['station']['code'] ?></td>
									<td><?php echo $result['station']['name'] ?></td>
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
						<p class="no-records"><?php echo 'server_slow_error'; ?></p>
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