<?php
/**
 * Content Entry header template
 *
 * @package Itakhi
 */

$the_post_id = get_the_ID();
$hide_title = get_post_meta($the_post_id, '_hide_page_title', true);
 $has_post_thumbnail = get_the_post_thumbnail( $the_post_id );
 $heading_class = !empty($hide_title) && $hide_title === 'yes' ? 'hide' : '';
?>

<header class="">
    <?php 
        if ($has_post_thumbnail) {
            ?>
            <div class="mb-4">
                <a href="<?php echo esc_url( get_permalink() ); ?>">
                    <?php the_post_custom_thumbnail(
                        $the_post_id,
                        'featured-thumbnail',
                        [
                            'sizes' => '(max-width: 390px) 390px, 292.5px',
                            'class' => 'attachment-featured-large w-full h-full object-cover'
                        ]
                    ); ?>
                </a>
            </div>
            <?php
        }

        if ( is_single() || is_page() ) {
            printf(
                '<h1 class="page-title text-3xl font-bold %1$s">%2$s</h1>',
                esc_attr( $heading_class ),
                wp_kses_post( get_the_title() )
            );
        } else {
            printf(
                '<h2 class="entry-title text-2xl font-semibold my-2"><a href="%1$s">%2$s</a></h2>',
                esc_url( get_the_permalink() ),
                wp_kses_post( get_the_title() )
            );
        }
    ?>
</header>