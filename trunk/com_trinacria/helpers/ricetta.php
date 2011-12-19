<?php

//codice anti accesso diretto
defined('_JEXEC') or die('Restricted access');

class RicettaHelper{
	
	function displayHome() {
		echo	'<div class="componentheading">'; 
			echo JText::_('Gestione Ricette');
		echo '</div>'; 
	}
	
function displaySelezionaProdotto($listaProdotti, $prodottoSelezionato) {
echo '<form name="ricettaProdottoForm" id="ricettaProdottoForm" method="post" action="index.php?option=com_trinacria&controller=ricetta&task=submitProdotto" >';	
		echo '<table id="hor-zebra"  border="1" cellspacing="1" cellpadding="1">';
		echo '<tr>';
			echo '<th scope="row" colspan="2">';
				echo JText::_('Seleziona Prodotto');
			echo '</th>';
		echo '</tr>';
		echo '<tr>';
			echo '<td class="even">';
				echo JText::_('Prodotti&nbsp;disponibili:&nbsp;');
				
				echo '<select name="id_prodotto" id="id_prodotto" onChange="submit()">';

					echo '	<option value="';
					echo JText::_($prodottoSelezionato->id_prodotto);
					echo ' "';
					echo 'selected="selected">';
					echo JText::_($prodottoSelezionato->nome);
					echo '</option>';
					echo '<optgroup label="';
						echo JText::_('Prodotti ');
					echo'">';
					for($i=0; $i<count($listaProdotti); $i++){
							
					echo '	<option value="';
						echo $listaProdotti[$i]->id_prodotto;
					echo '">';
						echo JText::_($listaProdotti[$i]->nome);
					echo '</option>';
						}
	
					echo '</select>';
				echo '</form>';	
			echo '</td>';
			
				echo '<td>';
				
				echo'<a href="index.php?option=com_trinacria&view=prodotto" style="text-decoration: none;"><input value="Nuovo Prodotto" type="button"/></a>';
				
				echo '</td>';
			
		echo '</tr>';
	echo '</table>';
	
	}

	
function displayRicettaForm($listaOccorrenti, $prodottoSelezionato) {
	
	
	
	echo '<div>';
	echo '<fieldset style="width: 720px;">';
	echo '<form name="ricettaForm" id="ricettaForm" method="post" action="index.php?option=com_trinacria&controller=ricetta&task=submit" >';
	
	echo '<div>';
	echo '<input type="hidden" name="id_prodotto" id="id_prodotto" value="';
					echo JText::_($prodottoSelezionato->id_prodotto);
	echo '"/>';	
	
		
	echo '<table id="hor-zebra" width="100%" border="1" cellspacing="1" cellpadding="1">';
		echo '<tr>';
			echo '<th cope="row" colspan="2">';
				echo JText::_('Seleziona Occorrente');
			echo '</th>';
		echo '</tr>';
		
	echo '<tr>';
		echo '<td>';
					echo '<select name="id_occorrente" id="id_occorrente">';

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
						echo JText::_($listaOccorrenti[$i]->id_occorrente);
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
				echo JText::_('Dettaglio&nbsp;Occorrente');
			echo '</th>';
		echo '</tr>';
		
		echo '<tr>';
			echo '<th scope="row">';
			echo JText::_('Quantit&agrave');
			echo '</th>';
			echo '<td>';
					echo '<input class="text_area" type="text" name="quantita" id="quantita" maxlength="50" value="';
					echo '"/>';	
			echo '</td>';	
		echo '</tr>';
		
		echo '<tr>';
			echo '<th scope="row">';
			echo JText::_('Percentuale&nbsp;Totale');
			echo '</th>';
			echo '<td>';
					echo '<input class="text_area" type="text" name="percentuale_totale" id="percentuale_totale" maxlength="50" value="';
					echo '"/>';	
			echo '</td>';	
		echo '</tr>';
		
	
	echo '</table>';
	
	
		
				echo '<p align="center">';
					echo '<input type="submit" name="Salva" value="Salva" />';
				echo '</p>';
			
	
	echo '</form>';
echo '</fieldset>';
	}
	
	
	
function displayRicettaTable($items, $prodottoSelezionato) {
	
	
	echo '<table id="hor-zebra"  border="1" cellspacing="1" cellpadding="1">';
		echo '<tr>';
			echo '<th scope="row">';
				echo JText::_('Descrizione');
			echo '</th>';
			echo '<th scope="row" >';
				echo JText::_('Quantit&agrave');
			echo '</th>';
			echo '<th scope="row" >';
				echo JText::_('Percentuale Totale');
			echo '</th>';
			echo '<th scope="row" >';
				echo JText::_('Note');
			echo '</th>';
			echo '<th scope="row" colspan="2">';
				echo JText::_('&nbsp;');
			echo '</th>';
		echo '</tr>';
		
		for($i=0; $i<count($items); $i++){

		if($i%2 == 1){
			echo '<tr class="odd">';
		}else{
			echo '<tr>';
			}
			echo '<form name="ricettaFormMod'.$i.'" id="ricettaFormMod'.$i.'" method="post" action="index.php?option=com_trinacria&controller=ricetta&task=submit" >';
			echo '<input type="hidden" name="id_prodotto" id="id_prodotto" value="';
					echo JText::_($prodottoSelezionato->id_prodotto);
					echo '"/>';	
			echo '<input type="hidden" name="id_ricetta" id="id_ricetta" value="';
					echo JText::_($items[$i]->id_ricetta);
					echo '"/>';	
			echo '<td>';		
			echo '<input type="hidden" name="id_occorrente" id="id_occorrente" value="';
					echo JText::_($items[$i]->id_occorrente);
					echo '"/>';
					//echo '<input class="text_area" type="text" name="descrizione" id="descrizione" maxlength="50" value="';
					echo JText::_($items[$i]->descrizione. ' - '. $items[$i]->quantita_occorrente.' '.$items[$i]->descrizione_udm  );
					//echo '"/>';	
				echo '</td>';
				
				echo '<td>';
					echo '<input class="text_area" type="text" name="quantita" id="quantita" maxlength="50" size="7" value="';
					echo JText::_($items[$i]->quantita);
					echo '"/>';	
				echo '</td>';
				echo '<td>';
					echo '<input class="text_area" type="text" name="percentuale_totale" id="percentuale_totale" maxlength="50" size="7" value="';
					echo JText::_($items[$i]->percentuale_totale);
					echo '"/>';	
				echo '</td>';
				echo '<td>';
					echo '<input class="text_area" type="text" name="note" id="note" maxlength="50" size="7" value="';
					echo JText::_($items[$i]->note);
					echo '"/>';	
				echo '</td>';
				
				echo '<td>';
				echo '<input type="submit" name="Modifica" value="Modifica" />';
				echo '</td>';
			
			echo '</form>';
			echo '</tr>';
			
		}
	echo '</table>';
	
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
