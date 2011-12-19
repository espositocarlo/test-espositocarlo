<?php


// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class TableRigaprogramma extends JTable
{
	var $id_programma = null;
	var $id_riga_programma = null;
	var $id_prodotto = null;
	var $tempo_produzione = null;
	var $quantita_da_produrre = null;
	var $stato = null;
	

	/**
	 * Constructor
	 *
	 * @param object Database connector object
	 */
	function TableRigaprogramma(& $db) {
		parent::__construct('#__trinacriarigaprogprod', 'id_riga_programma', $db);
	}
	
	
function check() {
		
	
	
		if (trim($this->id_programma) == '' || trim($this->id_programma) == null || trim($this->id_programma) == 0) {
			$this->setError (JText::_('Inserire il programma.'));
			return false;
		}
		
		if (trim($this->id_prodotto) == '' || trim($this->id_prodotto) == null || trim($this->id_prodotto) == 0) {
			$this->setError (JText::_('Inserire il prodotto.'));
			return false;
		}
		
		if (trim($this->quantita_da_produrre) == '' || trim($this->quantita_da_produrre) == null || trim($this->quantita_da_produrre) == 0) {
			$this->setError (JText::_('Inserire quanti&agrave; da produrre'));
			return false;
		}	
		
    
		return true;
	}

}

?>
