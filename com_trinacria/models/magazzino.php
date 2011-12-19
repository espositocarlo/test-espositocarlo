
<?php 
//codice anti accesso diretto
defined('_JEXEC') or die('Restricted access');

jimport('jommla.application.component.model');

JTable::addIncludePath(JPATH_COMPONENT.DS.'tables');

class TrinacriaModelMagazzino extends JModel{


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

	
	function getFornitori(){

		$db =& JFactory::getDBO();

		$query = 'SELECT
					#__trinacriaanagrafica.*,
					#__trinacriatipoanagrafica.descrizione
				FROM
					#__trinacriaanagrafica
				INNER JOIN
					#__trinacriatipoanagrafica
				ON
					#__trinacriaanagrafica.id_tipo_anagrafica = #__trinacriatipoanagrafica.id_tipo_anagrafica
				WHERE
					#__trinacriatipoanagrafica.descrizione IN ("Fornitore")
				ORDER BY
					#__trinacriaanagrafica.nominativo
				';

		$db->setQuery( $query );
		$risultato = $db->loadObjectList();

		return $risultato;

	}
	
	
function getMagazzino(){

		$db =& JFactory::getDBO();

		$query = 'SELECT
					#__trinacriamagazzino.*,
					#__trinacriaoccorrente.descrizione,
					
                    #__trinacriaoccorrente.quantita,
					#__trinacriaoccorrente.id_occorrente,
					#__trinacriaoccorrente.quantita,
                    #__trinacriaunitamisura.descrizione AS descrizione_udm
				FROM
					#__trinacriamagazzino
				INNER JOIN
					#__trinacriaoccorrente
				ON 
					#__trinacriamagazzino.id_occorrente = #__trinacriaoccorrente.id_occorrente
                INNER JOIN
					#__trinacriaunitamisura
				ON 
					#__trinacriaunitamisura.id_unitamisura = #__trinacriaoccorrente.id_unitamisura
				
				ORDER BY
					#__trinacriamagazzino.disponibilita DESC
				';

		$db->setQuery( $query );
		$risultato = $db->loadObjectList();

		return $risultato;

	}
	
	
	
	function insertMagazzino($merce) {
		$row = & JTable::getInstance('Magazzino', 'Table');
		
		if(!$row->bind($merce)){
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
