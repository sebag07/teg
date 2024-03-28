<?php /* Template name: Projects */ ?>
<?php get_header(); ?>

<!-- Start of Breadcrumbs  section
	============================================= -->
	<section id="ori-breadcrumbs" class="ori-breadcrumbs-section position-relative" data-background="<?php echo get_stylesheet_directory_uri().'/assets/img/bg/bread-bg.png'?>">
		<div class="container">
			<div class="ori-breadcrumb-content text-center ul-li">
				<h1>Projects</h1>
				<!-- <ul>
					<li><a href="index.html">orixy</a></li>
					<li>News & Blog</li>
				</ul> -->
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
<!-- Start of Blog Feed section
	============================================= -->
	<section id="ori-blog-feed" class="ori-blog-feed-section position-relative">
		<div class="container">
			<div class="ori-blog-feed-content">
				<div class="row">
					<div class="col-lg-4 col-md-5">
						<div class="ori-blog-sidebar">
							<!-- <div class="ori-blog-widget">
								<div class="search-widget">
									<h3 class="widget-title">Search</h3>
									<form action="#">
										<input type="text" name="search" placeholder="Search your keyword">
										<button><i class="fal fa-search"></i></button>
									</form>
								</div>
							</div> -->
							<div class="ori-blog-widget related-projects-widget">
								<div class="recent-post-widget">
									<h3 class="widget-title">Proiecte</h3>
                                    <!-- First Related post start -->
                                    <?php
                                        $firstRelatedPost = get_field('first_related_project');
                                        if( $firstRelatedPost ): 
                                            $firstRelatedPostImage = wp_get_attachment_image_src( get_post_thumbnail_id( $firstRelatedPost->ID )); ?>
                                    <div class="ori-recent-post-item align-items-center">
										<a href="<?php echo get_the_permalink($firstRelatedPost); ?>" class="recent-blog-img latestProjectsImg">
											<img src="<?php echo $firstRelatedPostImage[0]; ?>" alt="">
										</a>
										<div class="recent-blog-text">
											<span class="date-meta text-uppercase"><?php echo get_the_date('Y-m-d', $firstRelatedPost); ?></span>
											<h3><a class="projectTitle" href="<?php echo get_the_permalink($firstRelatedPost); ?>"><?php echo get_the_title($firstRelatedPost); ?></a></h3>
										</div>
									</div>
                                        <?php endif; ?>
                                    <!-- First related post end -->
                                    <!-- Second Related post start -->
                                    <?php
                                        $secondRelatedPost = get_field('second_related_project');
                                        if( $secondRelatedPost ): 
                                            $secondRelatedPostImage = wp_get_attachment_image_src( get_post_thumbnail_id( $secondRelatedPost->ID )); ?>
                                    <div class="ori-recent-post-item align-items-center">
										<a href="<?php echo get_the_permalink($secondRelatedPost); ?>" class="recent-blog-img latestProjectsImg">
											<img src="<?php echo $secondRelatedPostImage[0]; ?>" alt="">
										</a>
										<div class="recent-blog-text">
											<span class="date-meta text-uppercase"><?php echo get_the_date('Y-m-d', $secondRelatedPost); ?></span>
											<h3><a class="projectTitle" href="<?php echo get_the_permalink($secondRelatedPost); ?>"><?php echo get_the_title($secondRelatedPost); ?></a></h3>
										</div>
									</div>
                                        <?php endif; ?>
                                    <!-- Third related post end -->
                                    <?php
                                        $thirdRelatedPost = get_field('third_related_project');
                                        if( $thirdRelatedPost ): 
                                            $thirdRelatedPostImage = wp_get_attachment_image_src( get_post_thumbnail_id( $thirdRelatedPost->ID )); ?>
                                    <div class="ori-recent-post-item align-items-center">
										<a href="<?php echo get_the_permalink($thirdRelatedPost); ?>" class="recent-blog-img latestProjectsImg">
											<img src="<?php echo $thirdRelatedPostImage[0]; ?>" alt="">
										</a>
										<div class="recent-blog-text">
											<span class="date-meta text-uppercase"><?php echo get_the_date('Y-m-d', $thirdRelatedPost); ?></span>
											<h3><a class="projectTitle" href="<?php echo get_the_permalink($thirdRelatedPost); ?>"><?php echo get_the_title($thirdRelatedPost); ?></a></h3>
										</div>
									</div>
                                        <?php endif; ?>
                                    <!-- Third related post end -->
								</div>
							</div>
							<div class="ori-blog-widget">
								<div class="service-widget ul-li-block categoriesWidget">
									<h3 class="widget-title">Categories</h3>
                                    <ul>
                                    <?php
                                    /*
                                    EXCLUDE SERVICES CATEGORIES FROM NEWS PAGE FILTER
                                    */
                                    $cat_args=array(
                                        'orderby' => 'name',
                                        'order' => 'ASC',
                                        'post_type' => 'service',
                                        'parent' => 0,
                                        'include' => array(5, 6, 7, 8)
                                         );
                                      $categories=get_categories($cat_args);
                                      $args = array(
                                        'post_type' => 'service'
                                    );
                                    $the_query = new WP_Query( $args );
                                    if ( $the_query->have_posts() ) {
                                        $totalCount = $the_query->found_posts;
                                    }
                                      foreach($categories as $category) {
                                        $categoryLink = get_category_link( $category->term_id );
                                        $count = $category->category_count;
                                        echo "										
                                            <li><a class='$category->slug' href='$categoryLink'>$category->name<span>($count)</span></a></li>
                                        ";
                                    }
                                    echo "<li><a class='all' href='#'>View all<span>($totalCount)</span></a></li>";
                                    ?>

									</ul>
								</div>
							</div>
							<!-- <div class="ori-blog-widget">
								<div class="tag-widget ul-li">
									<h3 class="widget-title">Tags</h3>
									<ul>
										<li><a href="blog.html">design</a></li>
										<li><a href="blog.html">digital</a></li>
										<li><a href="blog.html">Content</a></li>
										<li><a href="blog.html">innovation</a></li>
										<li><a href="blog.html">marketing</a></li>
										<li><a href="blog.html">mobile</a></li>
										<li><a href="blog.html">tech</a></li>
										<li><a href="blog.html">technology</a></li>
										<li><a href="blog.html">web</a></li>
										<li><a href="blog.html">wordpress</a></li>
									</ul>
								</div>
							</div> -->
							<!-- <div class="ori-blog-widget">
								<div class="gallery-widget ul-li">
									<h3 class="widget-title">Gallery</h3>
									<ul class="zoom-gallery">
										<li><a href="assets/img/blog/blg-f5.png" data-source="assets/img/blog/blg-f5.png"><img src="assets/img/gallery/gl1.png" alt=""></a></li>
										<li><a href="assets/img/blog/blg-f5.png" data-source="assets/img/blog/blg-f5.png"><img src="assets/img/gallery/gl2.png" alt=""></a></li>
										<li><a href="assets/img/blog/blg-f5.png" data-source="assets/img/blog/blg-f5.png"><img src="assets/img/gallery/gl3.png" alt=""></a></li>
										<li><a href="assets/img/blog/blg-f5.png" data-source="assets/img/blog/blg-f5.png"><img src="assets/img/gallery/gl4.png" alt=""></a></li>
										<li><a href="assets/img/blog/blg-f5.png" data-source="assets/img/blog/blg-f5.png"><img src="assets/img/gallery/gl5.png" alt=""></a></li>
										<li><a href="assets/img/blog/blg-f5.png" data-source="assets/img/blog/blg-f5.png"><img src="assets/img/gallery/gl6.png" alt=""></a></li>
									</ul>
								</div>
							</div> -->
							<!-- <div class="ori-blog-add-widget">
								<a href="contact.html">
									<img src="assets/img/blog/blg-add.png" alt="">
								</a>
							</div> -->
						</div>
					</div>
					<div class="col-lg-8 col-md-7">
						<div class="ori-blog-feed-post-content">
							<div class="ori-blog-feed-post-item-wrap">
                            <?php
                                $allposts = get_posts( array(
                                    'posts_per_page' => -1,
                                    'post_type' => 'service',
                                ) );

                                if ( $allposts ) {
                                    foreach ( $allposts as $post ) :
                                        setup_postdata( $post ); 
                                        $postCategory = get_the_category($post->ID);
                                        $postCategoryArray = $postCategory[0];
                                        $postCategoryName = $postCategoryArray->name;
                                        $postCategorySlug = $postCategoryArray->slug;
                                        $postImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full');
                                        ?>

                                    <div class="ori-blog-feed-item all <?php echo $postCategorySlug ?>">
									<a href="<?php the_permalink(); ?>" class="ori-blog-img">
										<img src="<?php echo $postImage[0]; ?>" alt="">
									</a>
									<div class="ori-blog-text pera-content">
										<div  class="blog-meta text-uppercase">
											<a class="blog-cate disabled" href="#"><i class="fas fa-file"></i><?php echo $postCategoryName ;?></a>
											<a class="blog-author disabled" href="#"><i class="fas fa-user"></i><?php echo get_the_author();?></a>
											<a class="blog-date disabled" href="#"><i class="fas fa-calendar-alt"></i><?php the_date('Y-m-d'); ?></a>
										</div>
										<h3><a class="projectTitle" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
										<?php the_content(); ?>
										<a class="blog-more text-uppercase" href="<?php the_permalink(); ?>">CONTINUE READING  <i class="fal fa-arrow-right"></i></a>
									</div>
								</div>
                                    <?php
                                    endforeach; 
                                    wp_reset_postdata();
                                }
                                ?>

							</div>
							<!-- <div class="ori-pagination-wrap ul-li">
								<ul>
									<li><a href="#"><i class="fal fa-arrow-left"></i></a></li>
									<li><a href="#">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#"><i class="fal fa-arrow-right"></i></a></li>
								</ul>
							</div> -->
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


    <script>
        jQuery('.categoriesWidget ul li a').on('click',function(e){
            e.preventDefault();
            var className = jQuery(this).attr('class').toLowerCase();
            jQuery(".ori-blog-feed-item").not('.' + className).hide();
            jQuery(".ori-blog-feed-item" + "." + className).show();
})
        </script>


<?php get_footer(); ?>
