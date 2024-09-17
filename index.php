<?php
/*
Main Itakhi Theme template file.

@package Itakhi
*/

get_header();
?>

<div id="main-container">
    <main id="main" class="container my-8" role="main">
        <?php if (have_posts()) : ?>

        <div>
            <?php if (is_home() && !is_front_page()) : ?>

                <header class="mb-16">
                    <h1 class="text-2xl font-bold"><?php single_post_title(); ?></h1>
                </header>

                <div class="grid sm:grid-cols-2 md:grid-cols-3">
                    <?php 
                    while (have_posts()) : the_post();
                    get_template_part('template-parts/content');
                    endwhile;
                    ?>
                </div>

            <?php else :

            while (have_posts()) : the_post();
                the_content();
            endwhile;
            
            endif; ?>
        </div>

        <?php else :

        get_template_part('template-parts/no-content');
        
        endif; 
        
        itakhi_pagination();
        ?>
    </main>
</div>


<?php
get_footer();