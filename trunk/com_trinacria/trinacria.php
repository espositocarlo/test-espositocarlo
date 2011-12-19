<?php 

//codice anti accesso diretto
defined('_JEXEC') or die('Restricted access');

//richiamo il controller di base
require_once (JPATH_COMPONENT.DS.'controller.php');

//richiama uno specifico controller se richiesto
if($controller = JRequest::getWord('controller')){
	
	require_once (JPATH_COMPONENT.DS.'controllers'.DS.$controller.'.php');
}

//creare il controller
$classname = 'TrinacriaController'.$controller;
$controller = new $classname();

//richiama il giusto task
$controller->execute(JRequest::getWord('task'));

//redirect
$controller->redirect();



?>