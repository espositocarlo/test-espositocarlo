<?php 
//codice anti accesso diretto
defined('_JEXEC') or die('Restricted access');


require (JPATH_COMPONENT.DS.'helpers'.DS.'unitamisura.php');

UnitamisuraHelper::displayHome();

UnitamisuraHelper::displayCSSTableHor();

UnitamisuraHelper::displayUnitamisuraForm();

UnitamisuraHelper::displayUnitamisuraTable($this->items);




?>