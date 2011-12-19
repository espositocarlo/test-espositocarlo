<?php 
// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class TrinacriaControllerRicettainversa extends TrinacriaController{
	

function submit(){
	
	$model = & $this->getModel('Ricettainversa', 'TrinacriaModel');
	
	
	
	$ricettainversa->id_ricetta_inversa = JRequest::getVar('id_ricetta_inversa', null, 'post', 'integer');
	$ricettainversa->id_prodotto = JRequest::getVar('id_prodotto', null, 'post', 'integer');
	$ricettainversa->descrizione = JRequest::getVar('descrizione', null, 'post', 'varchar');
	$ricettainversa->data_inserimento = JRequest::getVar('data_inserimento', null, 'post', 'date');
	$ricettainversa->quantita_prodotto = JRequest::getVar('quantita_prodotto', null, 'post', 'varchar');
	
	
	
	if($model->insertRicettainversa($ricettainversa)){
		$this->setRedirect(JRoute::_('index.php?option=com_trinacria&view=ricettainversa', false), JText::_('SALVATO!') );
	}else{	
		$this->setRedirect(JRoute::_('index.php?option=com_trinacria&view=ricettainversa', false), JText::_('ERRORE!') );			
		}
		
	
	}
	
function delete(){
	
	$model = & $this->getModel('Ricettainversa', 'TrinacriaModel');
	
	
	if($model->deleteRicettainversa()){
		$this->setRedirect(JRoute::_('index.php?option=com_trinacria&view=ricettainversa', false), JText::_('ELIMINATO!') );
	}else{	
		$this->setRedirect(JRoute::_('index.php?option=com_trinacria&view=ricettainversa', false), JText::_('ERRORE!') );			
		}
		
	
	}
}

?>
