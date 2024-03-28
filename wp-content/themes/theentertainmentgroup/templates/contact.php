<?php /* Template name: Contact */ ?>
<?php get_header(); ?>
<!-- Start of Breadcrumbs  section
	============================================= -->
	<section id="ori-breadcrumbs" class="ori-breadcrumbs-section position-relative" data-background="assets/img/bg/bread-bg.png">
		<div class="container">
			<div class="ori-breadcrumb-content text-center ul-li">
				<h1>Contact</h1>
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
<!-- Start of Contact form  section
	============================================= -->
	<section id="ori-contact-form" class="ori-contact-form-section position-relative">
		<div class="container">
			<div class="ori-contact-form-content">
				<div class="row">
					<div class="col-lg-6">
						<div class="ori-contact-form-text-info pera-content">
							<h3>Contactează-ne</h3>
							<p>Curabitur vitae nunc sed velit dignissim sodales. Urna neque viverra justo nec. In cursus massa tincidunt ut ornare the butter leo integer.</p>
							<div class="ori-contact-form-item-info">
								<div class="ori-contact-info d-flex align-items-center">
									<div class="info-icon d-flex align-items-center justify-content-center">
										<i class="fas fa-phone-alt"></i>
									</div>
									<div class="info-text pera-content">
										<h4>Phone</h4>
										<p><a href="tel:+40767850052">+40 767 850 052</a></p>
									</div>
								</div>
								<div class="ori-contact-info d-flex align-items-center">
									<div class="info-icon d-flex align-items-center justify-content-center">
										<i class="fas fa-envelope"></i>
									</div>
									<div class="info-text pera-content">
										<h4>Email</h4>
										<p>hello@teg.ro</p>
									</div>
								</div>
								<div class="ori-contact-info d-flex align-items-center">
									<div class="info-icon d-flex align-items-center justify-content-center">
										<i class="fas fa-map-marker-alt"></i>
									</div>
									<div class="info-text pera-content">
										<h4>Location</h4>
										<p>Timișoara</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="ori-contact-form-wrap">
                             <?php echo do_shortcode('[forminator_form id="167"]'); ?>
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
<!-- End of Contact Form section
	============================================= -->	
    <script>
    jQuery( document ).ready(function() {
     jQuery('.ori-submit-btn1').removeClass('forminator-button');
     jQuery('.ori-contact-form-wrap input').removeClass('forminator-input');
     jQuery('.ori-contact-form-wrap textarea').removeClass('forminator-textarea');
     jQuery('.ori-contact-form-wrap label').removeClass('forminator-label');
});
</script>		

    <?php get_footer(); ?>