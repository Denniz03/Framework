<?php
    // Navbar links
    echo '<ul class="navbar-nav">';
    foreach ($table_menus as $menu_item) {
        if ($menu_item['parent'] == '') {
            if ($menu_item['submenu'] == 'false') {
                $menu_item_active = ($menu_item['label'] == 'home') ? 'active' : '';
                $menu_item_disabled = ($menu_item['state'] == 'disabled') ? 'disabled' : '';
                echo '
                    <li class="nav-item button '.$menu_item_active.' '.$menu_item_disabled.'">
                        <i class="nav-icon '.$site_icon_style.$menu_item['icon'].'"></i>
                        <a class="nav-link" href="#">'.$menu_item['label'].'</a>
                    </li>
                ';
            } else {
                echo '
                    <li class="nav-item dropdown button">
                        <i class="nav-icon '.$site_icon_style.$menu_item['icon'].'"></i>
                        <a class="nav-link" href="#">'.$menu_item['label'].'</a>
                        <i class="nav-icon '.$site_icon_style.'caret-down"></i>
                        <ul class="dropdown-menu">
                    ';
                            foreach ($table_menus as $submenu_item) {
                                if ($submenu_item['parent'] == $menu_item['title']) {
                                    $submenu_item_disabled = ($submenu_item['state'] == 'disabled') ? 'disabled' : '';
                                    echo '
                                        <li class="dropdown-item button '.$submenu_item_disabled.'">
                                            <i class="nav-icon '.$site_icon_style.$submenu_item['icon'].'"></i>
                                            <a class="nav-link" href="#">'.$submenu_item['label'].'</a>
                                        </li>
                                    ';
                                }
                            }
                    echo '
                        </ul>
                </li>
                ';
            }
        }
    }
    echo '</ul>';

?>