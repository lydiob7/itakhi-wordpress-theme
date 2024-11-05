<?php
/**
 * Block Patterns
 *
 * @package Itakhi
 */

namespace ITAKHI\Includes;

use ITAKHI\Includes\Traits\Singleton;

class Block_Patterns {
	use Singleton;

	protected function __construct() {
		// load class.
		$this->setup_hooks();
	}

	protected function setup_hooks() {

		/**
		 * Actions.
		 */
        add_action('init', [ $this, 'register_block_patterns' ]);
	}

    public function register_block_patterns() {
        if (function_exists('register_block_pattern')) {
            register_block_pattern(
                'itakhi/cover',
                [
                    'title' => __('Itakhi Cover', 'itakhitheme'),
                    'description' => __('Itakhi Cover Block with image text', 'itakhitheme'),
                    'content' => <<<EOT
                    <!-- wp:cover {"url":"http://itakhi-theme.local/wp-content/uploads/2024/09/Rurouni-Kenshin-rurouni-kenshin-35601525-1920-1080-1.jpg","id":101,"dimRatio":50,"customOverlayColor":"#596650","align":"full","layout":{"type":"constrained"}} -->
                    <div class="wp-block-cover alignfull"><span aria-hidden="true" class="wp-block-cover__background has-background-dim" style="background-color:#596650"></span><img class="wp-block-cover__image-background wp-image-101" alt="" src="http://itakhi-theme.local/wp-content/uploads/2024/09/Rurouni-Kenshin-rurouni-kenshin-35601525-1920-1080-1.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","level":1,"fontSize":"large"} -->
                    <h1 class="wp-block-heading has-text-align-center has-large-font-size"><strong>Block Title</strong></h1>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"center","style":{"color":{"text":"#e7e7e7"},"elements":{"link":{"color":{"text":"#e7e7e7"}}}}} -->
                    <p class="has-text-align-center has-text-color has-link-color" style="color:#e7e7e7">Adipiscing a quam elementum lorem consectetur arcu sed enim elementum maecenas leo sed erat lacus orci suspendisse nisl a tristique lorem nunc felis tempus ex.</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"align":"center","style":{"color":{"text":"#e7e7e7"},"elements":{"link":{"color":{"text":"#e7e7e7"}}}}} -->
                    <p class="has-text-align-center has-text-color has-link-color" style="color:#e7e7e7">A nisl metus portaest fusce ac congue gravida elit a rutrum elementum sem ut nulla quam suspendisse tristique tortor maximus bibendum elit aliquam accumsan lacus.</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
                    <div class="wp-block-buttons"><!-- wp:button {"textAlign":"center","className":"is-style-outline","style":{"elements":{"link":{"color":{"text":"#e7e7e7"}}},"color":{"text":"#e7e7e7"}},"fontSize":"medium"} -->
                    <div class="wp-block-button has-custom-font-size is-style-outline has-medium-font-size"><a class="wp-block-button__link has-text-color has-link-color has-text-align-center wp-element-button" href="http://itakhi-theme.local/blog/" style="color:#e7e7e7">Blog</a></div>
                    <!-- /wp:button --></div>
                    <!-- /wp:buttons --></div></div>
                    <!-- /wp:cover -->
                    EOT,
                ]
            );
        }
    }

}
