<?php 
//codice anti accesso diretto
defined('_JEXEC') or die('Restricted access');


require (JPATH_COMPONENT.DS.'helpers'.DS.'ricettainversa.php');



RicettainversaHelper::displayHome();

RicettainversaHelper::displayCSSTableHor();

RicettainversaHelper::displayRicettainversaForm($this->listaProdotti);

RicettainversaHelper::displayRicettainversaTable($this->items, $this->listaProdotti);

?>