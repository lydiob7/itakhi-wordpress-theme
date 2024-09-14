<?php
/**
 * Navigation template.
 *
 * @package Itakhi
 */

 $menu_class = \ITAKHI\Includes\Menus::get_instance();
 $header_menu_id = $menu_class->get_menu_id('itakhi-header-menu');

 $header_menus = wp_get_nav_menu_items( $header_menu_id );
?>

<div id="main-navigation" class="w-full flex gap-8 justify-between items-center container py-8">
    <div class="w-20">
        <?php
        if ( function_exists( 'the_custom_logo' ) ) {
            the_custom_logo();
        }
        ?>
    </div>

    <?php
        if ( !empty( $header_menus ) && is_array( $header_menus ) ) { ?>
        
        <nav id="main-header-nav" class="flex-1">
            <ul class="flex w-full items-center">
                <?php
                foreach($header_menus as $menu_item) {
                    if ( !$menu_item->menu_item_parent ) {
                        $ID = $menu_item->ID;
                        $title = $menu_item->title;
                        $url = $menu_item->url;
                        $child_menu_items = $menu_class->get_child_menu_items($header_menus, $ID);
                        ?>
                        <li class="group relative">
                            <a class="block w-full h-full px-4 py-2 hover:opacity-70" href="<?php echo esc_url($url); ?>"><?php echo $title; ?></a>
                            <?php 
                            if (!empty($child_menu_items) && is_array($child_menu_items)) { ?>
                                <div class="absolute bg-white top-full w-48 left-0 z-10 max-h-0 overflow-hidden transition-all group-hover:max-h-[100vh] group-hover:overflow-auto">
                                    <ul class="py-4 border border-gray-200">
                                    <?php
                                        foreach($child_menu_items as $child_menu_item) {
                                            $chilc_title = $child_menu_item->title;
                                            $chilc_url = $child_menu_item->url;
                                        ?>
                                        <li>
                                            <a class="block w-full h-full px-4 py-2 hover:bg-gray-100" href="<?php echo esc_url($chilc_url); ?>"><?php echo $chilc_title; ?></a>
                                        </li>
                                    <?php } ?>
                                    </ul>
                                </div>
                           <?php }?>
                        </li>
                        <?php
                    }
                }
                ?>
            </ul>
        </nav>
    <?php } ?>

</div>