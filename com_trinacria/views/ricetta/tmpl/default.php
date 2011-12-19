<?php 
//codice anti accesso diretto
defined('_JEXEC') or die('Restricted access');


require (JPATH_COMPONENT.DS.'helpers'.DS.'ricetta.php');
RicettaHelper::displayCSSTableHor();

RicettaHelper::displayHome();

RicettaHelper::displaySelezionaProdotto($this->listaProdotti, $this->prodottoSelezionato);



RicettaHelper::displayRicettaForm($this->listaOccorrenti, $this->prodottoSelezionato);

RicettaHelper::displayRicettaTable($this->items, $this->prodottoSelezionato);

?>