<?php /* Template name: Careers */ ?>
<?php get_header(); ?>

<!-- Start of Breadcrumbs  section
	============================================= -->
	<section id="ori-breadcrumbs" class="ori-breadcrumbs-section position-relative" data-background="assets/img/bg/bread-bg.png">
		<div class="container">
			<div class="ori-breadcrumb-content text-center ul-li">
				<h1><?php the_title();?></h1>
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

<!-- Start of Mission Accordion  section
	============================================= -->
	<section id="ori-mission" class="ori-mission-section position-relative">
		<div class="container">
			<div class="ori-mission-content">
				<div class="row">
					<div class="col-lg-6">
						<div class="ori-mission-title-text">
							<div class="ori-inner-section-title">
								<span class="sub-title text-uppercase">TEG</span>
								<h2>Careers</h2>
								<p>La TEG, suntem mereu în căutarea de talente pasionate și dedicate pentru a ne extinde echipa. Dacă ești în căutarea unei oportunități de a-ți dezvolta cariera într-un mediu dinamic și inovativ, ești în locul potrivit. Scrie-ne pentru mai multe înformații.</p>
							</div>
							<div class="ori-btn-1 text-uppercase">
								<a href="/contact">GET IN TOUCH</a>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="ori-mission-accordion position-relative">
							<div class="accordion" id="accordionExample">
									<?php
									$accordionCounter = 1;
										if( have_rows('careers_sidebar_repeater') ):
											while( have_rows('careers_sidebar_repeater') ) : the_row();
												$stepTitle = get_sub_field('title');
												$stepContent = get_sub_field('content');
												echo "
											<div class='accordion-item'>
												<h2 class='accordion-header' id='heading$accordionCounter'>
													<button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#collapse$accordionCounter' aria-expanded='false' aria-controls='collapse$accordionCounter'>
														$stepTitle
													</button>
												</h2>
												<div id='collapse$accordionCounter' class='accordion-collapse collapse' aria-labelledby='heading$accordionCounter' data-bs-parent='#accordionExample'>
													<div class='accordion-body'>
													 $stepContent
													</div>
												</div>
											</div>												
											";
											$accordionCounter++;
											endwhile;


										else :

										endif;
									?>
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
<!-- End of Mission Accordion  section
	============================================= -->




<?php get_footer(); ?>