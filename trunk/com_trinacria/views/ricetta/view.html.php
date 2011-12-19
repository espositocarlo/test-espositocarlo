<?php 

//codice anti accesso diretto
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

class TrinacriaViewRicetta extends JView{
	
	function display($tpl = null) {
		
		$listaProdotti = $this->get('Prodotto');
		$this->assignRef('listaProdotti', $listaProdotti);
		
		$id_prodottoSelezionato = JRequest::getVar('id_prodotto',null,'get','integer');
		$this->assignRef('id_prodotto', $id_prodottoSelezionato);
		
		$prodottoSelezionato = $this->get('ProdottoByIdProdotto');
		$this->assignRef('prodottoSelezionato', $prodottoSelezionato);
		
		
		$ricettaCompleta = $this->get('Ricetta');
		$this->assignRef('items', $ricettaCompleta);
		
		$listaOccorrenti = $this->get('Occorrente');
		$this->assignRef('listaOccorrenti', $listaOccorrenti);
		
		
		parent::display($tpl);
	}
	
	
}



?>