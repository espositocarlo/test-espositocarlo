<?php


// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class TableUnitamisura extends JTable
{
	
	var $id_unitamisura = null;
	var $descrizione = null;
	
	/**
	 * Constructor
	 *
	 * @param object Database connector object
	 */
	function TableUnitamisura(& $db) {
		parent::__construct('#__trinacriaunitamisura', 'id_unitamisura', $db);
	}
	
	
function check() {
		if (trim($this->descrizione) == '') {
			$this->setError (JText::_('Inserire la descrizione.'));
			return false;
		}
		
		
		return true;
	}

}

?>