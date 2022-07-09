<?php
/**
 * functions.php
 * 
 * runs functions defined in files in the functions/ directory
 */

$directory = "/functions/";
$files = array_filter(scandir(get_template_directory() . $directory), fn($x) => str_ends_with($x, '.php'));
foreach($files as $file) require_once locate_template($directory . $file);