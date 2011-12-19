<?php 
//codice anti accesso diretto
defined('_JEXEC') or die('Restricted access');


require (JPATH_COMPONENT.DS.'helpers'.DS.'magazzino.php');


MagazzinoHelper::displayHome();

MagazzinoHelper::displayCSSTableHor();

MagazzinoHelper::displayMagazzinoForm($this->listaOccorrenti, $this->listaFornitori);

MagazzinoHelper::displayMagazzinoTable($this->items, $this->listaOccorrenti, $this->listaFornitori);

?>