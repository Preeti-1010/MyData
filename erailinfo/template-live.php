<?php
/**
 * Template name: Live Status
 *
 * @package WordPress
 * @subpackage Islemag
 */
get_header();
$train_number = '';
$doj = '';
$params = explode('/',$_SERVER['REQUEST_URI']);
if(count($params)>2){
	if($params[2]!= ""){
		$train = urldecode($params[2]);
		$arr = explode('-', $train);
		$train_number = end($arr);
		
		if($params[3] == true){
			$doj = $params[3];
		}
		else{
			$curr_date = date('d-m-Y');
			$doj = $curr_date;
		}
	}
}
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
			  <?php if(is_numeric($train_number)) { ?>
				<?php $live = running_status($train_number,$doj);
						//echo "<pre>";print_r($live);die(); ?>
				<h3>RUNNING TRAIN STATUS: </h3>
				<p>Live train running status for Indian railway trains means the exact location of any train and its real time delay status. It may also include the estimated arrival of the train at any particular station en-route. Status running train updates change frequently. So it is recommended that the user check the status updates frequently.
				</p>
				<br>

				<?php if(isset($live['response_code'])){?>
					<?php if($live['response_code'] == 200): ?>
					<h4><span class="red-color"><?php echo $live['train']['name'].' ('.$live['train']['number'].')' ?></span></h4>
					<p><strong> Running Train Status </strong><?php echo $live['train']['name'].' ('.$live['train']['number'].')' ?>&nbsp;for <strong> Enquiry </strong>.</p>
					<p class="current-position"><?php echo $live['position'] ?>&nbsp;&nbsp;<span id="down-Arrow"><i class="fa fa-arrow-down"></i></span></p>
						<div class="table-responsive">
							<table class="table  table-bordered">
								<thead>
									<tr class="table-head">
										<th>Station</th>
										<th>Sch_Arr</th>
										<th>Sch_Dep</th>
										<th>Eeta_Ata</th>
										<th>Etd_Atd</th>
										<th>Distance</th>
										<th>Day</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($live['route'] as $result): ?>
									<tr>
										<td width="210px"><?php echo $result['station']['name'].' ('.$result['station']['code'].')' ?></td>
										<td><?php echo $result['scharr'] ?></td>
										<td><?php echo $result['schdep'] ?></td>
										<td><?php echo $result['actarr'] ?></td>
										<td><?php echo $result['actdep'] ?></td>
										<td><?php echo $result['distance'] ?></td>
										<td><?php echo ($result['day'] + 1) ?></td>
										<td width="150px">
											<?php 
											if($result['has_arrived'] && ( ! $result['has_departed'])){
												echo '<span class="arrived">Arrived</span> / ';
											}
											else if($result['has_departed']){
												echo '<span class="departed">Departed</span> / ';
											}
											if($result['latemin'] != 0){
												echo '<span class="latemin">'.$result['status'].'</span>';
											}
											else {
												echo '<span class="departed">No Delay</span>';
											}
											?>
										</td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
						<?php elseif($live['response_code'] == 510): ?>
							<p class="alert alert-warning"><?php echo $live['error']; ?></p>
						<?php else: ?>
							<p class="no-records alert alert-danger"><?php echo "Train do not run on this day or Server is Slow"; ?></p>
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