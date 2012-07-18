<?php

$hasheading = ($PAGE->heading);
$hasnavbar = (empty($PAGE->layout_options['nonavbar']) && $PAGE->has_navbar());
$hasfooter = (empty($PAGE->layout_options['nofooter']));
$hassidepre = $PAGE->blocks->region_has_content('side-pre', $OUTPUT);
$hassidepost = $PAGE->blocks->region_has_content('side-post', $OUTPUT);
$showsidepre = ($hassidepre && !$PAGE->blocks->region_completely_docked('side-pre', $OUTPUT));
$showsidepost = ($hassidepost && !$PAGE->blocks->region_completely_docked('side-post', $OUTPUT));
$custommenu = $OUTPUT->custom_menu();
$hascustommenu = (empty($PAGE->layout_options['nocustommenu']) && !empty($custommenu));

$bodyclasses = array();
if ($showsidepre && !$showsidepost) {
    $bodyclasses[] = 'side-pre-only';
} else if ($showsidepost && !$showsidepre) {
    $bodyclasses[] = 'side-post-only';
} else if (!$showsidepost && !$showsidepre) {
    $bodyclasses[] = 'content-only';
}

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes() ?>>
<head>
    <title><?php echo $PAGE->title ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->pix_url('favicon', 'theme')?>" />
    <meta name="description" content="<?php echo strip_tags(format_text($SITE->summary, FORMAT_HTML)) ?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
</head>

<body id="<?php echo $PAGE->bodyid ?>" class="<?php echo $PAGE->bodyclasses.' '.join(' ', $bodyclasses) ?>">
<?php echo $OUTPUT->standard_top_of_body_html() ?>
        
<div id="page">
<div id="pageinner">

<!-- START OF HEADER -->
    <div id="frontpage-header">
		<div id="page-header-wrapper" class="clearfix">
            <p id="homelink"><a href="<?php echo $CFG->wwwroot; ?>" title="Home">HOME</a></p>
            <div class="profile_box">
            
            	<?php if (isloggedin()) {
                    echo html_writer::tag('div', $OUTPUT->user_picture($USER, array('size'=>25)), array('class'=>'userimg'));
                    echo html_writer::start_tag('div', array('id'=>'userdetails'));
                    echo $OUTPUT->login_info();
                    echo html_writer::end_tag('div');
                } else {						
                    echo html_writer::start_tag('div', array('id'=>'userdetails_loggedout'));
                    $loginlink = html_writer::link(new moodle_url('/login/'), get_string('loginhere', 'theme_wsi_tafe'));
                    echo $OUTPUT->login_info();
                    echo html_writer::end_tag('div');;
                } ?>
                    
	    	</div>
            
            <?php if ($hascustommenu) { ?>
            <div id="custommenu"><div id="custom-menu-wrapper"><?php echo $custommenu; ?></div></div>
			<?php } ?>
        
	    </div>
    </div>
            
<!-- END OF HEADER -->

<!-- START OF CONTENT -->

<div id="page-content-wrapper" class="clearfix">
    <div id="page-content">
        <div id="region-main-box">
            <div id="region-post-box">
            
                <div id="region-main-wrap">
                    <div id="region-main">
                    	<div id="region-main-top"><span></span></div>
                        <div class="region-content">
                            <?php echo core_renderer::MAIN_CONTENT_TOKEN ?>
                        </div>
                        <div id="region-main-btm"><span></span></div>
                    </div>
                </div>
                
                <?php if ($hassidepre) { ?>
                <div id="region-pre" class="block-region">
                    <div class="region-content">
                        <?php echo $OUTPUT->blocks_for_region('side-pre') ?>
                    </div>
                </div>
                <?php } ?>
                
                <?php if ($hassidepost) { ?>
                <div id="region-post" class="block-region">
                    <div class="region-content">
                        <?php echo $OUTPUT->blocks_for_region('side-post') ?>
                    </div>
                </div>
                <?php } ?>
                
            </div>
        </div>
    </div>
    
    <p class="helplink"><?php echo page_doc_link(get_string('moodledocslink')) ?></p>
        
</div>

<!-- END OF CONTENT -->

</div>
</div>

<!-- START OF FOOTER -->
<div id="footer">
<div id="footerwrap">
<div id="footer-right">
<div id="page-footer">
    
    <div id="footnote"><?php echo $PAGE->theme->settings->footnote;?></div>
    
    <?php
    echo $OUTPUT->standard_footer_html();
    ?>
</div>
</div>
</div>
</div>
<!-- END OF FOOTER -->

<?php echo $OUTPUT->standard_end_of_body_html() ?>
</body>
</html>