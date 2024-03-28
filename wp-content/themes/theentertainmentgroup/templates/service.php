<?php /* Template name: Services */ ?>

<?php get_header(); ?>

<!-- Start of Breadcrumbs  section
	============================================= -->
	<section id="ori-breadcrumbs" class="ori-breadcrumbs-section position-relative" data-background="assets/img/bg/bread-bg.png">
		<div class="container">
			<div class="ori-breadcrumb-content text-center ul-li">
				<h1><?php the_title() ?></h1>
			</div>
		</div>
		<div class="line_animation">
			<div class="line_area"></div>
			<div class="line_area"></div>
			<div class="line_area"></div>
			<div class="line_area"></div>
			<div class="line_area"></div>
			<div class="line_area"></div>
			<div class="line_area"></div>
			<div class="line_area"></div>
		</div>
	</section>	
<!-- End of Breadcrumbs section
	============================================= -->

<!-- Start of Service Details  section
	============================================= -->
	<section id="ori-service-details" class="ori-service-details-section position-relative">
		<div class="container">
			<div class="ori-service-details-content-wrapper">
				<div class="row">
					<div class="col-lg-8">
						<div class="ori-service-details-content">
							<div class="ori-about-play-area position-relative">
                            <div class="ori-blog-img">
									<?php 
									$postImage = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
									?>
									<img src="<?php echo $postImage[0] ?>" alt="">
								</div>
							</div>
							<div class="ori-service-details-text pera-content">
                                <?php the_content(); ?>
							</div>
						</div>
                        <div class="ori-recent-portfolio-area">
							<?php 										
							// global $post;
                            $categoryName = strtolower(basename(get_permalink()));
							$relatedProjects = get_posts(array('post_type' => 'service', 'numberposts' => -1,  'category_name' => $categoryName, 'post_status'=>'publish', 'order'=>'DESC' ));
							if ($relatedProjects) :
							?>
								<h3>Proiecte aferente</h3>
							<?php endif; ?>
								<div class="ori-recent-portfolio-item-area">
									<div class="row">
									<?php
										foreach($relatedProjects as $post) :
										setup_postdata($post);
										$relatedProjectImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full');
										?>
										<div class="col-md-6">
											<a href="<?php echo get_the_permalink($post->ID);?>" class="ori-portfolio-item position-relative">
												<div class="portfolio-img">
													<img src="<?php echo $relatedProjectImage[0] ?>" alt="">
												</div>
												<div class="portfolio-text">
													<span class="port-category text-uppercase"><?php echo $categoryName ?></span>
													<h3><?php the_title(); ?></h3>
												</div>
										</a>
										</div>
										<?php endforeach; ?>
										<?php wp_reset_query(); ?>
									</div>
								</div>
							</div>
					</div>
					<div class="col-lg-4">
						<div class="ori-service-details-sidebar-widget-area">
							<div class="ori-service-details-widget ul-li-block">
								<div class="category-widget">
									<h3 class="widget-title">Servicii</h3>
                                    <ul>
                                    <?php
                                        $activePostID = get_the_ID($post->ID);
                                        global $post;
                                        $counter = 1;
                                        if( have_rows('services_sidebar_menu', 'options') ):
                                        
                                            while( have_rows('services_sidebar_menu', 'options') ) : the_row();
                                                $servicePage = get_sub_field('service_page');
                                                $class = '';
                                                if ($activePostID == $servicePage->ID) {
                                                    $class = 'activeService';
                                                } else {
                                                    $class = '';
                                                };
                                                $servicesURL = get_the_permalink($servicePage->ID);
                                                if($servicePage->post_name == "rentals") {
                                                    $servicesURL = "https://shop." . $_SERVER['SERVER_NAME'];
                                                }
                                                $servicesTitle = get_the_title($servicePage->ID);
                                                $serviceNumber = sprintf("%02d", $counter);
                                                echo '<li class="servicesSidebarListItem"><a class="'. $class .'" href="'. $servicesURL .'"><span>'. $serviceNumber .'</span>'. $servicesTitle .'</a></li>   
                                                ';
                                                $counter++;
                                            endwhile;
                                        
                                        else :
                                        endif;


										?>
									</ul>
								</div>
							</div>
                            <div class="ori-service-details-widget ul-li-block">
								<div class="quote-widget">
									<h3 class="widget-title">Trimite mesaj</h3>
									<?php echo do_shortcode('[forminator_form id="133"]'); ?>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="line_animation">
			<div class="line_area"></div>
			<div class="line_area"></div>
			<div class="line_area"></div>
			<div class="line_area"></div>
			<div class="line_area"></div>
			<div class="line_area"></div>
			<div class="line_area"></div>
			<div class="line_area"></div>
		</div>
	</section>
<!-- End of Service Details  section
	============================================= -->	
<script>
    jQuery( document ).ready(function() {
     jQuery('.ori-submit-btn1').removeClass('forminator-button');
     jQuery('.quote-widget input').removeClass('forminator-input');
     jQuery('.quote-widget label').removeClass('forminator-label');
     jQuery('.quote-widget textarea').removeClass('forminator-textarea');
});
</script>
    
<?php get_footer(); ?>