<?php 
//codice anti accesso diretto
defined('_JEXEC') or die('Restricted access');


require (JPATH_COMPONENT.DS.'helpers'.DS.'rigaricettainversa.php');


RigaricettainversaHelper::displayHome();

RigaricettainversaHelper::displayCSSTableHor();

if($this->ricettainversa){
RigaricettainversaHelper::displayInfoRicettainversa($this->ricettainversa);
RigaricettainversaHelper::displayRigaricettainversaForm($this->ricettainversa, $this->listaMerce);
RigaricettainversaHelper::displayRigaricettainversaTable($this->items_dett, $this->listaMerce);
}else{
	echo JText::_('Selezionare una Ricetta inversa.');
	
}
echo '</br>';
echo'<a href="index.php?option=com_trinacria&view=ricettainversa" style="text-decoration: none;"><input value="Vai a Selezione Ricetta inversa" type="button"></a>';





?>