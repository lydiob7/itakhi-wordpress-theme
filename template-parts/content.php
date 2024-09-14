<?php
/**
 * Content template
 *
 * @package Itakhi
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('p-4 rounded-sm'); ?>>       
    <?php 
    get_template_part('template-parts/components/blog/entry-header');
    get_template_part('template-parts/components/blog/entry-meta');
    get_template_part('template-parts/components/blog/entry-content');
    get_template_part('template-parts/components/blog/entry-footer');
    ?>
</article>