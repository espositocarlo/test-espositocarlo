
<?php 
//codice anti accesso diretto
defined('_JEXEC') or die('Restricted access');

jimport('jommla.application.component.model');

JTable::addIncludePath(JPATH_COMPONENT.DS.'tables');

class TrinacriaModelProgramma extends JModel{


function getProgramma(){

		$db =& JFactory::getDBO();

		$query = 'SELECT 
					#__trinacriaprogprod.*
				FROM
					#__trinacriaprogprod
				ORDER BY
					#__trinacriaprogprod.data_inserimento DESC
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
	
	
	
	
function getProgrammaById(){

		$db =& JFactory::getDBO();
$id_programma = JRequest::getVar('id_programma', null, 'get', 'integer');	

		$query = 'SELECT 
					#__trinacriaprogprod.*
				FROM
					#__trinacriaprogprod
				WHERE
					#__trinacriaprogprod.id_programma ='.$id_programma.'
				';

		$db->setQuery( $query );
		$risultato = $db->loadObjectList();
		$programma = $risultato[0];
		return $programma;

	}
	
function getProgrammaCompleto(){
	
		$id_programma = JRequest::getVar('id_programma', null, 'get', 'integer');
	
		$db =& JFactory::getDBO();

		$query = 'SELECT 
					#__trinacriaprogprod.*,
 					#__trinacriarigaprogprod.*,
 					#__trinacriaprodotto.*
 
				FROM
					#__trinacriaprogprod
				INNER JOIN
					#__trinacriarigaprogprod
				ON
					#__trinacriarigaprogprod.id_programma = #__trinacriaprogprod.id_programma
				INNER JOIN
    				#__trinacriaprodotto
				ON 
    				#__trinacriaprodotto.id_prodotto = #__trinacriarigaprogprod.id_prodotto
				WHERE
					#__trinacriaprogprod.id_programma ='.$id_programma.'
				ORDER BY
					#__trinacriaprodotto.nome
				';

		$db->setQuery( $query );
		$risultato = $db->loadObjectList();

		return $risultato;

	}
	
	
	function insertProgramma($programma) {
		$row = & JTable::getInstance('Programma', 'Table');
		
		if(!$row->bind($programma)){
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
	
function deleteProgramma() {
		$id_programma = JRequest::getVar( 'id_programma', null, 'get', 'integer' );
		$row =& $this->getTable();

		
			if (!$row->delete( $id_programma )) {
				$this->setError( $row->getErrorMsg() );
				return false;
			}
	
		return true;
	}

	
}


?>
