<?php


// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class TableProgramma extends JTable
{
	var $id_programma = null;
	var $descrizione = null;
	var $data_inserimento = null;
	var $data_consegna = null;
	var $stato_programma = null;
	

	/**
	 * Constructor
	 *
	 * @param object Database connector object
	 */
	function TableProgramma(& $db) {
		parent::__construct('#__trinacriaprogprod', 'id_programma', $db);
	}
	
	
function check() {
		

		if (trim($this->descrizione) == '') {
			$this->setError (JText::_('Inserire la descrizione.'));
			return false;
		}
		
		if (trim($this->data_inserimento) != '') {
     		$d = explode('-', $this->data_inserimento);
    		if(count($d) != 3 || checkdate($d[1], $d[0], $d[2]) == false) {
      			$this->setError(JText::_('Data di inserimento non valida!'));
      			return false;
    		}
    	$this->data_inserimento = date('Y-m-d',mktime(0,0,0,$d[1],$d[0],$d[2]));
		
    }
    
    if (trim($this->data_consegna) != '') {
     		$d = explode('-', $this->data_consegna);
    		if(count($d) != 3 || checkdate($d[1], $d[0], $d[2]) == false) {
      			$this->setError(JText::_('Data di consegna non valida!'));
      			return false;
    		}
    	$this->data_consegna = date('Y-m-d',mktime(0,0,0,$d[1],$d[0],$d[2]));
		
    }
    
    
		return true;
	}

}

?>
