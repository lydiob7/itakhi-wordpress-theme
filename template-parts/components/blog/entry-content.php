<?php
/**
 * Content Entry content template
 *
 * @package Itakhi
 */

?>

<div class="entry-content">
    <?php 
    if (is_single()) {
        the_content(
            sprintf(
                wp_kses(
                    __('Continue reading %s <span class="meta-nav">&rarr;</span>', 'itakhitheme'),
                    [
                        'span' => [
                            'class' => []
                        ]
                    ]
                ),
                the_title('<span class="screen-reader-text">', '</span>', false)
            )
        );

        wp_link_pages(
            [
                'before' => '<div class="page-links">' . esc_html__('Pages', 'itakhitheme'),
                'after' => '</div>'
            ]
        );
    } else {
        itakhi_the_excerpt(130);
        echo itakhi_excerpt_more();
    }
    ?>
</div>