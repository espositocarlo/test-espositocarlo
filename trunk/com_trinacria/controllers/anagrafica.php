<?php 
// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class TrinacriaControllerAnagrafica extends TrinacriaController{
	

function submit(){
	
	$model = & $this->getModel('Anagrafica', 'TrinacriaModel');
	
	$anagrafica->id_anagrafica = JRequest::getVar('id_anagrafica', null, 'post', 'integer');
	$anagrafica->id_tipo_anagrafica = JRequest::getVar('id_tipo_anagrafica', null, 'post', 'integer');
	
	$anagrafica->nominativo = JRequest::getVar('nominativo', null, 'post', 'varchar');
	$anagrafica->partita_iva = JRequest::getVar('partita_iva', null, 'post', 'varchar');
	$anagrafica->codice_fiscale = JRequest::getVar('codice_fiscale', null, 'post', 'varchar');
	
	$anagrafica->indirizzo = JRequest::getVar('indirizzo', null, 'post', 'varchar');
	$anagrafica->recapiti = JRequest::getVar('recapiti', null, 'post', 'varchar');
	$anagrafica->email = JRequest::getVar('email', null, 'post', 'varchar');
	$anagrafica->note = JRequest::getVar('note', null, 'post', 'varchar');
	 
	 
	
	
	if($model->insertAnagrafica($anagrafica)){
		$this->setRedirect(JRoute::_('index.php?option=com_trinacria&view=anagrafica', false), JText::_('SALVATO!') );
	}else{	
		$this->setRedirect(JRoute::_('index.php?option=com_trinacria&view=anagrafica', false), JText::_('ERRORE!') );			
		}
		
	
	}
}

?>
