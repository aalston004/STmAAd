<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/utils.php',                 // Define a custom location for the searchform template
  'lib/init.php',                  // Register navigation menus, sidebars, and define theme support for WordPress core functionality such as post thumbnails, post formats, and HTML5 markup.
  'lib/wrapper.php',               // Theme wrapper class
  'lib/conditional-tag-check.php', // ConditionalTagCheck class
  'lib/config.php',                // Enable/disable theme features and set configuration values
  'lib/assets.php',                // Enqueue stylesheets and scripts
  'lib/titles.php',                // Control the output of page titles
  'lib/extras.php',                // Contains a function for adding classes to <body> and a function that adds a ‘Continued’ link to excerpts
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);
