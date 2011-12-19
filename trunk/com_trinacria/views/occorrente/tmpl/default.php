<?php 
//codice anti accesso diretto
defined('_JEXEC') or die('Restricted access');


require (JPATH_COMPONENT.DS.'helpers'.DS.'occorrente.php');


OccorrenteHelper::displayHome();

OccorrenteHelper::displayCSSTableHor();

OccorrenteHelper::displayOccorrenteForm($this->uDm);

OccorrenteHelper::displayOccorrenteTable($this->items, $this->uDm);


?>