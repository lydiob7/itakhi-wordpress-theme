<?php
/**
 * Content Entry meta template
 *
 * @package Itakhi
 */
?>

<div class="entry-meta mb-2 flex">
    <?php 
    itakhi_posted_on();
    echo '&nbsp;';
    itakhi_posted_by();
    ?>
</div>