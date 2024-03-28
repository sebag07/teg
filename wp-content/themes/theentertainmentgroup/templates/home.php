<?php /* Template name: Home */ ?>
<?php get_header(); ?>

<!-- Start of Slider section
	============================================= -->
<section id="ori-slider-1" class="ori-slider-section-1 position-relative">
    <div class="ori-slider-content-wrapper-1 postion-relative">
        <?php echo do_shortcode('[rev_slider alias="ai-particle-cluster1"][/rev_slider]') ?>
    </div>
</section>
<!-- End of Slider section
	============================================= -->

<!-- Start of Sponsor section
	============================================= -->
<section id="ori-sponsor-1" class="ori-sponsor-section-1 position-relative">
    <div class="container">
        <div class="ori-sponsor-title text-uppercase text-center">
            <h3><i></i> <span>Trusted by</span> <i></i> </h3>
        </div>
        <div class="ori-sponsor-content">
            <div class="row">
            <?php 
            $homepageLogoGallery = get_field('trusted_by_logos');
            $delay = 100;
            $size = 'full'; // (thumbnail, medium, large, full or custom size)
            if( $homepageLogoGallery ): ?>
                    <?php foreach( $homepageLogoGallery as $image_id ): 
                        $homepageLogo = wp_get_attachment_image( $image_id, $size );
                        echo '<div class="col-lg-2 col-md-3 col-sm-4 col-6 homepageLogo wow fadeInUp" data-wow-delay="' . $delay .'ms" data-wow-duration="1000ms">';
                        echo $homepageLogo;
                        echo '</div>';
                        $delay += 100;
                    endforeach; ?>
            <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- End of Sponsor section
	============================================= -->

<!-- Start of Service section
	============================================= -->
<section id="ori-service-1" class="ori-service-section-1">
    <div class="ori-service-wrapper-1">
        <div class="container">
            <div class="ori-service-top-content-1 d-flex justify-content-between align-items-center">
                <div class="ori-section-title-1 text-uppercase wow fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <h2>TEG <span> Servicii</span></h2>
                </div>
<!--                <div class="ori-btn-1 text-uppercase wow fadeInRight" data-wow-delay="300ms" data-wow-duration="1500ms">-->
<!--                    <a href="service.html">Toate serviciile</a>-->
<!--                </div>-->
            </div>
            <div class="ori-service-content-1">
                <div class="row">
                <?php

                    // Check rows exists.
                    if( have_rows('service_repeater') ):

                        // Loop through rows.
                        while( have_rows('service_repeater') ) : the_row();

                            // Load sub field value.
                            $serviceContent = get_sub_field('service_type_content');
                            $servicePost = get_sub_field('service_type_title'); ?>
                            <?php if( $servicePost ): ?>
                                <?php // override $post
                                $post = $servicePost;
                                setup_postdata( $post );
                                $serviceURL = get_the_permalink();
                                if($post->post_name == "rentals"){
                                    $serviceURL = "https://shop." . $_SERVER['SERVER_NAME'];
                                }
                                $serviceImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full');
                                ?>
                    <div class="ori-service-why-choose wow fadeInUp" data-wow-delay="400ms" data-wow-duration="1500ms">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="ori-service-why-choose-img">
                                    <a href="<?php echo $serviceURL; ?>"><img src="<?php echo $serviceImage[0] ?>" alt=""></a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="ori-service-why-choose-text">
                                    <div class="ori-inner-section-title">
                                        <h2><a href="<?php echo $serviceURL; ?>"><?php the_title() ?></a></h2>
                                    </div>
                                    <div class="ori-service-why-choose-list-item ul-li-block">
                                        <?php echo $serviceContent ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                                <?php wp_reset_postdata();
                             endif;
                            // Do something, but make sure you escape the value if outputting directly...
                        // End loop.
                        endwhile;

                    // No value.
                    else :
                        // Do something...
                    endif;
                    ?>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of Service section
	============================================= -->

<!-- Start of Project section
	============================================= -->
<section id="ori-project-1" class="ori-project-section-1 position-relative">
    <div class="container">
        <div class="ori-project-content-1 position-relative">
            <div class="row">
                <div class="col-lg-4">
                    <div class="ori-project-tab-btn-content">
                        <div class="ori-section-title-1 text-uppercase wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <h2>Proiecte <span> finalizate</span></h2>
                        </div>
                        <div class="ori-project-tab-btn ul-li-block text-uppercase wow fadeInUp" data-wow-delay="400ms" data-wow-duration="1500ms">
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <?php
                            $args=array(
                            'post_type' => 'service',
                            'post_status' => 'publish',
                            'order' => 'ASC'                            
                        );
                            $projectsQuery = null;
                            $projectsQuery = new WP_Query($args);
                            $count = 1;
                            if( $projectsQuery->have_posts() ) {
                            while ($projectsQuery->have_posts()) : $projectsQuery->the_post(); ?>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-<?php echo $count?>-tab" data-bs-toggle="pill" data-bs-target="#pills-<?php echo $count ?>" type="button" role="tab" aria-controls="pills-<?php echo $count ?>" aria-selected="true"><?php the_title()?></button>
                                </li>
                                <?php
                            $count++;
                            endwhile;
                            }
                            ?>

                                <!-- <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">CODRU Festival</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">CODRU Sustainart Village</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">CODRU Urban Garden</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="interior-tab" data-bs-toggle="pill" data-bs-target="#interior" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Parcul Primăverii</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="construction-tab" data-bs-toggle="pill" data-bs-target="#construction" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Festival of Lights</button>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="ori-project-tab-content wow fadeInUp" data-wow-delay="500ms" data-wow-duration="1500ms">
                        <div class="tab-content" id="pills-tabContent">
                            <?php
                                    $countContent = 1;
                                    if( $projectsQuery->have_posts() ) {
                                    while ($projectsQuery->have_posts()) : $projectsQuery->the_post(); 
                                    ?>
                                    <div class="tab-pane fade" id="pills-<?php echo $countContent?>" role="tabpanel" aria-labelledby="pills-<?php echo $countContent?>-tab">
                                    <?php

                                    $projectGallery = get_field('gallery', $projectsQuery->ID);
                                    ?>
                                    <?php if( $projectGallery ): ?>
                                        <?php foreach( $projectGallery as $project_image_id ): 
                                            $projectGalleryImage = wp_get_attachment_image( $project_image_id, $size );
                                            $projectURL = get_the_permalink();
                                            $projectTitle = get_the_title();
                                            $category_object = get_the_category($projectsQuery->ID);
                                            $parentCategory = $category_object[0]->category_parent;
                                            $parentCategoryName = get_cat_name($parentCategory);
                                            $parentCategoryURL = get_category_link($parentCategory);
                                            $categoryName = $category_object[0]->name;
                                            echo '<div class="ori-project-item-1  position-relative">';
                                            echo '<div class="ori-project-img">';
                                            echo $projectGalleryImage;
                                            echo '</div>';
                                            echo '<div class="ori-project-text position-absolute">
                                            <h3><a href="' . $projectURL . '">' . $projectTitle . '</a></h3>
                                            <span class="text-uppercase project-category"><a href="'. $parentCategoryURL .'">' . $parentCategoryName . '</a></span>
                                            </div></div>';
                                        endforeach; ?>
                                <?php endif; 
                                $countContent++;
                                echo '</div>';
                                endwhile;
                                }?>
                                <?php wp_reset_query(); ?>  
                        </div>         
                    </div>
                </div>
            </div>
            <!-- <div class="ori-btn-1 position-absolute text-uppercase wow fadeInUp" data-wow-delay="400ms" data-wow-duration="1500ms">
                <a href="portfolio.html">Vezi toate proiectele</a>
            </div> -->
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

<script>
jQuery( document ).ready(function() {
    jQuery('#pills-1').addClass('active show');
    jQuery('#pills-1-tab').addClass('active');

});
</script>
<!-- End of Project section
	============================================= -->

<!-- Start of Achievement History section
	============================================= -->
<section id="ori-achivement-history" class="ori-achivement-history-section position-relative">
    <div class="container">
        <div class="ori-inner-section-title text-center">
				<span class="sub-title text-uppercase">
				Inception</span>
            <h2>O mică istorie TEG
            </h2>
        </div>
        <div class="ori-achivement-history-content">
            <div class="ori-achivement-history-item-wrapper position-relative">
            <?php
					if( have_rows('history_repeater') ):
						while( have_rows('history_repeater') ) : the_row();
							$historyYear = get_sub_field('year');
							$historyTitle = get_sub_field('title');
                            $historyContent = get_sub_field('content');
							echo "
                            <div class='ori-achivement-history-item-area'>
                                <div class='ori-achivement-history-item pera-content position-relative'>
                                 <div class='achive-year position-absolute'>
                                 </div>
                                    <div class='achivement-text'>
                                        <h3>$historyYear<br>$historyTitle</h3>
                                        <p>$historyContent</p>
                                    </div>
                                </div>
                            </div>											
							";
							endwhile;


						else :

					endif;
				?>
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
<!-- End of Achievement History section
	============================================= -->

<!-- Start of Blog section
	============================================= -->
<section id="ori-blog-1" class="ori-blog-section-1 position-relative">
    <div class="container">
        <div class="ori-blog-top-content-1 d-flex justify-content-between align-items-center">
            <div class="ori-section-title-1 text-uppercase wow fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                <h2>Ultimele <span>proiecte</span></h2>
            </div>
            <div class="ori-btn-1 text-uppercase wow fadeInRight" data-wow-delay="300ms" data-wow-duration="1500ms">
                <a href="/projects">Vezi toate proiectele</a>
            </div>
        </div>
        <div class="ori-blog-content-1">
            <div class="row">
                        <?php
                            $latestProjectsArgs=array(
                            'post_type' => 'service',
                            'post_status' => 'publish',
                            'order' => 'ASC',
                            'posts_per_page' => 3,
                            );
                            $latestProjectsQuery = null;
                            $latestProjectsQuery = new WP_Query($latestProjectsArgs);
                            if( $latestProjectsQuery->have_posts() ) {
                            while ($latestProjectsQuery->have_posts()) : $latestProjectsQuery->the_post(); 
                            $latestProjectsImage = wp_get_attachment_image_src( get_post_thumbnail_id( $latestProjectsQuery->ID ), 'full');
                            ?>
                                <div class="col-lg-4 wow fadeInUp" data-wow-delay="400ms" data-wow-duration="1500ms">
                                    <div class="ori-blog-inner-item">
                                        <div class="blog-inner-img homepageLatestProjectsImage">
                                            <img src="<?php echo $latestProjectsImage[0] ?>" alt="">
                                        </div>
                                        <div class="blog-inner-text">
                                            <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                                            <a class="read-more text-uppercase" href="<?php the_permalink() ?>">Read more <i class="fal fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endwhile;
                            }
                            ?>
                    <?php wp_reset_query(); ?>                             
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
<!-- End of Blog section
	============================================= -->

<?php get_footer(); ?>
