<?php
add_theme_support( 'title-tag' );

$roots_includes = array(
    'admin',
    'enqueue_scripts'
);
  
foreach($roots_includes as $file){
    if(!$filepath = locate_template("/functions/" . $file . '.php')) {
      trigger_error("Error locating `$file` for inclusion!", E_USER_ERROR);
    }
  
    require_once $filepath;
}
unset($file, $filepath);