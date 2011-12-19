<?php 
// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class TrinacriaControllerRigaprogramma extends TrinacriaController{

	
	function callDettaglio(){
		$model = & $this->getModel('Rigaprogramma', 'TrinacriaModel');
		$id_programma = JRequest::getVar('id_programma', null, 'get', 'integer');
		$this->setRedirect(JRoute::_('index.php?option=com_trinacria&view=programma&layout=dettaglio&id_programma='.$id_programma, false));
	}

function submit(){
	
	$model = & $this->getModel('Rigaprogramma', 'TrinacriaModel');
	
	
	$rigaProgramma->id_riga_programma = JRequest::getVar('id_riga_programma', null, 'post', 'integer');
	$rigaProgramma->id_programma = JRequest::getVar('id_programma', null, 'post', 'integer');
	$rigaProgramma->id_prodotto = JRequest::getVar('id_prodotto', null, 'post', 'integer');
	$rigaProgramma->quantita_da_produrre = JRequest::getVar('quantita_da_produrre', null, 'post', 'integer');
	$rigaProgramma->tempo_produzione = JRequest::getVar('tempo_produzione', null, 'post', 'varchar');
	$rigaProgramma->stato = JRequest::getVar('stato', null, 'post', 'varchar');
	
	
	
	
	if($model->insertRigaprogramma($rigaProgramma)){
		$this->setRedirect(JRoute::_('index.php?option=com_trinacria&view=programma&layout=dettaglio&id_programma='.$rigaProgramma->id_programma, false), JText::_('SALVATO!') );
	}else{	
		$this->setRedirect(JRoute::_('index.php?option=com_trinacria&view=programma&layout=dettaglio&id_programma='.$rigaProgramma->id_programma, false), JText::_('ERRORE!') );			
		}
		
	
	}
	
function delete(){
	
	$model = & $this->getModel('Rigaprogramma', 'TrinacriaModel');
	$id_programma = JRequest::getVar('id_programma', null, 'get', 'integer');
	
	if($model->deleteRigaprogramma()){
		$this->setRedirect(JRoute::_('index.php?option=com_trinacria&view=programma&layout=dettaglio&id_programma='.$id_programma, false), JText::_('ELIMINATO!') );
	}else{	
		$this->setRedirect(JRoute::_('index.php?option=com_trinacria&view=programma&layout=dettaglio&id_programma='.$id_programma, false), JText::_('ERRORE!') );			
		}
		
	
	}
}

?>
