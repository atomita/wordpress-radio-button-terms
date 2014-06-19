<?php

namespace atomita\wordpress;

/**
 * change the radio button from the check box of the term post screen
 */
class RadioButtonTerms
{

	protected $taxonomy	 = null;
	protected $checked_ontop = true;
	protected $priority	 = 10;
	protected $registered	 = false;

	/**
	 * @param	$taxonomy	string	
	 * @param	$checked_ontop	boolean	
	 * @param	$priority	integer	
	 */
	function __construct($taxonomy = 'category', $checked_ontop = false, $priority = 10)
	{
		$this->taxonomy	 = $taxonomy;
		$this->checked_ontop = $checked_ontop;
		$this->priority	 = $priority;
	}
	
	/**
	 * add "wp_terms_checklist_args" filter
	 */
	function initialize()
	{
		if (!$this->registered){
			$this->registered	 = true;
			add_filter('wp_terms_checklist_args', array($this, 'wp_terms_checklist_args'), $this->priority, 2);
		}
		return $this;
	}

	/**
	 * remove "wp_terms_checklist_args" filter
	 */
	function uninitialize()
	{
		if ($this->registered){
			$this->registered = false;
			remove_filter('wp_terms_checklist_args', array($this, 'wp_terms_checklist_args'), $this->priority, 2);
		}
		return $this;
	}

	/**
	 * called from "wp_terms_checklist_args" filter
	 */
	function wp_terms_checklist_args($args, $post_id = null)
	{
		if ($this->taxonomy == $args['taxonomy']){
			$args['checked_ontop'] = $this->checked_ontop;
			$args['walker']	   = new walker\RadioButtonTerms();
		}
		
		return $args;
	}

}
