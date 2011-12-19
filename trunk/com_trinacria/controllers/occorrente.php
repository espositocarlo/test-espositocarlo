<?php 
// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class TrinacriaControllerOccorrente extends TrinacriaController{
	

function submit(){
	$occorrente->id_occorrente = JRequest::getVar('id_occorrente', null, 'post', 'integer');
	$occorrente->id_unitamisura = JRequest::getVar('id_unitamisura', null, 'post', 'integer');
	$occorrente->descrizione = JRequest::getVar('descrizione', null, 'post', 'varchar');
	$occorrente->quantita = JRequest::getVar('quantita', null, 'post', 'integer');
//	$occorrente->note = JRequest::getVar('note', null, 'post', 'varchar');
	
	$model = & $this->getModel('Occorrente', 'TrinacriaModel');
	
	if($model->insertOccorrente($occorrente)){
		$this->setRedirect(JRoute::_('index.php?option=com_trinacria&view=occorrente', false), JText::_('SALVATO!') );
	}else{	
		$this->setRedirect(JRoute::_('index.php?option=com_trinacria&view=occorrente', false), JText::_('ERRORE!') );			
		}
	}
}

?>
