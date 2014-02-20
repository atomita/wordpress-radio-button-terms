<?php

/**
 * change the radio button from the check box of the term post screen
 */
class Atomita_Wordpress_Walker_RadioButtonTerms extends Walker_Category_Checklist {

	function start_el(&$output, $category, $depth = 0, $args = array(), $id = 0){
		parent::start_el($output, $category, $depth, $args, $id);

		$output = preg_replace('/ type="checkbox" /u', ' type="radio" ', $output);
	}

}

