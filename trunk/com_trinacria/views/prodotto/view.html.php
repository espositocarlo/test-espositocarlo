<?php 

//codice anti accesso diretto
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

class TrinacriaViewProdotto extends JView{
	
	function display($tpl = null) {
		
		$items = $this->get('Prodotto');
		$this->assignRef('items', $items);
		
		
		parent::display($tpl);
	}
	
	
}



?>