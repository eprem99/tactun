<div class="nt-mobile-wrapper-spacer">
    <div class="nt-mobile-wrapper">

        <!-- hamburger menu -->
        <div class="hamburger-button">
            <div class="hamburger-bar-top"></div>
            <div class="hamburger-bar-middle"></div>
            <div class="hamburger-bar-bottom"></div>
        </div>
        <!-- when opened -->
        <div class="nt-mm1-wrapper">

            <div class="dropdown-menu-wrapper">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'menu-1',
                    'fallback_cb'    => false,
                    'menu_class'     => 'mobile-menu',
                ) );
                ?>
            </div>

        </div>

    </div>
</div>