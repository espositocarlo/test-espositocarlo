<?php 

//codice anti accesso diretto
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

class TrinacriaViewUnitamisura extends JView{
	
	function display($tpl = null) {
		
		$items = $this->get('Unitamisura');
		
		$this->assignRef('items', $items);
		
		
		
		parent::display($tpl);
	}
	
	
}



?>