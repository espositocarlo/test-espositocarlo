<?php


// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class TableRigaricettainversa extends JTable
{
	var $id_riga_ricetta_inversa = null;
	var $id_ricetta_inversa = null;
	var $id_merce = null;
	var $quantita_merce = null;
	var $percentuale_merce = null;
	

	/**
	 * Constructor
	 *
	 * @param object Database connector object
	 */
	function TableRigaricettainversa(& $db) {
		parent::__construct('#__trinacriarigaricettainversa', 'id_riga_ricetta_inversa', $db);
	}
	
	
function check() {
		
	
	
		if (trim($this->id_ricetta_inversa) == '' || trim($this->id_ricetta_inversa) == null || trim($this->id_ricetta_inversa) == 0) {
			$this->setError (JText::_('Inserire Ricetta Inversa.'));
			return false;
		}
		
		if (trim($this->id_merce) == '' || trim($this->id_merce) == null || trim($this->id_merce) == 0) {
			$this->setError (JText::_('Inserire Ingrediente.'));
			return false;
		}
		
		if (trim($this->quantita_merce) == '' || trim($this->quantita_merce) == null || trim($this->quantita_merce) == 0) {
			$this->setError (JText::_('Inserire quanti&agrave; Ingrediente.'));
			return false;
		}	
		
    
		return true;
	}

}

?>
