<?php
/**
 * Content Entry footer template
 *
 * @package Itakhi
 */
$post_id = get_the_ID();
$article_terms = wp_get_post_terms( $post_id, [ 'category', 'post_tag' ] );

if (empty($article_terms) || !is_array($article_terms)) {
    return;
}
?>

<div class="entry-footer my-8">
    <?php 
        foreach($article_terms as $key => $article_term) {
            ?>
            <button class="itakhi-tag mb-1">
                <a href="<?php echo esc_url( get_term_link($article_term) ); ?>">
                    <?php echo esc_html( $article_term->name ); ?>
                </a>
            </button>
            <?php
        }
    ?>
</div>