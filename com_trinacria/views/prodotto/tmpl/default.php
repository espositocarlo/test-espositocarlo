<?php 
//codice anti accesso diretto
defined('_JEXEC') or die('Restricted access');


require (JPATH_COMPONENT.DS.'helpers'.DS.'prodotto.php');


ProdottoHelper::displayHome();

ProdottoHelper::displayCSSTableHor();

ProdottoHelper::displayProdottoForm();

ProdottoHelper::displayProdottoTable($this->items);

?>