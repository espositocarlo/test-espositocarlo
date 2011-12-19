<?php 
//codice anti accesso diretto
defined('_JEXEC') or die('Restricted access');


require (JPATH_COMPONENT.DS.'helpers'.DS.'anagrafica.php');


AnagraficaHelper::displayHome();

AnagraficaHelper::displayCSSTableHor();

AnagraficaHelper::displayAnagraficaForm($this->tipoAnagrafica);


AnagraficaHelper::displayAnagraficaTable($this->items,$this->tipoAnagrafica );

?>