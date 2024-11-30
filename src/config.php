<?php
// Database
define('DB_HOST', 'localhost');
define('DB_NAME', 'framework');
define('DB_USER', 'denniz03');
define('DB_PASS', 'gxd7Hv');
define('DB_CHARSET', 'utf8mb4');

// Site
define('SITE_NAME', 'My Awesome Website');
define('BASE_URL', 'http://localhost/public');
define('ENVIRONMENT', 'development');

// Security
define('SESSION_TIMEOUT', 3600);
define('HASH_ALGO', PASSWORD_BCRYPT);
define('CSRF_TOKEN_LIFETIME', 3600); // Voor CSRF beveiliging
define('MAX_LOGIN_ATTEMPTS', 5); // Maximum aantal loginpogingen

// Debug
define('DEBUG', true);

    // Error Reporting (alleen bij DEBUG)
    if (DEBUG) {
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
    } else {
        ini_set('display_errors', 0);
        error_reporting(0);
    }


    // Basics
    $site_logo = "../images/site-images/logo.png";
    $site_icon = "earth-europe";
    $site_title = "You're website";
    $site_subtitle = "Build you're first website";
    $site_designer = "You're name";

    $site_color = "red";
    $site_theme = "light";
    $site_header = ["brand", "search", ".navbar_usermenu"];
    $site_navbar = ["brand", "navbar_links", ".search", "navbar_usermenu"];

    $site_layout = "header_nav_main_footer";
    $site_icon_style = "fas fa-fw fa-";

    // Menus
    $table_menus = array(
        array('id' => '1', 'title' => 'home', 'icon' => 'home', 'label' => 'home', 'page' => 'home', 'submenu' => 'false', 'parent' => '', 'state' => 'active', 'admin' => 'false'),
        array('id' => '2', 'title' => 'link', 'icon' => 'arrow-pointer', 'label' => 'link', 'page' => 'home', 'submenu' => 'false', 'parent' => '', 'state' => 'active', 'admin' => 'false'),
        array('id' => '3', 'title' => 'dropdown', 'icon' => 'square-caret-down', 'label' => 'submenu', 'page' => 'home', 'submenu' => 'true', 'parent' => '', 'state' => 'active', 'admin' => 'false'),
            array('id' => '5', 'title' => 'link-1', 'icon' => 'arrow-pointer', 'label' => 'link', 'page' => 'home', 'submenu' => 'false', 'parent' => 'dropdown', 'state' => 'active', 'admin' => 'false'),
            array('id' => '6', 'title' => 'link-2', 'icon' => 'arrow-pointer', 'label' => 'link', 'page' => 'home', 'submenu' => 'false', 'parent' => 'dropdown', 'state' => 'active', 'admin' => 'false'),
            array('id' => '7', 'title' => 'link-3', 'icon' => 'arrow-pointer', 'label' => 'link', 'page' => 'home', 'submenu' => 'false', 'parent' => 'dropdown', 'state' => 'active', 'admin' => 'false'),
            array('id' => '8', 'title' => 'link-4', 'icon' => 'arrow-pointer', 'label' => 'link', 'page' => 'home', 'submenu' => 'false', 'parent' => 'dropdown', 'state' => 'disabled', 'admin' => 'false'),
        array('id' => '4', 'title' => 'disabled', 'icon' => 'ban', 'label' => 'disabled', 'page' => 'home', 'submenu' => 'false', 'parent' => '', 'state' => 'disabled', 'admin' => 'false')
    );

    // Users
    $table_users = array(
        array('id' => '1', 'username' => 'e89937d1ebf607ef29b186f25c3876eadf68cf2b', 'password' => 'cea979a80f56faff7958eb787d63c2c2a91fc305', 'role' => 'admin', 'creation-date' => '02-04-2024 15:30', 'modified-date' => ''),
        array('id' => '2', 'username' => '8c928cb3df42e3d0aebe08a98a353588a0700dcd', 'password' => '81f1402cb693d9b4abf830766cb4b77e093a89d6', 'role' => 'user', 'creation-date' => '02-04-2024 15:40', 'modified-date' => ''),
        array('id' => '3', 'username' => 'a51dda7c7ff50b61eaea0444371f4a6a9301e501', 'password' => '6e6db442598e6445d8d242fa35dd72275875b888', 'role' => 'user', 'creation-date' => '02-04-2024 15:50', 'modified-date' => '')
    );
    // Contacts
    $table_contacts = array(
        array('id' => '1', 'firstname' => 'danny', 'lastname' => 'korthout', 'userid' => '1', 'username' => 'denniz03', 'birthdate' => '18-09-1986', 'color' => 'yellow', 'email' => 'danny.korthout@gmail.com', 'phone' => '0638513776', 'adress' => '1', 'language' => 'en'),
        array('id' => '2', 'firstname' => 'max', 'lastname' => 'korthout', 'userid' => '2', 'username' => 'maxitaxi', 'birthdate' => '18-07-2014', 'color' => 'red', 'email' => 'max.korthout2014@gmail.com', 'phone' => '0687654321', 'adress' => '1', 'language' => 'nl'),
        array('id' => '3', 'firstname' => 'noa', 'lastname' => 'korthout', 'userid' => '', 'username' => '', 'birthdate' => '25-01-2017', 'color' => 'pink', 'email' => 'noa.korthout2017@gmail.com', 'phone' => '0687654321', 'adress' => '1', 'language' => 'nl'),
        array('id' => '4', 'firstname' => 'michelle', 'lastname' => 'korthout', 'userid' => '', 'username' => '', 'birthdate' => '08-01-1991', 'color' => 'blue', 'email' => 'mieskuh7@hotmail.com', 'phone' => '0621545392', 'adress' => '1', 'language' => 'nl'),
        array('id' => '5', 'firstname' => 'john', 'lastname' => 'korthout', 'userid' => '3', 'username' => 'john', 'birthdate' => '19-06-1966', 'color' => 'green', 'email' => 'korthout@gmail.com', 'phone' => '0687654321', 'adress' => '3', 'language' => 'nl')
    );
    // Adresses
    $table_adresses = array(
        array('id' => '1', 'streetname' => 'Kees en Henny de Ruyterstraat', 'housenumber' => '30', 'postalcode' => '5146ER', 'city' => 'waalwijk', 'state' => 'noord-brabant', 'country' => 'nederland'),
        array('id' => '2', 'streetname' => 'molenstraat', 'housenumber' => '37', 'postalcode' => '5161TJ', 'city' => 'sprang-capelle', 'state' => 'noord-brabant', 'country' => 'nederland'),
        array('id' => '3', 'streetname' => 'Valeriaanstraat', 'housenumber' => '33', 'postalcode' => '5143CB', 'city' => 'waalwijk', 'state' => 'noord-brabant', 'country' => 'nederland')
    );

?>