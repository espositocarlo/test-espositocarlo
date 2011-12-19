<?php 

//codice anti accesso diretto
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

class TrinacriaViewMagazzino extends JView{
	
	function display($tpl = null) {
		
		$items = $this->get('Magazzino');
		
		$this->assignRef('items', $items);
		
		
		$listaOccorrenti = $this->get('Occorrente');
		$this->assignRef('listaOccorrenti', $listaOccorrenti);
		
		$listaFornitori = $this->get('Fornitori');
		$this->assignRef('listaFornitori', $listaFornitori);
		
		
		parent::display($tpl);
	}
	
	
}



?>