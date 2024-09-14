<?php
/**
 * Content Entry header template
 *
 * @package Itakhi
 */

 $the_post_id = get_the_ID();
 $has_post_thumbnail = get_the_post_thumbnail( $the_post_id );
?>

<header class="">
    <?php 
        if ($has_post_thumbnail) {
            ?>
            <div class="h-32 w-full mb-4">
                <a href="<?php echo esc_url( get_permalink() ); ?>">
                    <?php the_post_custom_thumbnail(
                        $the_post_id,
                        'featured-large',
                        [
                            'sizes' => '(max-width: 590px) 590px, 425px',
                            'class' => 'attachment-featured-large w-full h-full object-cover'
                        ]
                    ); ?>
                </a>
            </div>
            <?php
        }
    ?>
</header>