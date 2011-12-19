<?php 
//codice anti accesso diretto
defined('_JEXEC') or die('Restricted access');


require (JPATH_COMPONENT.DS.'helpers'.DS.'rigaprogramma.php');


RigaprogrammaHelper::displayHome();

RigaprogrammaHelper::displayCSSTableHor();

if($this->programma){
RigaprogrammaHelper::displayInfoProgramma($this->programma);
RigaprogrammaHelper::displayRigaprogrammaForm($this->programma, $this->listaProdotti);
RigaprogrammaHelper::displayRigaprogrammaTable($this->items_dett, $this->listaProdotti);
}else{
	echo JText::_('Selezionare un Programma.');
	
}
echo '</br>';
echo'<a href="index.php?option=com_trinacria&view=programma" style="text-decoration: none;"><input value="Vai a Selezione Programma" type="button"></a>';





?>