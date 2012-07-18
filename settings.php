<?php

/**
 * Settings for the wsi_tafe theme
 */
 
defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {

// Block region width
$name = 'theme_wsi_tafe/regionwidth';
$title = get_string('regionwidth','theme_wsi_tafe');
$description = get_string('regionwidthdesc', 'theme_wsi_tafe');
$default = 240;
$choices = array(200=>'200px', 240=>'240px', 290=>'290px', 350=>'350px', 420=>'420px');
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$settings->add($setting);

// Main Theme Color
$name = 'theme_wsi_tafe/themecolor';
$title = get_string('themecolor','theme_wsi_tafe');
$description = get_string('themecolordesc', 'theme_wsi_tafe');
$default = '#763172';
$previewconfig = NULL;
$setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
$settings->add($setting);

// Border Colors
$name = 'theme_wsi_tafe/bordercolor';
$title = get_string('bordercolor','theme_wsi_tafe');
$description = get_string('bordercolordesc', 'theme_wsi_tafe');
$default = '#e4d6e4';
$previewconfig = NULL;
$setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
$settings->add($setting);

// Set terminology for dropdown couse list
$name = 'theme_wsi_tafe/mycoursetitle';
$title = get_string('mycoursetitle','theme_wsi_tafe');
$description = get_string('mycoursetitledesc', 'theme_wsi_tafe');
$default = 'course';
$choices = array(
	'course' => get_string('mycourses', 'theme_wsi_tafe'),
	'unit' => get_string('myunits', 'theme_wsi_tafe'),
	'class' => get_string('myclasses', 'theme_wsi_tafe'),
	'module' => get_string('mymodules', 'theme_wsi_tafe')
);
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$settings->add($setting);

// Footer text or link
$name = 'theme_wsi_tafe/footnote';
$title = get_string('footnote','theme_wsi_tafe');
$description = get_string('footnotedesc', 'theme_wsi_tafe');
$default = '';
$setting = new admin_setting_confightmleditor($name, $title, $description, $default);
$settings->add($setting);


// Custom CSS file
$name = 'theme_wsi_tafe/customcss';
$title = get_string('customcss','theme_wsi_tafe');
$description = get_string('customcssdesc', 'theme_wsi_tafe');
$setting = new admin_setting_configtextarea($name, $title, $description, '');
$settings->add($setting);

}
