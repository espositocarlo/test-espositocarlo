<?php 
// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class TrinacriaControllerRigaricettainversa extends TrinacriaController{

	
	function callDettaglio(){
		$model = & $this->getModel('Rigaricettainversa', 'TrinacriaModel');
		$id_ricetta_inversa = JRequest::getVar('id_ricetta_inversa', null, 'get', 'integer');
		$this->setRedirect(JRoute::_('index.php?option=com_trinacria&view=ricettainversa&layout=dettaglio&id_ricetta_inversa='.$id_ricetta_inversa, false));
	}

function submit(){
	
	$model = & $this->getModel('Rigaricettainversa', 'TrinacriaModel');
	$rigaricettainversa->id_ricetta_inversa = JRequest::getVar('id_ricetta_inversa', null, 'post', 'integer');
	$rigaricettainversa->id_riga_ricetta_inversa = JRequest::getVar('id_riga_ricetta_inversa', null, 'post', 'integer');
	$rigaricettainversa->id_merce = JRequest::getVar('id_merce', null, 'post', 'integer');
	$percentuale_merce = JRequest::getVar('percentuale_merce', null, 'post', 'double(15,3)');	
	$quantita = JRequest::getVar('quantita_merce', null, 'post', 'double(15,3)');
	$quantita = str_replace(',', '.', $quantita);
  	$rigaricettainversa->quantita_merce = $quantita;
	
	
	
	if($model->insertRigaricettainversa($rigaricettainversa)){
		$listaIngredientiPresenti = $model->getIngredientiPresenti($rigaricettainversa);	
		$totale_quantita = $model->getTotaleQuantita($rigaricettainversa);
		
	for($i=0; $i <count($listaIngredientiPresenti); $i++){
				
	if($totale_quantita->totale_quantita==null){
		
			$percentuale = 100;		
		}else{
		
			$somma_totale = $totale_quantita->totale_quantita;
			$divisione = $listaIngredientiPresenti[$i]->quantita_merce/$somma_totale;
			$percentuale = $divisione*100;
		
	}
	
	$listaIngredientiPresenti[$i]->percentuale_merce = $percentuale;
	if($model->insertRigaricettainversa($listaIngredientiPresenti[$i])){
		
	}else{
		$this->setRedirect(JRoute::_('index.php?option=com_trinacria&view=ricettainversa&layout=dettaglio&id_ricetta_inversa='.$rigaricettainversa->id_ricetta_inversa, false), JText::_('ERRORE AGGIORNAMENTO!') );
	}
	}
		
		$this->setRedirect(JRoute::_('index.php?option=com_trinacria&view=ricettainversa&layout=dettaglio&id_ricetta_inversa='.$rigaricettainversa->id_ricetta_inversa.'&s_t='.$somma_totale, false), JText::_('SALVATO!') );
	}else{	
		$this->setRedirect(JRoute::_('index.php?option=com_trinacria&view=ricettainversa&layout=dettaglio&id_ricetta_inversa='.$rigaricettainversa->id_ricetta_inversa, false), JText::_('ERRORE!') );			
		}
		
	
	}
	
	
function delete(){
	
	$model = & $this->getModel('Rigaricettainversa', 'TrinacriaModel');
	$id_ricetta_inversa = JRequest::getVar('id_ricetta_inversa', null, 'get', 'integer');
	
	if($model->deleteRigaricettainversa()){
		$this->setRedirect(JRoute::_('index.php?option=com_trinacria&view=ricettainversa&layout=dettaglio&id_ricetta_inversa='.$id_ricetta_inversa, false), JText::_('ELIMINATO!') );
	}else{	
		$this->setRedirect(JRoute::_('index.php?option=com_trinacria&view=ricettainversa&layout=dettaglio&id_ricetta_inversa='.$id_ricetta_inversa, false), JText::_('ERRORE!') );			
		}
		
	
	}
	
}

?>
