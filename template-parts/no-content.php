<?php
/**
 * No Content template
 *
 * @package Itakhi
 */

?>

<section class="">
    <header class="mb-16">
        <h1 class="text-2xl font-bold">
            <?php esc_html_e( 'No results found', 'itakhitheme' ); ?>
        </h1>
    </header>

    <div>
        <?php if ( is_home() && current_user_can('publish_posts')) : ?>

            <p>
                <?php 
                printf(
                    wp_kses(
                        __('Ready to publish your first post? <a href="%s">Get started here</a>', 'itakhitheme'),
                        [
                            'a' => [
                                'href' => []
                            ]
                        ]
                    ),
                    esc_url( admin_url( 'post-new.php' ) )
                );
                ?>
            </p>

        <?php elseif ( is_search() ) : ?>

            <p>
                <?php esc_html_e('Sorry but nothing matched your search. Please try with some other keywords', 'itakhitheme'); ?>
            </p>
            <?php get_search_form(); ?>
        
            <?php else : ?>

            <p>
                <?php esc_html_e('It seems what you are looking for does not exist. Maybe you could try searching for it', 'itakhitheme'); ?>
            </p>
            <?php get_search_form(); ?>

        <?php endif; ?>
    </div>
</section>