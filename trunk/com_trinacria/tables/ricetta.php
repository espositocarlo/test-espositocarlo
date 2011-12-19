<?php


// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class TableRicetta extends JTable
{
	var $id_ricetta = null;
	var $id_prodotto = null;
	var $id_occorrente = null;
	var $quantita = null;
	var $percentuale_totale = null;
		
	
	/**
	 * Constructor
	 *
	 * @param object Database connector object
	 */
	function TableRicetta(& $db) {
		parent::__construct('#__trinacriaricetta', 'id_ricetta', $db);
	}
	
	
function check() {
		
		
				
		if (trim($this->id_prodotto) == '') {
			$this->setError (JText::_('Inserire il Prodotto.'));
			return false;
		}
		if (trim($this->id_occorrente) == '') {
			$this->setError (JText::_('Inserire Occorrente.'));
			return false;
		}
		if (trim($this->quantita) == 0 || $this->quantita == null) {
			$this->setError (JText::_('Inserire Quantit&agrave.'));
			return false;
		}
		return true;
	}

}

?>
