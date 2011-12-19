
<?php 
//codice anti accesso diretto
defined('_JEXEC') or die('Restricted access');

jimport('jommla.application.component.model');

JTable::addIncludePath(JPATH_COMPONENT.DS.'tables');

class TrinacriaModelAnagrafica extends JModel{


function getAnagrafica(){

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
				ORDER BY
					#__trinacriaanagrafica.nominativo
				';

		$db->setQuery( $query );
		$risultato = $db->loadObjectList();

		return $risultato;

	}

function getTipoAnagrafica(){

		$db =& JFactory::getDBO();

		$query = 'SELECT
					#__trinacriatipoanagrafica.*
				FROM
					#__trinacriatipoanagrafica
				ORDER BY
					#__trinacriatipoanagrafica.descrizione
				';

		$db->setQuery( $query );
		$risultato = $db->loadObjectList();

		return $risultato;

	}

	
	
	function insertAnagrafica($anagrafica) {
		$row = & JTable::getInstance('Anagrafica', 'Table');
		
		if(!$row->bind($anagrafica)){
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
