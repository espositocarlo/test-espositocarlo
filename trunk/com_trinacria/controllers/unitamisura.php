<?php 
// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class TrinacriaControllerUnitamisura extends TrinacriaController{
	

function submit(){
	$unitamisura->id_unitamisura = JRequest::getVar('id_unitamisura', null, 'post', 'integer');
	$unitamisura->descrizione = JRequest::getVar('descrizione', null, 'post', 'varchar');
	
	$model = & $this->getModel('Unitamisura', 'TrinacriaModel');

	
	if($model->insertUnitamisura($unitamisura)){
		$this->setRedirect(JRoute::_('index.php?option=com_trinacria&view=unitamisura', false), JText::_('SALVATO!') );
	}else{	
		$this->setRedirect(JRoute::_('index.php?option=com_trinacria&view=unitamisura', false), JText::_('ERRORE!') );			
		}
	}
}

?>