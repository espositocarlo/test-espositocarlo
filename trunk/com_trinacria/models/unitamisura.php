<?php 
//codice anti accesso diretto
defined('_JEXEC') or die('Restricted access');

jimport('jommla.application.component.model');

JTable::addIncludePath(JPATH_COMPONENT.DS.'tables');

class TrinacriaModelUnitamisura extends JModel{

	
function getUnitamisura(){

		$db =& JFactory::getDBO();

		$query = 'SELECT
					#__trinacriaunitamisura.*
				FROM
					#__trinacriaunitamisura
				ORDER BY
					#__trinacriaunitamisura.descrizione
				';

		$db->setQuery( $query );
		$risultato = $db->loadObjectList();

		return $risultato;

	}
	
	
	
	function insertUnitamisura($unitamisura) {
		$row = & JTable::getInstance('Unitamisura', 'Table');
		
		if(!$row->bind($unitamisura)){
			JError::raiseWarning(500, $row->getError());
			return false;
		}
		
		if(!$row->check()){
			JError::raiseWarning(500, $row->getError());
			return false;
		}
		
		if(!$row->store()){
			JError::raiseWarning(500, $row->getError());
			return false;
		}
		
		return true;
		
	}
	
	

	
}


?>