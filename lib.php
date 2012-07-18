<?php

function wsi_tafe_process_css($css, $theme) {
 
    // Set the block region width
    if (!empty($theme->settings->regionwidth)) {
        $regionwidth = $theme->settings->regionwidth;
    } else {
        $regionwidth = null;
    }
    $css = wsi_tafe_set_regionwidth($css, $regionwidth);
    
    // Set the theme color
    if (!empty($theme->settings->themecolor)) {
        $themecolor = $theme->settings->themecolor;
    } else {
        $themecolor = null;
    }
    $css = wsi_tafe_set_themecolor($css, $themecolor);
    
    // Set the bordercolor
    if (!empty($theme->settings->bordercolor)) {
        $bordercolor = $theme->settings->bordercolor;
    } else {
        $bordercolor = null;
    }
    $css = wsi_tafe_set_bordercolor($css, $bordercolor);
 
    // Allow for custom CSS from setings
    if (!empty($theme->settings->customcss)) {
        $customcss = $theme->settings->customcss;
    } else {
        $customcss = null;
    }
    $css = wsi_tafe_set_customcss($css, $customcss);
 
    return $css;
}

/**
 * Sets the region width variable in CSS
 *
 * @param string $css
 * @param mixed $regionwidth
 * @return string
 */
function wsi_tafe_set_regionwidth($css, $regionwidth) {
    $tag = '[[setting:regionwidth]]';
    $doubletag = '[[setting:regionwidthdouble]]';
    $leftmargintag = '[[setting:leftregionwidthmargin]]';
    $rightmargintag = '[[setting:rightregionwidthmargin]]';
    $replacement = $regionwidth;
    if (is_null($replacement)) {
        $replacement = 240;
    }
    $css = str_replace($tag, $replacement.'px', $css);
    $css = str_replace($doubletag, ($replacement*2).'px', $css);
    $css = str_replace($rightmargintag, ($replacement*3-5).'px', $css);
    $css = str_replace($leftmargintag, ($replacement+5).'px', $css);
    return $css;
}

function wsi_tafe_set_themecolor($css, $themecolor) {
    $tag = '[[setting:themecolor]]';
    $replacement = $themecolor;
    if (is_null($replacement)) {
        $replacement = '#763172';
    }
    $css = str_replace($tag, $replacement, $css);
    return $css;
}


function wsi_tafe_set_bordercolor($css, $bordercolor) {
    $tag = '[[setting:bordercolor]]';
    $replacement = $bordercolor;
    if (is_null($replacement)) {
        $replacement = '#e4d6e4';
    }
    $css = str_replace($tag, $replacement, $css);
    return $css;
}


/**
 * Sets the custom css variable in CSS
 *
 * @param string $css
 * @param mixed $customcss
 * @return string
 */
function wsi_tafe_set_customcss($css, $customcss) {
    $tag = '[[setting:customcss]]';
    $replacement = $customcss;
    if (is_null($replacement)) {
        $replacement = '';
    }
    $css = str_replace($tag, $replacement, $css);
    return $css;
}