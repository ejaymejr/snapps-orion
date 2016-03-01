<?php

sfConfig::set('app_page_heading', 'Janitorial Records');

sfConfig::set('app_submenu_items', 
    array(
        array('Micronclean', 'janitorial/mcs', 'janitorial', 'mcs'),
        array('ACRO / Nano', 'janitorial/acro', 'janitorial', 'acro'),
    ));