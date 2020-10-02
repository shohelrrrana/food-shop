<?php
    /**
     * The header navbar for our theme
     *
     * @package food-shop
     */

    use Theme\Setup\Menus;

    $nav_items = wp_get_nav_menu_items( 'primary-menu' );
?>

<nav class="rd-navbar-main-outer">
    <div class="rd-navbar-main">
        <div class="rd-navbar-nav-wrap">
            <ul class="rd-navbar-nav">
                <?php
                    foreach ( $nav_items as $nav_item ):
                        $child_nav_items = Menus::get_child_menu_items( $nav_items, $nav_item->ID );
                        if ( empty($child_nav_items) && intval( $nav_item->menu_item_parent ) === 0 ):
                    ?>
                        <li class="rd-nav-item <?php echo Menus::is_current_menu($nav_item) ? esc_attr('active') : ''; ?>">
                            <a class="rd-nav-link" href="<?php echo esc_html( $nav_item->url ); ?>">
                                <?php echo esc_html( $nav_item->title ); ?>
                            </a>
                        </li>
                        <?php
                        endif;
                        if ( ! empty($child_nav_items) ):
                            ?>
                            <li class="rd-nav-item rd-navbar--has-dropdown rd-navbar-submenu">
                                <a class="rd-nav-link" href="<?php echo esc_attr( $nav_item->url ); ?>">
                                    <?php echo esc_html( $nav_item->title ); ?>
                                </a>
                                <span class="rd-navbar-submenu-toggle"></span>
                                <ul class="rd-menu rd-navbar-dropdown">
                                    <?php
                                    foreach ( $child_nav_items as $child_nav_item ):
                                    ?>
                                    <li class="rd-dropdown-item">
                                        <a class="rd-dropdown-link" href="<?php echo esc_attr( $child_nav_item->url ); ?>">
                                            <?php echo esc_html( $child_nav_item->title ); ?>
                                        </a>
                                    </li>
                                    <?php endforeach; ?>

                                </ul>
                            </li>
                    <?php
                        endif;
                    endforeach;
                    ?>
            </ul>
        </div>
    </div>
</nav>