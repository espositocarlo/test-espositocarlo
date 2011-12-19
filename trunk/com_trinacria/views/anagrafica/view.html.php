<?php 

//codice anti accesso diretto
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

class TrinacriaViewAnagrafica extends JView{
	
	function display($tpl = null) {
		
		$items = $this->get('Anagrafica');
		$this->assignRef('items', $items);
		
		$tipoAnagrafica = $this->get('TipoAnagrafica');
		$this->assignRef('tipoAnagrafica', $tipoAnagrafica);
		
		parent::display($tpl);
	}
	
	
}



?>