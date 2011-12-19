<?php


// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class TableOccorrente extends JTable
{
	var $id_occorrente = null;
	var $id_unitamisura = null;
	var $descrizione = null;
	var $quantita = null;
	//var $note = null;
	
	/**
	 * Constructor
	 *
	 * @param object Database connector object
	 */
	function TableOccorrente(& $db) {
		parent::__construct('#__trinacriaoccorrente', 'id_occorrente', $db);
	}
	
	
function check() {
		
		if (trim($this->descrizione) == '') {
			$this->setError (JText::_('Inserire la descrizione.'));
			return false;
		}
		
	
		if (trim($this->id_unitamisura) == '') {
			$this->setError (JText::_('Inserire unita di misura.'));
			return false;
		}
		
		if (trim($this->quantita) == '') {
			$this->setError (JText::_('Inserire la quantita.'));
			return false;
		}
		
		return true;
	}

}

?>
