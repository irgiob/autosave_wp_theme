<?php
// requires all php files located in the functions folder
$directory = "/functions/";
$files = array_filter(scandir(get_template_directory() . $directory), fn($x) => str_ends_with($x, '.php'));
foreach($files as $file) require_once locate_template($directory . $file);