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
    
    <div class="footer_column">
        <h2>Enrolling</h2>
        <ul>
            <li><a href="http://wsi.tafensw.edu.au/enrolling/application-process/">Application Process</a></li>
        
            <li><a href="http://wsi.tafensw.edu.au/courses-and-careers/course-enquiries/">Course Enquiry</a></li>
        
            <li><a href="http://wsi.tafensw.edu.au/courses-and-careers/course-vacancies/">Course Vacancies</a></li>
        
            <li><a href="http://wsi.tafensw.edu.au/enrolling/how-to-enrol/">How to Enrol</a></li>
        
            <li><a href="http://wsi.tafensw.edu.au/enrolling/fees-and-financial-assistance/paying-for-your-course/">Paying for Your Course</a></li>
        
            <li><a href="http://wsi.tafensw.edu.au/courses-and-careers/special-promotions/">Special Promotions</a></li>
        
            <li><a href="http://wsi.tafensw.edu.au/enrolling/fees-and-financial-assistance/vet-fee-help-student-loans/">VET FEE-HELP</a></li>
        </ul>
    </div>

    <div class="footer_column">
        <h2>Colleges</h2>
        <ul>
            <li><a href="http://wsi.tafensw.edu.au/colleges-and-specialist-centres/blacktown/">Blacktown</a></li>
        
            <li><a href="http://wsi.tafensw.edu.au/colleges-and-specialist-centres/blue-mountains/">Blue Mountains</a></li>
        
            <li><a href="http://wsi.tafensw.edu.au/colleges-and-specialist-centres/mount-druitt/">Mount Druitt</a></li>
        
            <li><a href="http://wsi.tafensw.edu.au/colleges-and-specialist-centres/nepean/">Nepean</a></li>
        
            <li><a href="http://wsi.tafensw.edu.au/colleges-and-specialist-centres/nirimba/">Nirimba</a></li>
        
            <li><a href="http://wsi.tafensw.edu.au/colleges-and-specialist-centres/richmond/">Richmond</a></li>
        
            <li><a href="http://wsi.tafensw.edu.au/colleges-and-specialist-centres/the-hills/">The Hills</a></li>
        
            <li><a href="http://wsi.tafensw.edu.au/colleges-and-specialist-centres/oten/">OTEN</a></li>
        
            <li><a href="http://wsi.tafensw.edu.au/colleges-and-specialist-centres/specialist-centres/">Specialist Centres</a></li>
        </ul>
    </div>

    <div class="footer_column">
        <h2>Students Services</h2>
        <ul>
            <li><a href="http://wsi.tafensw.edu.au/students/support-services/counselling-and-careers/">Counselling &amp; Careers</a></li>
        
            <li><a href="http://wsi.tafensw.edu.au/students/support-services/disabilities-support/">Disability Support</a></li>
        
            <li><a href="http://wsi.tafensw.edu.au/students/support-services/indigenous-students/">Indigenous Students</a></li>
        
            <li><a href="http://wsilibraries.tafensw.edu.au">Library Services</a></li>
        
            <li><a href="http://wsi.tafensw.edu.au/students/students/">Online Learning</a></li>
        </ul>
    </div>

    <div class="footer_column">
        <h2>About WSI</h2>
        <ul>
            <li><a href="http://wsi.tafensw.edu.au/about-wsi/news-and-media-centre/calendar-of-events/">Calendar</a></li>
        
            <li><a href="http://wsi.tafensw.edu.au/students/students/public-transport/">How to Find Us</a></li>
        
            <li><a href="http://wsi.tafensw.edu.au/about-wsi/about-us/jobs/">Jobs@wsi</a></li>
        
            <li><a href="http://wsi.tafensw.edu.au/about-wsi/news-and-media-centre/">News and Media Centre</a></li>
        
            <li><a href="http://www.mywsi.com.au" target="_blank">myWSI.com.au</a></li>
        
            <li><a href="http://wsi.tafensw.edu.au/about-wsi/publications-and-reports/accessibility/">Accessibility</a></li>
        
            <li><a href="http://wsi.tafensw.edu.au/about-wsi/publications-and-reports/copyright-and-disclaimer/">Copyright</a></li>
        
            <li><a href="http://wsi.tafensw.edu.au/about-wsi/publications-and-reports/access-to-information/">Privacy</a></li>
        
            <li><a href="http://wsi.tafensw.edu.au/sitemap.aspx">Site Map</a></li>
        </ul>
    </div>
                    
                    
    <div style=" width:300px; float:right; padding-right:20px" class="footer_column"> 

      <div style="float:left; margin-top:10px" id="sociallinks">
	        <ul>
	            <li><a target="_blank" href="http://www.facebook.com/tafewsi"><img style="border:0;height:20px;vertical-align:middle;width:20px;" alt="WSI Facebook" src="<?php echo $OUTPUT->pix_url('facebook', 'theme')?>" /></a> <a target="_blank" href="http://www.youtube.com/user/tafewsi">Facebook</a></li>
	            <li><a target="_blank" href="http://twitter.com/wsitafe"><img style="border:0;height:20px;vertical-align:middle;width:20px;" alt="WSI Twitter" src="<?php echo $OUTPUT->pix_url('twitter', 'theme')?>" /></a> <a target="_blank" href="http://twitter.com/wsitafe">Twitter</a></li>
	            <li><a target="_blank" href="http://www.youtube.com/user/tafewsi"><img style="border:0;height:20px;vertical-align:middle;width:20px;" alt="WSI YouTube" src="<?php echo $OUTPUT->pix_url('youtube', 'theme')?>" /></a> <a target="_blank" href="http://www.youtube.com/user/tafewsi">YouTube</a></li>
	            <li><a target="_blank" href="http://wsipers.wordpress.com/"><img style="border:0;height:20px;vertical-align:middle;width:20px;" alt="WSI Blog" src="<?php echo $OUTPUT->pix_url('blog', 'theme')?>" /></a> <a target="_blank" href="http://wsipers.wordpress.com/">WSI Blog</a></li>
	        </ul>
	   </div>
				
        <div style="float:right; font-size:12px; margin-top:0px" id="contactinfo">
            <p><strong>Western Sydney Institute</strong><br>2-10 O'Connell St<br>Kingswood NSW 2747</p>
            <p><strong>131 870</strong><br>(to contact colleges)</p>
            <p><strong>(02) 9208 9999</strong><br>(interstate callers)</p>
        </div>

    </div>
    
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