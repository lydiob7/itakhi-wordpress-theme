<?php
/*
Main Itakhi Theme Single Post template file.

@package Itakhi
*/

get_header();
?>

<div id="main-container">
    <main id="main" class="small-container my-8" role="main">
        <?php if (is_home() && !is_front_page()) : ?>

            <header class="mb-16">
                <h1 class="text-2xl font-bold"><?php single_post_title(); ?></h1>
            </header>

        <?php endif; ?>

        <?php
        
        while (have_posts()) : the_post();
            get_template_part('template-parts/content');
        endwhile;

        previous_post_link();
        next_post_link();
    
        ?>
    </main>
</div>


<?php
get_footer();