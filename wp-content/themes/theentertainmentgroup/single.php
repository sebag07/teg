<?php get_header(); ?>

<?php if( have_posts() ) the_post(); ?>
<!-- Start of Breadcrumbs  section
	============================================= -->
	<section id="ori-breadcrumbs" class="ori-breadcrumbs-section position-relative" data-background="<?php echo get_stylesheet_directory_uri().'/assets/img/bg/bread-bg.png'?>">
		<div class="container">
			<div class="ori-breadcrumb-content text-center ul-li">
				<h1><?php echo the_title(); ?></h1>
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

<!-- Start of Blog Details  section
	============================================= -->
	<section id="ori-blog-details" class="ori-blog-details-section position-relative">
		<div class="container">
			<div class="ori-blog-details-content">
				<div class="row">
					<div class="col-lg-8">
						<div class="ori-blog-details-text-wrapper">
							<div class="ori-blog-feed-item">
								<div class="ori-blog-img">
									<?php 
									$postImage = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
									?>
									<img src="<?php echo $postImage[0] ?>" alt="">
								</div>
								<div class="ori-blog-text pera-content">
									<div  class="blog-meta text-uppercase">
										<?php
										$postCategory = get_the_category($post->ID);
										$postCategoryArray = $postCategory[0];
                                        $postCategoryName = $postCategoryArray->name;
										?>
										<a class="blog-cate" href="blog.html"><i class="fas fa-file"></i><?php echo $postCategoryName ?></a>
										<a class="blog-author" href="blog.html"><i class="fas fa-user"></i><?php the_author();?></a>
										<a class="blog-date" href="blog.html"><i class="fas fa-calendar-alt"></i> <?php the_date('Y-m-d');?></a>
									</div>
									<?php the_content(); ?>
								</div>
							</div>
<!-- 
							<div class="ori-single-details-prev-next-btn  d-flex align-items-center justify-content-between">
								<div class="ori-single-prev-btn text-uppercase">
									<a href="#"><img src="<?php echo get_stylesheet_directory_uri().'/assets/img/vector/prev.png'?>" alt=""> previous</a>
								</div>
								<div class="ori-single-next-btn text-uppercase">
									<a href="#">next <img src="<?php echo get_stylesheet_directory_uri().'/assets/img/vector/next.png'?>" alt=""></a>
								</div>
							</div> -->
							<div class="ori-recent-portfolio-area">
								<h3>Noutăți relevante</h3>
								<div class="ori-recent-portfolio-item-area">
									<div class="row">
									<?php
										global $post;
										$category = get_the_category($post->ID);
										$categoryID = $category[0]->cat_ID;
										$relatedProjects = get_posts(array('numberposts' => 2, 'offset' => 0, 'post__not_in' => array( $post->ID ),  'category__in' => array($categoryID), 'post_status'=>'publish', 'order'=>'DESC' ));
										foreach($relatedProjects as $post) :
										setup_postdata($post);
										$relatedProjectImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full');
										$categoryArray = $category[0];
										$categoryName = $categoryArray->name;
										?>
										<div class="col-md-6">
											<div class="ori-portfolio-item position-relative">
												<div class="portfolio-img">
													<img src="<?php echo $relatedProjectImage[0] ?>" alt="">
												</div>
												<div class="portfolio-text">
													<span class="port-category text-uppercase"><a href="<?php echo get_the_permalink($post->ID);?>"><?php echo $categoryName ?></a></span>
													<h3><a href="<?php echo get_the_permalink($post->ID);?>"><?php the_title(); ?></a></h3>
												</div>
											</div>
										</div>
										<?php endforeach; ?>
										<?php wp_reset_query(); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="ori-blog-sidebar">
							<div class="ori-blog-widget">
								<div class="recent-post-widget">
									<h3 class="widget-title">Postări relevante</h3>
									<?php
									    $relatedPosts = get_posts(array('numberposts' => 3, 'offset' => 0, 'post__not_in' => array( $post->ID ), 'post_status'=>'publish', 'order'=>'ASC' ));
										foreach($relatedPosts as $post) :
										setup_postdata($post);
										$relatedPostsImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ));
										?>
										<div class="ori-recent-post-item d-flex align-items-center">
											<div class="recent-blog-img">
												<img src="<?php echo $relatedPostsImage[0] ?>" alt="">
											</div>
											<div class="recent-blog-text">
												<span class="date-meta text-uppercase"><?php echo get_the_date('Y-m-d') ?></span>
												<h3><a href="<?php echo get_the_permalink() ?>"><?php the_title();?></a></h3>
											</div>
										</div>
										<?php endforeach; ?>
										<?php wp_reset_query(); ?>
								</div>
							</div>
							<div class="ori-blog-widget">
								<div class="gallery-widget ul-li">
									<h3 class="widget-title">Galerie</h3>
									<ul class="zoom-gallery row">
									<?php 
									$newsGallery = get_field('gallery', $post->ID);
									$size = 'full'; // (thumbnail, medium, large, full or custom size)
									if( $newsGallery ): ?>
											<?php foreach( $newsGallery as $image_id ): 
												$galleryImg = wp_get_attachment_image( $image_id, $size );
												$galleryImgURL = wp_get_attachment_image_src($image_id, $size);
												echo "<li class='col-lg-6 col-md-6 col-6 m-0 pb-4'>
												<a href='$galleryImgURL[0]'>";
												echo $galleryImg;
												echo "</a>
												</li>";
											endforeach; ?>
									<?php endif; ?>
									</ul>
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
<!-- End of Blog Details  section
	============================================= -->	

	<?php get_footer(); ?>