<?php 

//codice anti accesso diretto
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

class TrinacriaViewOccorrente extends JView{
	
	function display($tpl = null) {
		
		$items = $this->get('Occorrente');
		
		$this->assignRef('items', $items);
		
		
		$uDm = $this->get('Unitamisura');
		$this->assignRef('uDm', $uDm);
		
		parent::display($tpl);
	}
	
	
}



?>