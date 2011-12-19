
<?php 
//codice anti accesso diretto
defined('_JEXEC') or die('Restricted access');

jimport('jommla.application.component.model');

JTable::addIncludePath(JPATH_COMPONENT.DS.'tables');

class TrinacriaModelRigaprogramma extends JModel{




	
function insertRigaprogramma($rigaProgramma) {
		$row = & JTable::getInstance('Rigaprogramma', 'Table');
		
		if(!$row->bind($rigaProgramma)){
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
	
function deleteRigaprogramma() {
		$id_riga_programma = JRequest::getVar( 'id_riga_programma', null, 'get', 'integer' );
		$row =& $this->getTable();

		
			if (!$row->delete( $id_riga_programma )) {
				$this->setError( $row->getErrorMsg() );
				return false;
			}
	
		return true;
	}
	

	
}


?>
