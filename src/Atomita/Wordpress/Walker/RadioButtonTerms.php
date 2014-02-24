<?php

namespace Atomita\Wordpress\Walker;

/**
 * change the radio button from the check box of the term post screen
 */
class RadioButtonTerms extends \Walker_Category_Checklist {

	var $taxonomy	   = null;
	var $checked_ontop = true;

	function start_el(&$output, $category, $depth = 0, $args = array(), $id = 0)
	{
		parent::start_el($output, $category, $depth, $args, $id);

		$output = preg_replace('/ type="checkbox" /u', ' type="radio" ', $output);
	}
	
	static function regist($taxonomy = 'category', $checked_ontop = false, $priority = 10)
	{
		$that = new static();
		$that->taxonomy	 = $taxonomy;
		$that->checked_ontop = $checked_ontop;
		
		add_filter('wp_terms_checklist_args', array($that, 'wp_terms_checklist_args'), $priority, 2);
	}

	function wp_terms_checklist_args($args, $post_id = null)
	{
		if ($this->taxonomy == $args['taxonomy']){
			$args['checked_ontop'] = $this->checked_ontop;
			$args['walker']	   = $this;
		}
		
		return $args;
	}

}
