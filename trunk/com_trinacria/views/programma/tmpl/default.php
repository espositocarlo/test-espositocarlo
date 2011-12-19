<?php 
//codice anti accesso diretto
defined('_JEXEC') or die('Restricted access');


require (JPATH_COMPONENT.DS.'helpers'.DS.'programma.php');


ProgrammaHelper::displayHome();

ProgrammaHelper::displayCSSTableHor();

ProgrammaHelper::displayProgrammaForm();

ProgrammaHelper::displayProgrammaTable($this->items);

?>