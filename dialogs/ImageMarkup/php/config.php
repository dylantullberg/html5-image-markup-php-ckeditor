<?php

// Absolute path where the modified images will be stored
// Example:
// $config['base_dir'] = '/var/www/ckeditor/ckeditor/plugins/img_editor/dialogs/ImageMarkup/php/upload/'
$config['base_dir'] = dirname(__FILE__) . '/upload/'; // (Default Value)

// Absolute URL corresponding to the previous path
// Example:
// $config['base_url'] = 'http://yoursite.com/ckeditor/ckeditor/plugins/img_editor/dialogs/ImageMarkup/php/upload/';
$config['base_url'] = preg_replace('/(upload\.php.*)/', 'upload/', $_SERVER['PHP_SELF']); // (Default Value)
