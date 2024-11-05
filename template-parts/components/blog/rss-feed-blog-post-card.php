<?php

?>

<div class="rss-feed">
    <a href="<?php echo esc_url( $args['item']->get_permalink() ); ?>" target="_blank" rel="noreferrer">
        <?php echo $args['item']->get_title(); ?>
    </a>
</div>

