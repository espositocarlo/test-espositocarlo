
<?php 
//codice anti accesso diretto
defined('_JEXEC') or die('Restricted access');

jimport('jommla.application.component.model');

JTable::addIncludePath(JPATH_COMPONENT.DS.'tables');

class TrinacriaModelRicettainversa extends JModel{

function getRicettainversa(){

		$db =& JFactory::getDBO();
		
		$query = 'SELECT 
					#__trinacriaricettainversa.*
				FROM
					#__trinacriaricettainversa
				ORDER BY
					#__trinacriaricettainversa.descrizione
				';
    	
			

		$db->setQuery( $query );
		$risultato = $db->loadObjectList();

		return $risultato;

	}

function getRicettainversaById(){

		$db =& JFactory::getDBO();
$id_ricetta_inversa = JRequest::getVar('id_ricetta_inversa', null, 'get', 'integer');	

		$query = 'SELECT 
					#__trinacriaricettainversa.*,
					#__trinacriaprodotto.*
				FROM
					#__trinacriaricettainversa
				INNER JOIN
					#__trinacriaprodotto
				ON
					#__trinacriaprodotto.id_prodotto=#__trinacriaricettainversa.id_prodotto
				WHERE
					#__trinacriaricettainversa.id_ricetta_inversa ='.$id_ricetta_inversa.'
				';

		$db->setQuery( $query );
		$risultato = $db->loadObjectList();
		$ricettainversa = $risultato[0];
		return $ricettainversa;

	}
	
function getProdotti(){

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
	
function getMerce(){

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
					#__trinacriaoccorrente.descrizione
				';

		$db->setQuery( $query );
		$risultato = $db->loadObjectList();

		return $risultato;

	}
	
function getRicettainversaCompleta(){
	
		$id_ricetta_inversa = JRequest::getVar('id_ricetta_inversa', null, 'get', 'integer');

		$db =& JFactory::getDBO();

		$query = 'SELECT 
					#__trinacriaricettainversa.*,
 					#__trinacriarigaricettainversa.*,
 					#__trinacriamagazzino.*,
 					#__trinacriaoccorrente.*,
 					#__trinacriaprodotto.*
				FROM
					#__trinacriaricettainversa
				INNER JOIN
					#__trinacriarigaricettainversa
				ON
					#__trinacriarigaricettainversa.id_ricetta_inversa = #__trinacriaricettainversa.id_ricetta_inversa
				INNER JOIN
    				#__trinacriamagazzino
				ON 
    				#__trinacriamagazzino.id_merce = #__trinacriarigaricettainversa.id_merce
    			INNER JOIN
    				#__trinacriaoccorrente
    			ON
    				#__trinacriamagazzino.id_occorrente = #__trinacriaoccorrente.id_occorrente
    			INNER JOIN
    				#__trinacriaprodotto
    			ON
    				#__trinacriaricettainversa.id_prodotto = #__trinacriaprodotto.id_prodotto
				WHERE
					#__trinacriaricettainversa.id_ricetta_inversa ='.$id_ricetta_inversa.'
				ORDER BY
					#__trinacriaoccorrente.descrizione
				';

		$db->setQuery( $query );
		$risultato = $db->loadObjectList();

		return $risultato;

	}

	

	
	
	function insertRicettainversa($ricettainversa) {
		$row = & JTable::getInstance('Ricettainversa', 'Table');
		
		if(!$row->bind($ricettainversa)){
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
	
function deleteRicettainversa() {
		$id_ricetta_inversa = JRequest::getVar( 'id_ricetta_inversa', null, 'get', 'integer' );
		$row =& $this->getTable();

		
			if (!$row->delete( $id_ricetta_inversa )) {
				$this->setError( $row->getErrorMsg() );
				return false;
			}
	
		return true;
	}

	
}


?>
