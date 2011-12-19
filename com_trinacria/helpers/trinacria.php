<?php

//codice anti accesso diretto
defined('_JEXEC') or die('Restricted access');

class TrinacriaHelper{
	
	function displayHome() {
	echo	'<div class="componentheading">'; 
	echo JText::_('Trinacria Manager');
	echo '</div>'; 
		
	}
	
	
}

?>