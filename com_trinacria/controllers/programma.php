<?php 
// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class TrinacriaControllerProgramma extends TrinacriaController{
	

function submit(){
	
	$model = & $this->getModel('Programma', 'TrinacriaModel');
	
	
	
	$programma->id_programma = JRequest::getVar('id_programma', null, 'post', 'integer');
	$programma->descrizione = JRequest::getVar('descrizione', null, 'post', 'varchar');
	$programma->data_inserimento = JRequest::getVar('data_inserimento', null, 'post', 'date');
	$programma->data_consegna = JRequest::getVar('data_consegna', null, 'post', 'date');	
	$programma->stato_programma = JRequest::getVar('stato_programma', null, 'post', 'varchar');
	
	
	
	if($model->insertProgramma($programma)){
		$this->setRedirect(JRoute::_('index.php?option=com_trinacria&view=programma', false), JText::_('SALVATO!') );
	}else{	
		$this->setRedirect(JRoute::_('index.php?option=com_trinacria&view=programma', false), JText::_('ERRORE!') );			
		}
		
	
	}
	
function delete(){
	
	$model = & $this->getModel('Programma', 'TrinacriaModel');
	
	
	if($model->deleteProgramma()){
		$this->setRedirect(JRoute::_('index.php?option=com_trinacria&view=programma', false), JText::_('ELIMINATO!') );
	}else{	
		$this->setRedirect(JRoute::_('index.php?option=com_trinacria&view=programma', false), JText::_('ERRORE!') );			
		}
		
	
	}

	
}

?>
