<?php
/**
 * Frontpage
 *
 * @package WordPress
 * @subpackage Islemag.
 */

get_header();?>

	<div class="container">		
		<div class="row">
			<div class="col-md-9">
				<section class="content-header">
					<h2>Welcome to Indian Railway Passenger Enquiry Portal
					</h2>
					<br>
				</section>
					<section class="content">
						<div class="row">
								<div class="col-md-6 p-r-o">
									<div class="panel panel-default">
									<div class="box box-primary ">
										<div class="box-header with-border">
										
												<div class="panel-heading"><h2 class="box-title">Train Between Stations</h2></div>
												<div class="panel-body">
												<?php echo do_shortcode('[gravityform id="1" title="false" description="false"]'); ?>
												</div>
												<div class="clearfix"></div>
										</div>
									</div>
								</div>
								</div>
								<!-- Railway Running Train Status -->
								<div class="col-md-6">
									<div class="panel panel-default">
									<div class="box box-primary ">
										<div class="box-header with-border">						
												<div class="panel-heading"><h2 class="box-title">Indian Railway Running Train Status</h2></div>
												<div class="panel-body">
												<?php echo do_shortcode('[gravityform id="3" title="false" description="false"]'); ?></div>
												<div class="clearfix"></div>
										</div>
									</div>
									</div>
								</div>
								<div class="clearfix"></div>
								<!-- Indian Railway PNR Enquiry -->
								<div class="col-md-6">
									<div class="panel panel-default">
										<div class="box box-primary ">
											<div class="box-header with-border">
												<div class="panel-heading"><h2 class="box-title">Indian Railway PNR Enquiry</h2></div>
												<div class="panel-body">
												<?php echo do_shortcode('[gravityform id="2" title="false" description="false"]'); ?></div>
											<div class="clearfix"></div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="box box-primary ">
										<div class="box-header with-border">
											<h2 class="box-title">Indian Railways Online Reservation</h2>
											<br>
											<div class="col-md-6 col-sm-6 col-xs-6" style="text-align: center;">
												<p><a href="<?php echo site_url('/indian-railways-news/');?>" title="Latest Railway Information" class="btn btn-primary">Latest Information</a></p>
											</div>
											<div class="col-md-6 col-sm-6 col-xs-6" style="text-align: center;">
												<p><a href="https://irctc.co.in/" title="Online Reservation" target="_blank" class="btn btn-success">Online Reservation</a></p>
											</div>
										</div>
									</div>
								</div>
								<!-- Railway Running Train Status -->
								<div class="clearfix"></div>
							<div class="col-md-12">
								<!-- eraininfo-new-top-banner-home-right -->
								<ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-7503304934637797" data-ad-slot="3711853841" data-ad-format="link">		
								</ins>
								<script>
								(adsbygoogle = window.adsbygoogle || []).push({});
								</script>
								<br>
							</div>
								<div class="clearfix"></div>
							<div class="col-md-12">
										<div class="box box-primary ">
											<div class="box-header with-border">
													<!-- <div class="container">	
													<div class="row"> -->		
													<?php
														while ( have_posts() ) :
															the_post();
													?>
															<?php get_template_part( 'template-parts/content', 'page' ); ?>
														<?php
														endwhile; // End of the loop.
														?>
											</div>
										</div>
							</div>
										<div class="clearfix"></div>
							<div class="col-md-12">
											<div class="box box-primary ">
											<div class="box-header with-border"><h4>Latest News Indian Railway</h4>	

										<?php $the_query = new WP_Query( 'posts_per_page=5' ); ?>
										 

										<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
										 

										<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
										 

										<?php the_excerpt(__('(more…)')); ?>
										 

										<?php 
										endwhile;
										wp_reset_postdata();
										?>
										

											</div>
											</div>				
							</div>
										<div class="clearfix"></div>
							<div class="col-md-12">
												<!-- eraininfo-new-home-middle -->
											<ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-7503304934637797" data-ad-slot="4920035875" data-ad-format="auto"></ins>
											<script>
											(adsbygoogle = window.adsbygoogle || []).push({});
											</script>					<br>
							</div>
						</div>
					</section>
		    </div>

			<div class="col-md-3">
						<br>
					<!-- eraininfo-new-home-sidebar-right-top -->
					<ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-7503304934637797" data-ad-slot="6409617069" data-ad-format="auto">					
					</ins>
					<script>
					(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
					<div class="mobile-static" style="text-align: center; max-height: 55px;">
					<!-- eraininfo-new-top-menu -->
					<ins class="adsbygoogle" style="display:inline-block;width:320px;height:50px" data-ad-client="ca-pub-7503304934637797" data-ad-slot="5544039170">	
					</ins>
					<script>
					(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
					</div>		

				<?php
				dynamic_sidebar('contact');
				?>						
								
			</div>

				<div class="clearfix"></div>

				<div class="category-section">
					<div class="col-md-3 col-sm-4 col-xs-6">
						<a href="/erailinfo/live-train-pnr-status/">
						<div class="category">
							<img src="" class="hidden-lg hidden-md hidden-sm" alt="PNR Status">
							<img src="/erailinfo/wp-content/uploads/2018/06/train-ticket-blue.png" class="hidden-xs" alt="PNR Status">
							<p>PNR Status</p>
						</div>
						</a>
					</div>	
					<div class="col-md-3 col-sm-4 col-xs-6">
						<a href="./erailinfo/live-train-status/	">
						<div class="category">
							<img src="" class="hidden-lg hidden-md hidden-sm" alt="Running train status">
							<img src="/erailinfo/wp-content/uploads/2018/06/running-status-blue.png" class="hidden-xs" alt="Running train status">
							<p>Running train status</p>
						</div>
						</a>
					</div>	
					<div class="col-md-3 col-sm-4 col-xs-6">
						<a href="/erailinfo/trains-between-stations/">
						<div class="category">
							<img src="" class="hidden-lg hidden-md hidden-sm" alt="Train Between Stations">
							<img src="/erailinfo/wp-content/uploads/2018/06/distance-blue.png" class="hidden-xs" alt="Train Between Stations">
							<p>Train Between Stations</p>
						</div>
						</a>
					</div>
					<div class="col-md-3 col-sm-4 col-xs-6">
						<a href="/erailinfo/seat-availability/">
						<div class="category">
							<img src="" class="seat-icon hidden-lg hidden-md hidden-sm" alt="Seat Availability">
							<img src="/erailinfo/wp-content/uploads/2018/06/seating-blue.png" class="seat-icon hidden-xs" alt="Seat Availability">
							<p>Seat Availability</p>
						</div>
						</a>
					</div>	
					<div class="col-md-3 col-sm-4 col-xs-6">
						<a href="/erailinfo/rescheduled-trains/">
						<div class="category">
							<img src="" class="resch-icon hidden-lg hidden-md hidden-sm" alt="Rescheduled Trains">
							<img src="/erailinfo/wp-content/uploads/2018/06/resch-blue.png" class="resch-icon hidden-xs" alt="Rescheduled Trains">
							<p>Rescheduled Trains</p>
						</div>
						</a>
					</div>	
					<div class="col-md-3 col-sm-4 col-xs-6">
						<a href="/erailinfo/cancelled-trains/">
						<div class="category">
							<img src="" class="hidden-lg hidden-md hidden-sm" alt="Cancelled Trains">
							<img src="/erailinfo/wp-content/uploads/2018/06/cancel-event-blue.png" class="hidden-xs" alt="Cancelled Trains">
							<p>Cancelled Trains</p>
						</div>
						</a>
					</div>	
	
					<div class="col-md-3 col-sm-4 col-xs-6">
						<a href="/erailinfo/irctc-trains-schedule/">
						<div class="category">
							<img src="" class="hidden-lg hidden-md hidden-sm" alt="Train Schedule">
							<img src="/erailinfo/wp-content/uploads/2018/06/train-route-blue.png" class="hidden-xs" alt="Train Schedule">
							<p>Train Schedule</p>
						</div>
						</a>
					</div>	
					<div class="col-md-3 col-sm-4 col-xs-6">
						<a href="/erailinfo/train-fare-enquiry/">
						<div class="category">
							<img src="" class="hidden-lg hidden-md hidden-sm" alt="Train Fare Enquiry">
							<img src="/erailinfo/wp-content/uploads/2018/06/fare-enquiry-blue.png" class="hidden-xs" alt="Train Fare Enquiry">
							<p>Train Fare Enquiry</p>
						</div>
						</a>
					</div>
					<div class="col-md-3 col-sm-4 col-xs-6">
						<a href="/erailinfo/indian-train-information/">
						<div class="category">
							<img src="" class="hidden-lg hidden-md hidden-sm" alt="Train Name/Number">
							<img src="/erailinfo/wp-content/uploads/2018/06/train-name-blue.png" class="hidden-xs" alt="Train Name/Number">
							<p>Train Name/Number</p>
						</div>
						</a>
					</div>	
		
					<div class="col-md-3 col-sm-4 col-xs-6">
						<a href="/erailinfo/trains-arrival-at-stations/">
						<div class="category">
							<img src="" class="hidden-lg hidden-md hidden-sm" alt="Trains Arrival at Station">
							<img src="/erailinfo/wp-content/uploads/2018/06/metro-blue.png" class="hidden-xs" alt="Trains Arrival at Station">
							<p>Trains Arrival at Station</p>
						</div>
						</a>
					</div>	
					<div class="clearfix"></div>				
				</div>
		
		</div>
	</div>
		
<?php
get_footer();?>