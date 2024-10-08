<?php
/**
 * Header template.
 *
 * @package Itakhi
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php
if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
}
?>

<div id="page" class="flex flex-col min-h-screen">
	<header id="masthead" class="site-header" role="banner">
		<?php get_template_part( 'template-parts/header/navigation' ); ?>
	</header>
	<div id="content" class="flex-1">