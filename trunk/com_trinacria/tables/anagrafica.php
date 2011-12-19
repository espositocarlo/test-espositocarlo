<?php


// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class TableAnagrafica extends JTable
{
	var $id_anagrafica = null;
	var $id_tipo_anagrafica = null; //può essere ad esempio Dipendente, Cliente, Fornitore..
	
	
	var $nominativo = null;//può essere nome, cognome, ragione sociale

	var $partita_iva = null;
	var $codice_fiscale = null;
	
	var $indirizzo = null;
	var $recapiti = null;
	var $email = null;
	
	var $note = null;
	
	
	
	/**
	 * Constructor
	 *
	 * @param object Database connector object
	 */
	function TableAnagrafica(& $db) {
		parent::__construct('#__trinacriaanagrafica', 'id_anagrafica', $db);
	}
	
	
function check() {
		
		
		if (trim($this->id_tipo_anagrafica) == '' || trim($this->id_tipo_anagrafica) == null) {
			$this->setError (JText::_('Inserire Tipologia Anagrafica.'));
			return false;
		}
	if (trim($this->nominativo) == '' || trim($this->nominativo) == null) {
			$this->setError (JText::_('Inserire Nominativo.'));
			return false;
		}
    
		return true;
	}

}

?>
