<?php

if (false){
	
	/**
	 * change the radio button from the check box of the term post screen
	 */
	class Atomita_Wordpress_Walker_RadioButtonTerms extends Walker_Category_Checklist
	{

		function start_el(&$output, $category, $depth = 0, $args = array(), $id = 0){}

	}

}
else{
	$file		= dirname(__FILE__) . DIRECTORY_SEPARATOR . str_replace('_', DIRECTORY_SEPARATOR, basename(__FILE__));
	$definition = ltrim(file_get_contents($file), '<?php');

	eval(str_replace(
		array(
			'namespace Atomita\\Wordpress\\Walker;',
			'class RadioButtonTerms extends \Walker_Category_Checklist',
		),
		array(
			'',
			'class Atomita_Wordpress_Walker_RadioButtonTerms extends Walker_Category_Checklist',
		),
		$definition));
}
