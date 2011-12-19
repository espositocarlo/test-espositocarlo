
<?php 
//codice anti accesso diretto
defined('_JEXEC') or die('Restricted access');

jimport('jommla.application.component.model');

JTable::addIncludePath(JPATH_COMPONENT.DS.'tables');

class TrinacriaModelRigaricettainversa extends JModel{

function getIngredientiPresenti($rigaricettainversa){
	$id_ricetta_inversa = $rigaricettainversa->id_ricetta_inversa;
	$db =& JFactory::getDBO();
	$query = 'select
	#__trinacriarigaricettainversa.*
    from
    	#__trinacriarigaricettainversa
    inner join
    	#__trinacriaricettainversa
    on
    	#__trinacriaricettainversa.id_ricetta_inversa = #__trinacriarigaricettainversa.id_ricetta_inversa
    where
    	#__trinacriaricettainversa.id_ricetta_inversa ='.$id_ricetta_inversa.'
    	';
	
		$db->setQuery( $query );
		$risultato = $db->loadObjectList();
		
		return $risultato;
	
}
	
	
	
function getTotaleQuantita($rigaricettainversa){
	$id_ricetta_inversa = $rigaricettainversa->id_ricetta_inversa;
	$db =& JFactory::getDBO();
	$query = 'select
	SUM(#__trinacriarigaricettainversa.quantita_merce) as totale_quantita
    from
    	#__trinacriarigaricettainversa
    inner join
    	#__trinacriaricettainversa
    on
    	#__trinacriaricettainversa.id_ricetta_inversa = #__trinacriarigaricettainversa.id_ricetta_inversa
    where
    	#__trinacriaricettainversa.id_ricetta_inversa ='.$id_ricetta_inversa.'
    	';
	
		$db->setQuery( $query );
		$risultato = $db->loadObjectList();
		$totale_quantita = $risultato[0];
		return $totale_quantita;
	
}


function updatePercentuale($rigaricettainversa){
		$db =& JFactory::getDBO();
	$query = 'update
		#__trinacriarigaricettainversa

    inner join
    	#__trinacriaricettainversa
    on
    	#__trinacriaricettainversa.id_ricetta_inversa = #__trinacriarigaricettainversa.id_ricetta_inversa
    
    set
		#__trinacriarigaricettainversa.percentuale_merce ='.$rigaricettainversa->percentuale_merce.'
    
    where
    	#__trinacriaricettainversa.id_ricetta_inversa ='.$rigaricettainversa->id_ricetta_inversa.'
    and
    	#__trinacriarigaricettainversa.id_riga_ricetta_inversa ='.$rigaricettainversa->id_riga_ricetta_inversa.'
    	';
	
		$db->setQuery( $query );
		$risultato = $db->loadObjectList();
		return $risultato;
	
}



	
function insertRigaricettainversa($rigaricettainversa) {
		$row = & JTable::getInstance('Rigaricettainversa', 'Table');
		
		if(!$row->bind($rigaricettainversa)){
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
	
function deleteRigaricettainversa() {
		$id_riga_ricetta_inversa = JRequest::getVar( 'id_riga_ricetta_inversa', null, 'get', 'integer' );
		$row =& $this->getTable();

		
			if (!$row->delete( $id_riga_ricetta_inversa )) {
				$this->setError( $row->getErrorMsg() );
				return false;
			}
	
		return true;
	}
	

	
}


?>
