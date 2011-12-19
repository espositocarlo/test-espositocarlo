<?php 

//codice anti accesso diretto
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

class TrinacriaViewRicettainversa extends JView{
	
	function display($tpl = null) {
		
		$items = $this->get('Ricettainversa');		
		$this->assignRef('items', $items);
		
		$listaProdotti = $this->get('Prodotti');
	 	$this->assignRef('listaProdotti', $listaProdotti);
		
		$id_ricetta_inversa = JRequest::getVar('id_ricetta_inversa', null, 'get', 'integer');
		if($id_ricetta_inversa){
		
		$ricettainversaSel = $this->get('RicettainversaById');
	 	$this->assignRef('ricettainversa', $ricettainversaSel);
	 	
	 	$listaMerce = $this->get('Merce');
	 	$this->assignRef('listaMerce', $listaMerce);
	 	
	 	
	 	$items_dett = $this->get('RicettainversaCompleta');
	 	$this->assignRef('items_dett', $items_dett);
	}
	
	
		
		parent::display($tpl);
	}
	
	
}



?>