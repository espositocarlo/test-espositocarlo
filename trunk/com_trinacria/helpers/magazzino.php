<?php

//codice anti accesso diretto
defined('_JEXEC') or die('Restricted access');

class MagazzinoHelper{
	
	function displayHome() {
		echo	'<div class="componentheading">'; 
			echo JText::_('Ricevimento Merce');
		echo '</div>'; 
	}
	
function displayMagazzinoTable($items, $listaOccorrenti, $listaFornitori) {
	echo '<table id="hor-zebra"  border="1" cellspacing="1" cellpadding="1">';
		echo '<tr>';
			echo '<th scope="row">';
				echo JText::_('Occorrente');
			echo '</th>';
			echo '<th scope="row" >';
				echo JText::_('Quantit&agrave');
			echo '</th>';
			echo '<th scope="row" >';
				echo JText::_('Scadenza&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
			echo '</th>';
			echo '<th scope="row">';
				echo JText::_('Lotto');
			echo '</th>';
			echo '<th scope="row" >';
				echo JText::_('Costo &euro;');
			echo '</th>';
			echo '<th scope="row">';
				echo JText::_('Fornitore');
			echo '</th>';
			echo '<th scope="row">';
				echo JText::_('Data&nbsp;della&nbsp;Bolla');
			echo '</th>';
			echo '<th scope="row">';
				echo JText::_('N&ordm;&nbsp;Bolla');
			echo '</th>';
			echo '<th scope="row" >';
				echo JText::_('Note');
			echo '</th>';
			
			/*
			echo '<th scope="row" >';
				echo JText::_('Condizione');
			echo '</th>';
			echo '<th scope="row" >';
				echo JText::_('Integrita');
			echo '</th>';
			echo '<th scope="row" >';
				echo JText::_('Temp.');
			echo '</th>';
			echo '<th scope="row" >';
				echo JText::_('Accett.');
			echo '</th>';
			echo '<th scope="row" >';
				echo JText::_('Disp.');
			echo '</th>';
			*/
			echo '<th scope="row" >';
				echo JText::_('&nbsp;');
			echo '</th>';
		echo '</tr>';
		
		for($i=0; $i<count($items); $i++){

		if($i%2 == 1){
			echo '<tr class="odd">';
		}else{
			echo '<tr>';
			}
			echo '<form name="magazzinoFormMod'.$i.'" id="magazzinoFormMod'.$i.'" method="post" action="index.php?option=com_trinacria&controller=magazzino&task=submit" onsubmit="if(!confirm(\'Sicuro di voler modificare?\')){this.action=\'index.php?option=com_trinacria&view=magazzino\'}">';
				echo '<td>';
				
					
					
					echo '<input type="hidden" name="id_occorrente" id="id_occorrente" value="';
					echo JText::_($items[$i]->id_occorrente);
					echo '"/>';
					echo '<input type="hidden" name="id_merce" id="id_merce" value="';
					echo JText::_($items[$i]->id_merce);
					echo '"/>';
					//echo '<input class="text_area" type="text" name="descrizione" id="descrizione" maxlength="50" value="';
					echo JText::_($items[$i]->descrizione. ' - '. $items[$i]->quantita.' '.$items[$i]->descrizione_udm  );
					//echo '"/>';	
				echo '</td>';
				echo '<td>';
					echo '<input class="text_area" type="text" name="disponibilita" size="5" id="disponibilita" size="5" maxlength="16" value="';
					echo JText::_($items[$i]->disponibilita);
					echo '"/>';	
				echo '</td>';
				echo '<td>';
				
					if($items[$i]->scadenza != "0000-00-00"){
    				$fv = strftime('%d-%m-%Y', strtotime($items[$i]->scadenza));
					}
					else{
						$fv = null;
					}
  					echo JHTML::_('calendar', $fv, 'scadenza', 'scadenza'.$i, '%d-%m-%Y', array('size'=>'9'));
					
					
				echo '</td>';
				echo '<td>';
					echo '<input class="text_area" type="text" name="lotto" id="lotto" maxlength="50" size="7" value="';
					echo JText::_($items[$i]->lotto);
					echo '"/>';	
				echo '</td>';

				echo '<td>';
					echo '<input class="text_area" type="text" name="costo" id="costo" size ="5" maxlength="50" value="';
					echo JText::_($items[$i]->costo);
					echo '"/>';	
					
				echo '</td>';
				
				
				echo '<td>';
				 $optionSelected = JText::_($items[$i]->id_fornitore);
				
				$arr = array();
					$arr[] = JHTML::_('select.optgroup',  JText::_('Fornitori&nbsp;Disponibili'));
					for($p=0;$p<count($listaFornitori); $p++){
						$arr[] = JHTML::_('select.option',  JText::_($listaFornitori[$p]->id_anagrafica), JText::_($listaFornitori[$p]->nominativo));
					}
					$optionSelected = $items[$i]->id_fornitore;
 				echo JHTML::_('select.genericlist', $arr, 'id_fornitore', null, 'value', 'text', $optionSelected);
				echo '</td>';
				
				
				echo '<td>';
				
				if($items[$i]->data_bolla != "0000-00-00"){
    				$dboll = strftime('%d-%m-%Y', strtotime($items[$i]->data_bolla));
					}
					else{
						$dboll = null;
					}
    				
  					echo JHTML::_('calendar', $dboll, 'data_bolla', 'data_bolla'.$i, '%d-%m-%Y', array('size'=>'9'));
					
					
				echo '</td>';
				echo '<td>';
					echo '<input class="text_area" type="text" name="numero_bolla" id="numero_bolla" maxlength="200" size="5" value="';
					echo JText::_($items[$i]->numero_bolla);
					echo '"/>';	
				echo '</td>';
				
				echo '<td>';
					echo '<input class="text_area" type="text" name="note" id="note" maxlength="200" size="5" value="';
					echo JText::_($items[$i]->note);
					echo '"/>';	
				echo '</td>';
				
				/*
				echo '<td>';
				
				if($items[$i]->data_scarico != "0000-00-00"){
    				$dds = strftime('%d-%m-%Y', strtotime($items[$i]->data_scarico));
					}
					else{
						$dds = null;
					}
    				
  					echo JHTML::_('calendar', $dds, 'data_scarico', 'data_scarico'.$i, '%d-%m-%Y', array('size'=>'9'));
					
					
				echo '</td>';
				*/
				
				/*
				echo '<td>';
					echo '<select name="condizione" id="condizione">';

					echo '	<option value="';
					echo JText::_($items[$i]->condizione);
					echo ' "';
					
					echo 'selected="selected">';
					echo JText::_($items[$i]->condizione);
					echo '</option>';

					echo '<optgroup label="';
						echo JText::_('Scelta: ');
					echo'">';
				
					echo '	<option value="';
						echo JText::_('Ottima');
					echo '">';
						echo JText::_('Ottima');
					echo '</option>';
				
					echo '	<option value="';
						echo JText::_('Buona');
					echo '">';
						echo JText::_('Buona');
					echo '</option>';
					echo '	<option value="';
						echo JText::_('Scarsa');
					echo '">';
						echo JText::_('Scarsa');
					echo '</option>';
					echo '</optgroup>';
					echo '</select>';	
				echo '</td>';
				echo '</td>';
				
				echo '<td>';
					echo '<select name="integrita" id="integrita">';

					echo '	<option value="';
					echo JText::_($items[$i]->integrita);
					echo ' "';
					
					echo 'selected="selected">';
					echo JText::_($items[$i]->integrita);
					echo '</option>';

					echo '<optgroup label="';
						echo JText::_('Scelta: ');
					echo'">';
				
					echo '	<option value="';
						echo JText::_('Ottima');
					echo '">';
						echo JText::_('Ottima');
					echo '</option>';
				
					echo '	<option value="';
						echo JText::_('Buona');
					echo '">';
						echo JText::_('Buona');
					echo '</option>';
					echo '	<option value="';
						echo JText::_('Scarsa');
					echo '">';
						echo JText::_('Scarsa');
					echo '</option>';
					echo '</optgroup>';
					echo '</select>';	
				echo '</td>';
				
				echo '<td>';
					echo '<input class="text_area" type="text" name="temperatura" size="3" id="temperatura" size="5" maxlength="16" value="';
					echo JText::_($items[$i]->temperatura);
					echo '"/>';	
				echo '</td>';
				
				echo '<td>';
					echo '<select name="accettazione" id="accettazione">';

					echo '	<option value="';
					echo JText::_($items[$i]->accettazione);
					echo ' "';
					
					echo 'selected="selected">';
					echo JText::_($items[$i]->accettazione);
					echo '</option>';

					echo '<optgroup label="';
						echo JText::_('Scelta: ');
					echo'">';
				
					echo '	<option value="';
						echo JText::_('Si');
					echo '">';
						echo JText::_('Si');
					echo '</option>';
				
					echo '	<option value="';
						echo JText::_('No');
					echo '">';
						echo JText::_('No');
					echo '</option>';
					echo '</optgroup>';
					echo '</select>';			
				echo '</td>';
				
				echo '<td>';
					echo '<select name="disposizione" id="disposizione">';

					echo '	<option value="';
					echo JText::_($items[$i]->disposizione);
					echo ' "';
					
					echo 'selected="selected">';
					echo JText::_($items[$i]->disposizione);
					echo '</option>';

					echo '<optgroup label="';
						echo JText::_('Scelta: ');
					echo'">';
				
					echo '	<option value="';
						echo JText::_('Aperta');
					echo '">';
						echo JText::_('Aperta');
					echo '</option>';
				
					echo '	<option value="';
						echo JText::_('Chiusa');
					echo '">';
						echo JText::_('Chiusa');
					echo '</option>';
					echo '</optgroup>';
					echo '</select>';					
				echo '</td>';
				
				*/
				
				echo '<td>';
				echo '<input type="submit" name="Modifica" value="Modifica"';
				echo '</td>';
			echo '</form>';
			echo '</tr>';
			
		}
	echo '</table>';
	
	}
	

function displayMagazzinoForm($listaOccorrenti, $listaFornitori) {
	echo '<div>';
	echo '<fieldset style="width: 720px;">';
	echo '<form name="magazzinoForm" id="magazzinoForm" method="post" action="index.php?option=com_trinacria&controller=magazzino&task=submit" >';

	echo '<div>';
	
	echo '<table id="hor-zebra" width="100%" border="1" cellspacing="1" cellpadding="1">';
		echo '<tr>';
			echo '<th cope="row" colspan="2">';
				echo JText::_('Seleziona Occorrente');
			echo '</th>';
		echo '</tr>';
		
	echo '<tr>';
		echo '<td>';
					echo '<select name="datiOccorrenteSelezionato" id="datiOccorrenteSelezionato">';

					echo '	<option value="';
					echo ' "';
					echo 'selected="selected">';
					echo JText::_('Seleziona occorrente');
					echo '</option>';

					echo '<optgroup label="';
						echo JText::_('Occorrenti');
					echo'">';
				for($i=0; $i<count($listaOccorrenti); $i++){
					echo '	<option value="';
						echo JText::_($listaOccorrenti[$i]->id_occorrente.'|'.$listaOccorrenti[$i]->quantita);
					echo '">';
					echo JText::_($listaOccorrenti[$i]->descrizione. ' - '. $listaOccorrenti[$i]->quantita.' '.$listaOccorrenti[$i]->descrizione_udm  );
					echo '</option>';
				}
					echo '</optgroup>';
					echo '</select>';				
				echo '</td>';
		
				echo '<td>';
				
				echo'<a href="index.php?option=com_trinacria&view=occorrente" style="text-decoration: none;"><input value="Nuovo Occorrente" type="button"/></a>';
				
				echo '</td>';
	echo '</tr>';
	echo '</table>';

	echo '</div>';
	
	
	
	echo '<div>';
	
	echo '<table id="hor-zebra" border="1" cellspacing="1" cellpadding="1">';
		echo '<tr>';
			echo '<th cope="row" colspan="2">';
				echo JText::_('Dettaglio&nbsp;Merce');
			echo '</th>';
		echo '</tr>';
		echo '<tr>';
			echo '<th scope="row">';
				echo JText::_('Quantit&agrave');
			echo '</th>';
			echo '<td>';
					echo '<input class="text_area" type="text" name="disponibilita" id="disponibilita" maxlength="16" value="';
					
					echo '"/>';	
				echo '</td>';
		echo '<tr>';
		
		echo '<tr>';
			echo '<th scope="row">';
			echo JText::_('Scadenza&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
			echo '</th>';
			echo '<td>';
  					echo JHTML::_('calendar', $fv, 'scadenza', 'scadenza', '%d-%m-%Y', array('size'=>'9'));
				echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
			
			echo '<th scope="col">';
				echo JText::_('Lotto');
			echo '</th>';
			
			echo '<td>';
					echo '<input class="text_area" type="text" name="lotto" id="lotto" maxlength="50" value="';
					echo '"/>';	
			echo '</td>';
				
		echo '</tr>';
		
		
		echo '<tr>';
			echo '<th scope="row">';
				echo JText::_('Costo &euro;');
			echo '</th>';
				echo '<td>';
					echo '<input class="text_area" type="text" name="costo" id="costo"  maxlength="50" value="';	
					echo '"/>';	
					
				echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
			echo '<th scope="row">';
				echo JText::_('Fornitore');
			echo '</th>';
				echo '<td>';
				$arr = array();
				$arr[] = JHTML::_('select.option','', JText::_('Seleziona Fornitore'));
					$arr[] = JHTML::_('select.optgroup',  JText::_('Fornitori&nbsp;Disponibili'));
					for($p=0;$p<count($listaFornitori); $p++){
						$arr[] = JHTML::_('select.option',  JText::_($listaFornitori[$p]->id_anagrafica), JText::_($listaFornitori[$p]->nominativo));
					}
 				echo JHTML::_('select.genericlist', $arr, 'id_fornitore', null, 'value', 'text', '');
				echo '</td>';
		echo '</tr>';

	/*
		echo '<tr>';
			echo '<th scope="row">';
				echo JText::_('Data&nbsp;di&nbsp;Movimento');
			echo '</th>';
			echo '<td>';
					$dds= date('d-m-Y',time());
  					echo JHTML::_('calendar', $dds, 'data_scarico', 'data_scarico', '%d-%m-%Y', array('size'=>'9'));
				echo '</td>';
		echo '</tr>';
	*/
	
		echo '<tr>';
			echo '<th scope="row">';
				echo JText::_('Data&nbsp;Bolla');
			echo '</th>';
			echo '<td>';
					//$dboll= date('d-m-Y',time());
  					echo JHTML::_('calendar', $dbolla, 'data_bolla', 'data_bolla', '%d-%m-%Y', array('size'=>'9'));
				echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
			echo '<th scope="row">';
				echo JText::_('N&ordm; Bolla');
			echo '</th>';
			echo '<td>';
					echo '<input class="text_area" type="text" name="numero_bolla" id="numero_bolla" maxlength="200" value="';
					echo '"/>';	
				echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
			echo '<th scope="row">';
				echo JText::_('Note');
			echo '</th>';
			echo '<td>';
					echo '<input class="text_area" type="text" name="note" id="note" maxlength="200" value="';
					echo '"/>';	
				echo '</td>';
		echo '</tr>';
		
		
		
	
	echo '</table>';
	
	/*
	echo '<div>';
	
	echo '<table id="hor-zebra" border="1" cellspacing="1" cellpadding="1">';
		echo '<tr>';
			echo '<th cope="row" colspan="5">';
				echo JText::_('Controlli&nbsp;al&nbsp;Ricevimento');
			echo '</th>';
		echo '</tr>';
		
		echo '<tr>';
			
			echo '<th scope="row">';
				echo JText::_('Condizione');
			echo '</th>';
			echo '<th scope="row">';
			echo JText::_('Integrit&agrave');
			echo '</th>';
			echo '<th scope="row">';
				echo JText::_('Temperatura&nbsp;Trasporto');
			echo '</th>';
			echo '<th scope="row">';
				echo JText::_('Accettazione');
			echo '</th>';
			echo '<th scope="row">';
				echo JText::_('Disposizione');
			echo '</th>';
		echo '</tr>';
		
		echo '<tr>';
			
			echo '<td>';
					echo '<select name="condizione" id="condizione">';

					echo '	<option value="';
					echo ' "';
					echo 'selected="selected">';
					echo '</option>';

					echo '<optgroup label="';
						echo JText::_('Scelta: ');
					echo'">';
				
					echo '	<option value="';
						echo JText::_('Ottima');
					echo '">';
						echo JText::_('Ottima');
					echo '</option>';
				
					echo '	<option value="';
						echo JText::_('Buona');
					echo '">';
						echo JText::_('Buona');
					echo '</option>';
				
					echo '	<option value="';
						echo JText::_('Scarsa');
					echo '">';
						echo JText::_('Scarsa');
					echo '</option>';
				
					echo '</optgroup>';
					echo '</select>';				
				echo '</td>';
				
				echo '<td>';
					echo '<select name="integrita" id="integrita">';

					echo '	<option value="';
					echo ' "';
					echo 'selected="selected">';
					echo '</option>';

					echo '<optgroup label="';
						echo JText::_('Scelta: ');
					echo'">';
				
					echo '	<option value="';
						echo JText::_('Ottima');
					echo '">';
						echo JText::_('Ottima');
					echo '</option>';
				
					echo '	<option value="';
						echo JText::_('Buona');
					echo '">';
						echo JText::_('Buona');
					echo '</option>';
				
					echo '	<option value="';
						echo JText::_('Scarsa');
					echo '">';
						echo JText::_('Scarsa');
					echo '</option>';
				
					echo '</optgroup>';
					echo '</select>';				
				echo '</td>';
		
				echo '<td>';
					echo '<input class="text_area" type="text" name="temperatura" id="temperatura" maxlength="5" value="';
					
					echo '"/>';	
				echo '</td>';
				
				echo '<td>';
					echo '<select name="accettazione" id="accettazione">';

					echo '	<option value="';
					echo ' "';
					echo 'selected="selected">';
					
					echo '</option>';

					echo '<optgroup label="';
						echo JText::_('Scelta: ');
					echo'">';
				
					echo '	<option value="';
						echo JText::_('Si');
					echo '">';
						echo JText::_('Si');
					echo '</option>';
				
					echo '	<option value="';
						echo JText::_('No');
					echo '">';
						echo JText::_('No');
					echo '</option>';
					echo '</optgroup>';
					echo '</select>';				
				echo '</td>';
		
				echo '<td>';
					echo '<select name="disposizione" id="disposizione">';

					echo '	<option value="';
					echo JText::_('Aperta');
					echo ' "';
					
					echo 'selected="selected">';
					echo JText::_('Aperta');
					echo '</option>';

					echo '<optgroup label="';
						echo JText::_('Scelta: ');
					echo'">';
				
					echo '	<option value="';
						echo JText::_('Aperta');
					echo '">';
						echo JText::_('Aperta');
					echo '</option>';
				
					echo '	<option value="';
						echo JText::_('Chiusa');
					echo '">';
						echo JText::_('Chiusa');
					echo '</option>';
					echo '</optgroup>';
					echo '</select>';				
				echo '</td>';
				
		echo '</tr>';

	echo '</table>';
	
	echo '</div>';

	*/
				echo '<p align="center">';
					echo '<input type="submit" name="Salva" value="Salva" />';
				echo '</p>';
			
	
	echo '</form>';
echo '</fieldset>';
	}

	

function displayCSSTableHor(){
echo ' <style type="text/css">';
		
echo ' #hor-zebra';
echo '{	font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;';
echo '	font-size: 12px;';
echo '	margin: 45px;';
echo '	width: 480px;';
echo '	text-align: left;';
echo '	border-collapse: collapse;}';

echo '#hor-zebra th';
echo '{	font-size: 14px;';
echo '	font-weight: bold;';
echo '	background: #000033;';
echo '	padding: 10px 8px;';
echo '	color: #FFFFFF;}';

echo '#hor-zebra td';
echo '{	padding: 8px;';
echo '	color: #669;}';

echo '#hor-zebra .odd';
echo '{	background: #e8edff; }';


		
echo '</style>';
	}
	
}

?>
