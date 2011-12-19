
<?php 
//codice anti accesso diretto
defined('_JEXEC') or die('Restricted access');

jimport('jommla.application.component.model');

JTable::addIncludePath(JPATH_COMPONENT.DS.'tables');

class TrinacriaModelProdotto extends JModel{


function getProdotto(){

		$db =& JFactory::getDBO();

		$query = 'SELECT
					#__trinacriaprodotto.*	
				FROM
					#__trinacriaprodotto
				ORDER BY
					#__trinacriaprodotto.nome 
				';

		$db->setQuery( $query );
		$risultato = $db->loadObjectList();

		return $risultato;

	}
	
	
	function insertProdotto($prodotto) {
		$row = & JTable::getInstance('Prodotto', 'Table');
		
		if(!$row->bind($prodotto)){
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
