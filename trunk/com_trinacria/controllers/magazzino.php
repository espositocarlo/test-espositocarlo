<?php 
// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class TrinacriaControllerMagazzino extends TrinacriaController{
	

function submit(){
	
	$model = & $this->getModel('Magazzino', 'TrinacriaModel');
	
	
	
	$merce->id_merce = JRequest::getVar('id_merce', null, 'post', 'integer');
	$merce->id_occorrente = JRequest::getVar('id_occorrente', null, 'post', 'integer');
	$disponibilita = JRequest::getVar('disponibilita', null, 'post', 'double(15,1)');
	$datiOccorrenteSel = JRequest::getVar('datiOccorrenteSelezionato', null, 'post', 'varchar');
	if($datiOccorrenteSel != null){
	list($merce->id_occorrente, $disponibilita_default) = explode('|', $datiOccorrenteSel);
	}
	
	if($disponibilita == null){
		$merce->disponibilita = $disponibilita_default; 
	}else{
		$merce->disponibilita = $disponibilita;
	}
	$merce->scadenza = JRequest::getVar('scadenza', null, 'post', 'date');
	$merce->lotto = JRequest::getVar('lotto', null, 'post', 'varchar');
	$merce->costo = JRequest::getVar('costo', null, 'post', 'double(15,2)');
	$merce->id_fornitore = JRequest::getVar('id_fornitore', null, 'post', 'integer');
	$merce->data_bolla = JRequest::getVar('data_bolla', null, 'post', 'date');
	$merce->numero_bolla = JRequest::getVar('numero_bolla', null, 'post', 'varchar');
	$merce->note = JRequest::getVar('note', null, 'post', 'varchar');
	
	
	/*
	//$merce->data_scarico = JRequest::getVar('data_scarico', null, 'post', 'date');
	//controlli al ricevimento
	$merce->condizione = JRequest::getVar('condizione', null, 'post', 'varchar');
	$merce->integrita = JRequest::getVar('integrita', null, 'post', 'varchar');
	$merce->temperatura = JRequest::getVar('temperatura', null, 'post', 'varchar');
	$merce->accettazione = JRequest::getVar('accettazione', null, 'post', 'varchar');
	$merce->disposizione = JRequest::getVar('disposizione', null, 'post', 'varchar');
	*/
	if($model->insertMagazzino($merce)){
		$this->setRedirect(JRoute::_('index.php?option=com_trinacria&view=magazzino', false), JText::_('SALVATO!') );
	}else{	
		$this->setRedirect(JRoute::_('index.php?option=com_trinacria&view=magazzino', false), JText::_('ERRORE!') );			
		}
		
	
	}
}

?>
