<?php


// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class TableMagazzino extends JTable
{
	var $id_merce = null;
	var $id_occorrente = null;
	var $numero_bolla = null;
	var $data_bolla = null;
	var $id_fornitore = null;
	var $lotto = null;
	var $scadenza = null;
	var $costo = null;
//	var $data_scarico = null; //data di movimento
	var $note = null;
	var $disponibilita = null; //quantita
	
	
	
	/*
	//controlli al ricevimento
	var $condizione = null;
	var $integrita = null;
	var $temperatura = null;
	var $accettazione = null;
	var $disposizione = null;
	*/
	
	
	
	
	/**
	 * Constructor
	 *
	 * @param object Database connector object
	 */
	function TableMagazzino(& $db) {
		parent::__construct('#__trinacriamagazzino', 'id_merce', $db);
	}
	
	
function check() {
		
		
		if (trim($this->id_occorrente) == '') {
			$this->setError (JText::_('Selezionare Occorrente.'));
			return false;
		}
		
		
		
		if (trim($this->disponibilita) == '') {
			$this->setError (JText::_('Inserire la disponibilita.'));
			return false;
		}
		
		
		if (trim($this->scadenza) != '') {
     		$d = explode('-', $this->scadenza);
    		if(count($d) != 3 || checkdate($d[1], $d[0], $d[2]) == false) {
      			$this->setError(JText::_('Data di scadenza non valida!'));
      			return false;
    		}
    	$this->scadenza = date('Y-m-d',mktime(0,0,0,$d[1],$d[0],$d[2]));
    	//il lotto è obbligatorio solo quando è stata inserita una data di scadenza
		if (trim($this->lotto) == '') {
			$this->setError (JText::_('Inserire il lotto.'));
			return false;
		}
		
    }
    /*
    if (trim($this->data_scarico) != '') {
     		$d = explode('-', $this->data_scarico);
    		if(count($d) != 3 || checkdate($d[1], $d[0], $d[2]) == false) {
      			$this->setError(JText::_('Data di scarico non valida!'));
      			return false;
    		}
    	$this->data_scarico = date('Y-m-d',mktime(0,0,0,$d[1],$d[0],$d[2]));
		
    }
    */
  if (trim($this->data_bolla) != '') {
     		$d = explode('-', $this->data_bolla);
    		if(count($d) != 3 || checkdate($d[1], $d[0], $d[2]) == false) {
      			$this->setError(JText::_('Data Bolla non valida!'));
      			return false;
    		}
    	$this->data_bolla = date('Y-m-d',mktime(0,0,0,$d[1],$d[0],$d[2]));
		
    }
    
    
		return true;
	}

}

?>
