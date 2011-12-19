<?php

//codice anti accesso diretto
defined('_JEXEC') or die('Restricted access');

class OccorrenteHelper{
	
	function displayHome() {
		echo	'<div class="componentheading">'; 
			echo JText::_('Gestione Occorrente');
		echo '</div>'; 
	}
	
function displayOccorrenteTable($items, $uDm) {
	echo '<table id="hor-zebra" width="100%" border="1" cellspacing="1" cellpadding="1">';
		echo '<tr>';
			echo '<th scope="row">';
				echo JText::_('Descrizione');
			echo '</th>';
			echo '<th scope="row">';
				echo JText::_('Quanti&agrave');
			echo '</th>';
			echo '<th scope="row">';
				echo JText::_('UdM');
			echo '</th>';
			echo '<th scope="row">';
				echo JText::_('&nbsp;');
			echo '</th>';
			/*
			echo '<th scope="row">';
				echo JText::_('Note');
			echo '</th>';
			*/
		echo '</tr>';
		
		for($i=0; $i<count($items); $i++){

		if($i%2 == 1){
			echo '<tr class="odd">';
		}else{
			echo '<tr>';
			}
			echo '<form name="occorrenteFormMod'.$i.'" id="occorrenteFormMod'.$i.'" method="post" action="index.php?option=com_trinacria&controller=occorrente&task=submit" onsubmit="if(!confirm(\'Sicuro di voler modificare?\')){this.action=\'index.php?option=com_trinacria&view=occorrente\'}">';
				echo '<td>';
					echo '<input type="hidden" name="id_occorrente" id="id_occorrente" value="';
					echo JText::_($items[$i]->id_occorrente);
					echo '"/>';
				
					echo '<input class="text_area" type="text" name="descrizione" id="descrizione" maxlength="50" value="';
					echo JText::_($items[$i]->descrizione);
					echo '"/>';	
				echo '</td>';
				
				echo '<td>';
					echo '<input class="text_area" type="text" name="quantita" id="quantita" maxlength="11" value="';
					echo JText::_($items[$i]->quantita);
					echo '"/>';	
				echo '</td>';
				
					echo '<td>';
					echo '<select name="id_unitamisura" id="id_unitamisura">';

					echo '	<option value="';
					echo JText::_($items[$i]->id_unitamisura);
					echo ' "';
					echo 'selected="selected">';
					echo JText::_($items[$i]->descrizione_udm);
					echo '</option>';

					echo '<optgroup label="';
						echo JText::_('Unit&agrave di Misura');
					echo'">';
				for($j=0; $j<count($uDm); $j++){
					echo '	<option value="';
						echo JText::_($uDm[$j]->id_unitamisura);
					echo ' ">';
					echo JText::_($uDm[$j]->descrizione_udm);
					echo '</option>';
				}
					echo '</optgroup>';
					echo '</select>';
					
				echo '</td>';
				
				/*
				echo '<td>';
					echo '<input class="text_area" type="text" name="note" id="note" maxlength="200" value="';
					echo JText::_($items[$i]->note);
					echo '"/>';	
				echo '</td>';
				*/
				echo '<td>';
				echo '<input type="submit" name="Modifica" value="Modifica" />';
				echo '</td>';
			echo '</form>';
			echo '</tr>';
			
		}
	echo '</table>';
	
	}
	

function displayOccorrenteForm($uDm) {
	echo '<div>';
	echo '<fieldset style="width: 650px;">';
	echo '<form name="occorrenteForm" id="occorrenteForm" method="post" action="index.php?option=com_trinacria&controller=occorrente&task=submit" >';
	echo '<table id="hor-zebra" width="100%" border="1" cellspacing="1" cellpadding="1">';
		echo '<tr>';
			echo '<th cope="row" colspan="5">';
				echo JText::_('Inserisci Nuovo Occorrente');
			echo '</th>';
		echo '</tr>';
		
		echo '<tr>';
			echo '<th scope="row">';
				echo JText::_('Descrizione');
			echo '</th>';
			echo '<th scope="row">';
				echo JText::_('Quantit&agrave');
			echo '</th>';
			echo '<th scope="row">';
				echo JText::_('UdM');
			echo '</th>';
			echo '<th>';
			echo '&nbsp;';
			echo '</th>';
			
			/*
			echo '<td scope="row">';
				echo JText::_('Note');
			echo '</td>';
			*/
		echo '</tr>';
		
		echo '<tr>';
			echo '<td>';
					echo '<input type="hidden" name="id_occorrente" id="id_occorrente" value="';
					echo '"/>';
				
					echo '<input class="text_area" type="text" name="descrizione" id="descrizione" maxlength="50" value="';
					echo '"/>';	
					
				echo '</td>';
				
				echo '<td>';
					echo '<input class="text_area" type="text" name="quantita" id="quantita" maxlength="11" value="';
					echo '"/>';	
				echo '</td>';
				
				echo '<td>';
					echo '<select name="id_unitamisura" id="id_unitamisura">';

					echo '	<option value="';
					echo ' "';
					echo 'selected="selected">';
					echo '</option>';

					echo '<optgroup label="';
						echo JText::_('Unit&agrave di Misura');
					echo'">';
				for($i=0; $i<count($uDm); $i++){
					echo '	<option value="';
						echo JText::_($uDm[$i]->id_unitamisura);
					echo ' ">';
					echo JText::_($uDm[$i]->descrizione_udm);
					echo '</option>';
				}
					echo '</optgroup>';
					echo '</select>';				
				echo '</td>';
				
				/*
				echo '<td>';
					echo '<input class="text_area" type="text" name="note" id="note" maxlength="200" value="';
					echo '"/>';	
				echo '</td>';
				
				
				*/
				
				echo '<td>';
				
				echo'<a href="index.php?option=com_trinacria&view=unitamisura" style="text-decoration: none;"><input value="Nuova UdM" type="button"></a>';
				
				echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
			echo '<td colspan="4">';
				echo '<p align="center">';
					echo '<input type="submit" name="Salva" value="Salva" />';
				echo '</p>';
			echo '</td>';
		echo '</tr>';

	echo '</table>';
	echo '</div>';
	echo '</fieldset>';
	echo '</form>';
	
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

echo '#hor-zebra .totale';
echo '{		font-weight: bold;}';

echo '#hor-zebra .nome';
echo '{ font-size: 14px;';		
echo '  font-weight: bold;}';
		
		
echo '</style>';
	}
	
}

?>
