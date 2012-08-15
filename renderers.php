<?php

class theme_wsi_tafe_core_renderer extends core_renderer {

    /**
     * Renders a custom menu object (located in outputcomponents.php)
     *
     * The custom menu this method override the render_custom_menu function
     * in outputrenderers.php
     * @staticvar int $menucount
     * @param custom_menu $menu
     * @return string
     */
    protected function render_custom_menu(custom_menu $menu) {

		// Generate custom My Courses dropdown
        $mycourses = $this->page->navigation->get('mycourses');
		$mycoursetitle = $this->page->theme->settings-> mycoursetitle;

		if (isloggedin() && $mycourses && $mycourses->has_children()) {
            $branchurl   = new moodle_url('/my/index.php');
            $branchsort  = 10000;

			if ($mycoursetitle == 'module') {
				$branchlabel = get_string('mymodules', 'theme_wsi_tafe');
			} else if ($mycoursetitle == 'unit') {
				$branchlabel = get_string('myunits', 'theme_wsi_tafe');
			} else if ($mycoursetitle == 'class') {
				$branchlabel = get_string('myclasses', 'theme_wsi_tafe');
			} else {
				$branchlabel = get_string('mycourses', 'theme_wsi_tafe');
			}

			$branchtitle = $branchlabel;
 
            $branch = $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);
 
            foreach ($mycourses->children as $coursenode) {
                $branch->add($coursenode->get_content(), $coursenode->action, $coursenode->get_title());
            }

        } else {
        	if ($mycoursetitle == 'module') {
				$branchlabel = get_string('allmodules', 'theme_wsi_tafe');
			} else if ($mycoursetitle == 'unit') {
				$branchlabel = get_string('allunits', 'theme_wsi_tafe');
			} else if ($mycoursetitle == 'class') {
				$branchlabel = get_string('allclasses', 'theme_wsi_tafe');
			} else {
				$branchlabel = get_string('allcourses', 'theme_wsi_tafe');
			}

			$branchtitle = $branchlabel;
            $branchurl   = new moodle_url('/course/index.php');
            $branchsort  = 10000;
            $branch = $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);  
        }

		

		// If the menu has no children return an empty string
        if (!$menu->has_children()) {
            return '';
        }

        // Initialise this custom menu
        $content = html_writer::start_tag('ul', array('class'=>'dropdown dropdown-horizontal'));
        // Render each child
        foreach ($menu->get_children() as $item) {
            $content .= $this->render_custom_menu_item($item);
        }
        // Close the open tags
        $content .= html_writer::end_tag('ul');
        // Return the custom menu
        return $content;
    }

    /**
     * Renders a custom menu node as part of a submenu
     *
     * The custom menu this method override the render_custom_menu_item function
     * in outputrenderers.php
     *
     * @see render_custom_menu()
     *
     * @staticvar int $submenucount
     * @param custom_menu_item $menunode
     * @return string
     */
    protected function render_custom_menu_item(custom_menu_item $menunode) {
        // Required to ensure we get unique trackable id's
        static $submenucount = 0;
        $content = html_writer::start_tag('li');
        if ($menunode->has_children()) {
            // If the child has menus render it as a sub menu
            $submenucount++;
            if ($menunode->get_url() !== null) {
                $url = $menunode->get_url();
            } else {
                $url = '#cm_submenu_'.$submenucount;
            }
            $content .= html_writer::start_tag('span', array('class'=>'customitem'));
            $content .= html_writer::link($url, $menunode->get_text(), array('title'=>$menunode->get_title()));
            $content .= html_writer::end_tag('span');
            $content .= html_writer::start_tag('ul');
            foreach ($menunode->get_children() as $menunode) {
                $content .= $this->render_custom_menu_item($menunode);
            }
            $content .= html_writer::end_tag('ul');
        } else {
            // The node doesn't have children so produce a final menuitem

            if ($menunode->get_url() !== null) {
                $url = $menunode->get_url();
            } else {
                $url = '#';
            }
            $content .= html_writer::link($url, $menunode->get_text(), array('title'=>$menunode->get_title()));
        }
        $content .= html_writer::end_tag('li');
        // Return the sub menu
        return $content;
    }
}