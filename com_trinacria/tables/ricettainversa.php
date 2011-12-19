<?php


// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class TableRicettainversa extends JTable
{
	var $id_ricetta_inversa = null;
	var $id_prodotto = null;
	var $descrizione = null;
	var $data_inserimento = null;
	var $quantita_prodotto = null;
	
	
	
	/**
	 * Constructor
	 *
	 * @param object Database connector object
	 */
	function TableRicettainversa(& $db) {
		parent::__construct('#__trinacriaricettainversa', 'id_ricetta_inversa', $db);
	}
	
	
function check() {
		
		
				
		if (trim($this->id_prodotto) == '' || trim($this->id_prodotto) == null) {
			$this->setError (JText::_('Inserire il Prodotto.'));
			return false;
		}
		
	if (trim($this->data_inserimento) != '') {
     		$d = explode('-', $this->data_inserimento);
    		if(count($d) != 3 || checkdate($d[1], $d[0], $d[2]) == false) {
      			$this->setError(JText::_('Data Inserimento non valida!'));
      			return false;
    		}
    	$this->data_inserimento = date('Y-m-d',mktime(0,0,0,$d[1],$d[0],$d[2]));
		
    }
		
		if (trim($this->quantita_prodotto) == 0 || $this->quantita_prodotto == null) {
			$this->setError (JText::_('Inserire Quantit&agrave prodotto.'));
			return false;
		}
		return true;
	}

}

?>
