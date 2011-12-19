<?php 
// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class TrinacriaControllerRicetta extends TrinacriaController{
	

function submitProdotto(){
	
	$model = & $this->getModel('Ricetta', 'TrinacriaModel');
	
	
	
	$ricetta->id_prodotto = JRequest::getVar('id_prodotto', null, 'post', 'integer');
	
	
	$this->setRedirect(JRoute::_('index.php?option=com_trinacria&view=ricetta&id_prodotto='.$ricetta->id_prodotto, false), JText::_($msg) );
	}
	

	
function submit(){
	
	$model = & $this->getModel('Ricetta', 'TrinacriaModel');
	
	$ricetta->id_ricetta = JRequest::getVar('id_ricetta', null, 'post', 'integer');
	$ricetta->id_prodotto = JRequest::getVar('id_prodotto', null, 'post', 'integer');
	$ricetta->id_occorrente = JRequest::getVar('id_occorrente', null, 'post', 'integer');
	$ricetta->quantita = JRequest::getVar('quantita', null, 'post', 'integer');
	$ricetta->percentuale_totale = JRequest::getVar('percentuale_totale', null, 'post', 'double(5,2)');
	

	
	if($model->insertRicetta($ricetta)){
		$this->setRedirect(JRoute::_('index.php?option=com_trinacria&view=ricetta&id_prodotto='.$ricetta->id_prodotto, false), JText::_('SALVATO!') );
	}else{	
		$this->setRedirect(JRoute::_('index.php?option=com_trinacria&view=ricetta&id_prodotto='.$ricetta->id_prodotto, false), JText::_('ERRORE!') );			
		}
		
}		
	
}

?>
