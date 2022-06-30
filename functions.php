<?php

$roots_includes = array(
    'general',
    'logo',
    'admin',
    'custom_fields',
);
  
foreach($roots_includes as $file){
    if(!$filepath = locate_template("/functions/" . $file . '.php')) {
      trigger_error("Error locating `$file` for inclusion!", E_USER_ERROR);
    }
  
    require_once $filepath;
}
unset($file, $filepath);