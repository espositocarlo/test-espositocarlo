
<?php 
//codice anti accesso diretto
defined('_JEXEC') or die('Restricted access');

jimport('jommla.application.component.model');

JTable::addIncludePath(JPATH_COMPONENT.DS.'tables');

class TrinacriaModelRicetta extends JModel{


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
function getProdottoByIdProdotto($id_prodotto){
	
		$db =& JFactory::getDBO();
		$id_prodotto = JRequest::getVar('id_prodotto',null,'integer');
		$query = 'SELECT
					#__trinacriaprodotto.*	
				FROM
					#__trinacriaprodotto
				WHERE
					#__trinacriaprodotto.id_prodotto='.$id_prodotto.'
				';

		$db->setQuery( $query );
		$risultato = $db->loadObjectList();
		$prodotto = $risultato[0];
		return $prodotto;

	}
	
function getRicetta($id_prodotto){

		$db =& JFactory::getDBO();
		
		$id_prodotto = JRequest::getVar('id_prodotto',null,'integer');

		$query = 'SELECT 
					#__trinacriaprodotto.*,
#__trinacriaricetta.*,
#__trinacriaoccorrente.descrizione,
#__trinacriaoccorrente.quantita AS quantita_occorrente,
#__trinacriaoccorrente.note AS note_occorrente
FROM
#__trinacriaricetta
	INNER JOIN
		#__trinacriaoccorrente
	ON
		#__trinacriaoccorrente.id_occorrente = #__trinacriaricetta.id_occorrente
    INNER JOIN
    	#__trinacriaprodotto
    ON 
    	#__trinacriaprodotto.id_prodotto = #__trinacriaricetta.id_prodotto
    WHERE
    	#__trinacriaricetta.id_prodotto = '.$id_prodotto;
    	
			

		$db->setQuery( $query );
		$risultato = $db->loadObjectList();

		return $risultato;

	}
	
	
	function insertRicetta($ricetta) {
		$row = & JTable::getInstance('Ricetta', 'Table');
		
		if(!$row->bind($ricetta)){
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
