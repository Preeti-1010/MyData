<?php
/**
 * Template name: Train Fare
 *
 * @package WordPress
 * @subpackage Islemag
 */
get_header();

$train_number = '';
$doj = '';
$seat_class ='';
$src ='';
$dest = '';
$quota = '';

$params = explode('/',$_SERVER['REQUEST_URI']);
if(count($params)>3){
	if($params[3]!= ""){
	$train = urldecode($params[3]);
	$arr = explode(' - ',$train);
	$train_number = end($arr);

	/*$stn = 
	$arr = explode('-',$stn);*/
	$src = $params[4];
	$qu =  urldecode($params[5]);
	$arr = explode('-',$qu);
	$quota = end($arr);

	$seat = urldecode($params[6]);
	$arr = explode('-',$seat);
	$seat_class = end($arr);

	$ag = urldecode($params[7]);
	$arr = explode('-',$ag);
	$age = end($arr);

	/*$dest =  ;
	$arr = explode('-',$dest);*/
	$dest = $params[8];
	
	$doj = $params[9];
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
					<?php 
					$fare = train_fare_enquiry($train_number,$src,$dest,$age,$quota,$doj,$seat_class);
					//echo "<pre>";print_r($fare);die; ?>
					
					<div class="">
	<?php if(isset($fare['response_code'])){?>
<?php if($fare['response_code'] == 200): ?>
<div class="table-responsive">
	<table class="table">
		<thead>
			<tr class="table-head">
				<th>Train No.</th>
				<th>Train Name</th>
				<th>Date(DD-MM-YYYY)</th>
				<th>Source Station</th>
				<th>Destination Station</th>
				<th>Quota Code</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $fare['train']['number'] ?></td>
				<td><?php echo $fare['train']['name'] ?></td>
				<td><?php echo $doj ?></td>
				<td><?php echo $fare['from_station']['name'] ?></td>
				<td><?php echo $fare['to_station']['name'] ?></td>
				<td><?php echo $fare['quota']['name'] ?></td>
			</tr>
		</tbody>
	</table>
</div>
<div class="table-responsive">
	<table class="table">
		<thead>
			<tr class="table-head">
				<th width="60px">S.No</th>
				<th>Class Code</th>
				<th>Class Name</th>
				<th>Fare</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo 1 ?></td>
				<td><?php echo $fare['journey_class']['code'] ?></td>
				<td><?php echo $fare['journey_class']['name'] ?></td>
				<td><?php  echo 'Rs. '.$fare['fare'] ?></td>
			</tr>
		</tbody>
	</table>
</div>
<?php else: ?>
	<div>
		<p class="no-records"><?php echo 'Server Slow Error';?></p>
	</div>
<?php endif; ?>
<?php }?>
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