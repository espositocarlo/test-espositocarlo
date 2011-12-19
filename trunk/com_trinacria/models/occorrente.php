<?php 
//codice anti accesso diretto
defined('_JEXEC') or die('Restricted access');

jimport('jommla.application.component.model');

JTable::addIncludePath(JPATH_COMPONENT.DS.'tables');

class TrinacriaModelOccorrente extends JModel{

	
function getOccorrente(){

		$db =& JFactory::getDBO();

		$query = 'SELECT
					#__trinacriaoccorrente.*,
					#__trinacriaunitamisura.descrizione AS descrizione_udm	
				FROM
					#__trinacriaoccorrente
				INNER JOIN
					#__trinacriaunitamisura
				ON
					#__trinacriaoccorrente.id_unitamisura = #__trinacriaunitamisura.id_unitamisura
				ORDER BY
					#__trinacriaoccorrente.descrizione,
					#__trinacriaoccorrente.quantita
				';

		$db->setQuery( $query );
		$risultato = $db->loadObjectList();

		return $risultato;

	}
	
function getUnitamisura(){

		$db =& JFactory::getDBO();

		$query = 'SELECT
					#__trinacriaunitamisura.id_unitamisura,
					#__trinacriaunitamisura.descrizione AS descrizione_udm
				FROM
					#__trinacriaunitamisura
				ORDER BY
					#__trinacriaunitamisura.descrizione
				';

		$db->setQuery( $query );
		$risultato = $db->loadObjectList();

		return $risultato;

	}
	
	
	
	function insertOccorrente($occorrente) {
		$row = & JTable::getInstance('Occorrente', 'Table');
		
		if(!$row->bind($occorrente)){
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
