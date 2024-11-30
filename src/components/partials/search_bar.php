<?php

    echo '
        <form class="search" action="POST">
            <span class="input-span">
                <input type="text" id="search" name="search" required>
                <i class="'.$site_icon_style.'search"></i>
                <label for="search">search</label>
            </span>
            <button class="button">
                <div class="button-overlay"></div>
                <i class="'.$site_icon_style.'search"></i>
                <a>search</a>
            </button>
        </form>
    ';

?>