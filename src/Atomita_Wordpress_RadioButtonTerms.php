<?php

if (false){
	
	/**
	 * change the radio button from the check box of the term post screen
	 */
	class Atomita_Wordpress_RadioButtonTerms
	{

		/**
		 * @param	$taxonomy	string	
		 * @param	$checked_ontop	boolean	
		 * @param	$priority	integer	
		 */
		function __construct($taxonomy = 'category', $checked_ontop = false, $priority = 10){}
	
		/**
		 * add "wp_terms_checklist_args" filter
		 */
		function initialize(){}

		/**
		 * remove "wp_terms_checklist_args" filter
		 */
		function uninitialize(){}

		/**
		 * called from "wp_terms_checklist_args" filter
		 */
		function wp_terms_checklist_args($args, $post_id = null){}

	}

}
else{
	$file		= dirname(__FILE__) . DIRECTORY_SEPARATOR . str_replace('_', DIRECTORY_SEPARATOR, basename(__FILE__));
	$definition = ltrim(file_get_contents($file), '<?php');

	eval(str_replace(
		array(
			'namespace Atomita\\Wordpress;',
			'class RadioButtonTerms',
			'new Walker\\RadioButtonTerms()',
		),
		array(
			'',
			'class Atomita_Wordpress_RadioButtonTerms',
			'new Atomita_Wordpress_Walker_RadioButtonTerms()',
		),
		$definition));
}
