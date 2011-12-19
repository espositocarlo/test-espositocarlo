<?php 

//codice anti accesso diretto
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

class TrinacriaViewProgramma extends JView{
	
	
	function display($tpl = null) {
		
		$items = $this->get('Programma');		
		$this->assignRef('items', $items);
		
		$id_programma = JRequest::getVar('id_programma', null, 'get', 'integer');
		if($id_programma){
		
		$programmaSel = $this->get('ProgrammaById');
	 	$this->assignRef('programma', $programmaSel);
	 	
	 	$listaProdotti = $this->get('Prodotto');
	 	$this->assignRef('listaProdotti', $listaProdotti);
	 	
	 	$items_dett = $this->get('ProgrammaCompleto');
	 	$this->assignRef('items_dett', $items_dett);
	 	
		}
	 	
		
		parent::display($tpl);
	}
	
	
}



?>