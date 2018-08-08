<?php
/**
 * Template name: Seat Availability
 *
 * @package WordPress
 * @subpackage Islemag
 */
get_header();


$train_number = '';
$doj = '';
$seat_class ='';
$source_code ='';
$dest_code = '';
$quota = '';


$params = explode('/',$_SERVER['REQUEST_URI']);
if(count($params)>3){
	if($params[3]!= ""){
	$train = urldecode($params[3]);
	$arr = explode(' - ',$train);
	$train_number = end($arr);

	/*$stn = 
	$arr = explode('-',$stn);*/
	$source_code = $params[4];

	$qu = urldecode($params[5]);
	$arr = explode('-',$qu);
	$quota = end($arr);

	$seat = urldecode($params[6]);
	$arr = explode('-',$seat);
	$seat_class = end($arr);
	/*$dest =  
	$arr = explode('-',$dest);*/
	$dest_code = $params[7];
	$doj = $params[8];
	}
}

?>

<style type="text/css">
	#gform_wrapper_7{
		display: block!important;
	}
</style>

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
					<?php $seat = seat_availability($train_number, $seat_class, $source_code, $dest_code, $quota, $doj);

					//echo "<pre>";print_r($seat);die(); ?>
					
					
			<?php if(isset($seat['response_code'] )) {?>
			<?php if($seat['response_code'] == 200): ?>
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr class="table-head">
							<th>Train No</th>
							<th>Train Name</th>
							<th>Source Station</th>
							<th>Destination Station</th>
							<th>Quota</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?php echo $seat['train']['number'] ?></td>
							<td><?php echo $seat['train']['name'] ?></td>
						<td><?php echo $seat['from_station']['name'] ?></td>
							<td><?php echo $seat['to_station']['name'] ?></td>
							<td><?php echo $seat['quota']['name'] ?></td>
						</tr>
					</tbody>
				</table>
			</div>
			<?php if(!empty($seat['availability'])): ?>
				<h4><span class="red-color"><?php echo $seat['journey_class']['name'].' ('.$seat['journey_class']['code'].')' ?></span></h4>
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr class="table-head">
								<th width="60px">S.No.</th>
								<th>Date: (DD-MM-YYYY)</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($seat['availability'] as $k => $result): ?>
							<tr>
								<td><?php echo $k + 1 ?></td>
								<td><?php echo $result['date'] ?></td>
								<td><?php echo $result['status'] ?></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<?php endif; ?>
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
		<script type="text/javascript">
		(adsbygoogle = window.adsbygoogle || []).push({});

		</script>
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>