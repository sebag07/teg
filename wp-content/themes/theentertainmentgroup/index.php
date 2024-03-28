<!DOCTYPE html>
<html >
<head>
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body>
<header>
    <h1><?php bloginfo('name'); ?></h1>
</header>

<main>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <h2><?php the_title(); ?></h2>
        <?php the_content(); ?>
    <?php endwhile; endif; ?>
</main>

<footer>
    <p>© <?php bloginfo('name'); ?> <?php echo date('Y'); ?></p>
</footer>

<?php wp_footer(); ?>
</body>
</html>