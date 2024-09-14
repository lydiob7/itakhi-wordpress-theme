<?php
/*
Main Itakhi Theme template file.

@package Itakhi
*/

get_header();
?>

<div id="main-container">
    <main id="main" role="main">
        <?php the_post(); ?>
    </main>
</div>


<?php
get_footer();