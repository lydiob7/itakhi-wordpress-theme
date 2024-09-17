<?php
/*
Main Itakhi Theme Single Post template file.

@package Itakhi
*/

get_header();
?>

<div id="main-container" class="container grid gap-8 md:grid-cols-[2fr,1fr] my-8">
    <main id="main" class="" role="main">
        <?php if (is_home() && !is_front_page()) : ?>

            <header class="mb-16">
                <h1 class="text-2xl font-bold"><?php single_post_title(); ?></h1>
            </header>

        <?php endif; ?>

        <?php
        
        while (have_posts()) : the_post();
            get_template_part('template-parts/content');
        endwhile;

        ?>
        <div class="flex justify-between items-center gap-4">
            <div class="prev-link">
                <?php
                previous_post_link();
                ?>
            </div>
            <div class="next-link">
                <?php
                next_post_link();
                ?>
            </div>
        </div>
    </main>

    <div>
        <?php get_sidebar(); ?>
    </div>
</div>


<?php
get_footer();