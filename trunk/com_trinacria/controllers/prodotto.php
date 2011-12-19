<?php 
// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class TrinacriaControllerProdotto extends TrinacriaController{
	

function submit(){
	
	$model = & $this->getModel('Prodotto', 'TrinacriaModel');
	
	
	
	$prodotto->id_prodotto = JRequest::getVar('id_prodotto', null, 'post', 'integer');
	$prodotto->nome = JRequest::getVar('nome', null, 'post', 'varchar'); 
	$prodotto->unita_vendita = JRequest::getVar('unita_vendita', null, 'post', 'integer');
	$prodotto->lotto_parte_fissa = JRequest::getVar('lotto_parte_fissa', null, 'post', 'varchar');
	$prodotto->dimensione_cartone = JRequest::getVar('dimensione_cartone', null, 'post', 'varchar');
	$prodotto->note = JRequest::getVar('note', null, 'post', 'varchar');
	
	
	if($model->insertProdotto($prodotto)){
		$this->setRedirect(JRoute::_('index.php?option=com_trinacria&view=prodotto', false), JText::_('SALVATO!') );
	}else{	
		$this->setRedirect(JRoute::_('index.php?option=com_trinacria&view=prodotto', false), JText::_('ERRORE!') );			
		}
		
	
	}
}

?>
