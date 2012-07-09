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
