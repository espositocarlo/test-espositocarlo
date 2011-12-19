<?php


// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class TableProdotto extends JTable
{
	var $id_prodotto = null;
	var $nome = null;
	var $unita_vendita = null;
	var $lotto_parte_fissa = null;
	var $dimensione_cartone = null;
	var $note = null;
		
	
	/**
	 * Constructor
	 *
	 * @param object Database connector object
	 */
	function TableProdotto(& $db) {
		parent::__construct('#__trinacriaprodotto', 'id_prodotto', $db);
	}
	
	
function check() {
		
		
				
		if (trim($this->nome) == '') {
			$this->setError (JText::_('Inserire il nome.'));
			return false;
		}
	
    
		return true;
	}

}

?>
