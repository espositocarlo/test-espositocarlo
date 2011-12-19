<?php

//codice anti accesso diretto
defined('_JEXEC') or die('Restricted access');

class RigaprogrammaHelper{
	
	function displayHome() {
		echo	'<div class="componentheading">'; 
			echo JText::_('Dettaglio Programma Produzione');
		echo '</div>'; 
	}


function displayInfoProgramma($programma) {
	echo '<table id="hor-zebra"  border="1" cellspacing="1" cellpadding="1">';
		echo '<tr>';
			echo '<th scope="row">';
				echo JText::_('Descrizione');
			echo '</th>';
			echo '<th scope="row">';
				echo JText::_('Data&nbsp;&nbsp;di&nbsp;&nbsp;Inserimento');
			echo '</th>';
			echo '<th scope="row">';
				echo JText::_('Data&nbsp;&nbsp;di&nbsp;&nbsp;Consegna');
			echo '</th>';
			echo '<th scope="row" >';
				echo JText::_('Stato');
			echo '</th>';
		echo '</tr>';
		
		echo '<tr>';

		
			echo '<td>';
					echo JText::_(str_ireplace(' ', '&nbsp;', $programma->descrizione));	
			echo '</td>';
				
			echo '<td>';
				
			if($programma->data_inserimento != "0000-00-00"){
    				$fv = strftime('%d-%m-%Y', strtotime($programma->data_inserimento));
					}
					else{
						$fv = null;
					}
							
				echo JText::_($fv);
				echo '</td>';

			echo '<td>';
				
			if($programma->data_consegna != "0000-00-00"){
    				$dds = strftime('%d-%m-%Y', strtotime($programma->data_consegna));
					}
					else{
						$dds = null;
					}
				
    				echo JText::_($dds);
  			echo '</td>';
				
			echo '<td>';
				
				echo JText::_(str_ireplace(' ', '&nbsp;', $programma->stato_programma));
					
			echo '</td>';
				
			echo '</tr>';
			
		
	echo '</table>';
	
	}
	
	
function displayRigaprogrammaForm($programma, $listaProdotti) {
	echo '<div>';
	echo '<fieldset style="width: 720px;">';
	echo '<form name="rigaprogrammaForm" id="rigaprogrammaForm" method="post" action="index.php?option=com_trinacria&controller=rigaprogramma&task=submit" >';

	echo '<div>';

	echo '<input type="hidden" name="id_programma" id="id_programma" value="';
					echo JText::_($programma->id_programma);
					echo '"/>';
	echo '<table id="hor-zebra" border="1" cellspacing="1" cellpadding="1">';
		echo '<tr>';
			echo '<th cope="row" colspan="3">';
				echo JText::_('Inserisci Dettaglio');
			echo '</th>';
		echo '</tr>';
		
		echo '<tr>';
			echo '<th scope="row">';
			echo JText::_('Seleziona&nbsp;Prodotto');
			echo '</th>';
			echo '<td>';
					echo '<select name="id_prodotto" id="id_prodotto">';

					echo '	<option value="';
					echo ' "';
					echo 'selected="selected">';
					echo JText::_('Seleziona Prodotto');
					echo '</option>';

					echo '<optgroup label="';
						echo JText::_('Prodotti');
					echo'">';
				for($i=0; $i<count($listaProdotti); $i++){
					echo '	<option value="';
						echo JText::_($listaProdotti[$i]->id_prodotto);
					echo '">';
					echo JText::_($listaProdotti[$i]->nome.' - '.$listaProdotti[$i]->unita_vendita);
					echo '</option>';
				}
					echo '</optgroup>';
					echo '</select>';				
				echo '</td>';
		
				echo '<td>';
				
				echo'<a href="index.php?option=com_trinacria&view=prodotto" style="text-decoration: none;"><input value="Nuovo Prodotto" type="button"/></a>';
				
				echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
			
			echo '<th scope="col">';
				echo JText::_('Quantit&agrave;');
			echo '</th>';
			echo '<td>';
					echo '<input class="text_area" type="text" name="quantita_da_produrre" id="quantita_da_produrre"  maxlength="50" value="';	
					echo '"/>';			
				echo '</td>';
				
		echo '</tr>';
		
		
		/*
		echo '<tr>';
			echo '<th scope="row">';
				echo JText::_('Tempo&nbsp;Produzione');
			echo '</th>';
				echo '<td>';
					echo '<input class="text_area" type="text" name="tempo_produzione" id="tempo_produzione"  maxlength="50" value="';	
					echo '"/>';			
				echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
			echo '<th scope="row">';
				echo JText::_('Stato');
			echo '</th>';
			echo '<td>';
					echo '<input class="text_area" type="text" name="stato" id="stato"  maxlength="50" value="';	
					echo '"/>';			
				echo '</td>';
		echo '</tr>';
		
	*/
	echo '</table>';
	
	echo '</div>';

	
				echo '<p align="center">';
					echo '<input type="submit" name="Salva" value="Salva" />';
				echo '</p>';
	
	echo '</form>';
echo '</fieldset>';
echo '</div>';
	}
	
	
function displayRigaprogrammaTable($items, $listaProdotti) {

	echo '<table id="hor-zebra"  border="1" cellspacing="1" cellpadding="1">';
		echo '<tr>';
			echo '<th scope="row">';
				echo JText::_('Prodotto');
			echo '</th>';
			echo '<th scope="row">';
				echo JText::_('Quantit&agrave;');
			echo '</th>';
			/*
			echo '<th scope="row" >';
				echo JText::_('Tempo&nbsp;Produzione');
			echo '</th>';
			echo '<th scope="row" >';
				echo JText::_('Stato');
			echo '</th>';
			*/
			echo '<th scope="row" >';
				echo JText::_('&nbsp;');
			echo '</th>';
			/*
			echo '<th scope="row" >';
				echo JText::_('&nbsp;');
			echo '</th>';
			*/
		echo '</tr>';
		
		for($i=0; $i<count($items); $i++){

		if($i%2 == 1){
			echo '<tr class="odd">';
		}else{
			echo '<tr>';
			}
			echo '<form name="rigaprogrammaFormMod'.$i.'" id="rigaprogrammaFormMod'.$i.'" method="post" action="index.php?option=com_trinacria&controller=rigaprogramma&task=submit" onsubmit="if(!confirm(\'Sicuro di voler modificare?\')){this.action=\'index.php?option=com_trinacria&controller=rigaprogramma&task=callDettaglio&id_programma='.$items[$i]->id_programma.'\'}">';
				echo '<td>';
					echo '<input type="hidden" name="id_riga_programma" id="id_riga_programma" value="';
					echo JText::_($items[$i]->id_riga_programma);
					echo '"/>';
					echo '<input type="hidden" name="id_programma" id="id_programma" value="';
					echo JText::_($items[$i]->id_programma);
					echo '"/>';
					
					
					echo '<select name="id_prodotto" id="id_prodotto">';

					echo '	<option value="';
					echo JText::_($items[$i]->id_prodotto);
					echo ' "';
					
					echo 'selected="selected">';
					echo JText::_($items[$i]->nome.' - '.$items[$i]->unita_vendita);
					echo '</option>';

					echo '<optgroup label="';
						echo JText::_('Prodotti');
					echo'">';

					for($k=0; $k<count($listaProdotti);$k++){
					echo '	<option value="';
						echo JText::_($listaProdotti[$k]->id_prodotto);
					echo ' ">';
						echo JText::_($listaProdotti[$k]->nome.' - '.$listaProdotti[$k]->unita_vendita);
					echo '</option>';
					}
					echo '</optgroup>';
					echo '</select>';	
				echo '</td>';
				
						
				echo '</td>';
				
				echo '<td>';
					echo '<input class="text_area" type="text" name="quantita_da_produrre" id="quantita_da_produrre" maxlength="50" size="7" value="';
					echo JText::_($items[$i]->quantita_da_produrre);
					echo '"/>';	
				echo '</td>';

				/*
				echo '<td>';
					echo '<input class="text_area" type="text" name="tempo_produzione" id="tempo_produzione" size ="5" maxlength="50" value="';
					echo JText::_($items[$i]->tempo_produzione);
					echo '"/>';	
					
				echo '</td>';
				
				
				echo '<td>';
					echo '<input class="text_area" type="stato" name="note" id="stato" maxlength="200" size="5" value="';
					echo JText::_($items[$i]->stato);
					echo '"/>';	
				echo '</td>';
								
				*/
				echo '<td>';
				echo '<input type="submit" name="Modifica" value="Modifica" />';
				echo '</td>';
				/*
				echo '<td>';
				echo'<a id="a_elimina" name="a_elimina" href="index.php?option=com_trinacria&controller=rigaprogramma&task=delete&id_programma='.$items[$i]->id_programma.'&id_riga_programma='.$items[$i]->id_riga_programma.'" style="text-decoration: none;">
					<input value="Elimina" type="button" id="conferma_elimina" name="conferma_elimina" onclick="if(!confirm(\'Sicuro di voler Eliminare?\')){document.getElementById(\'a_elimina\').href = \'index.php?option=com_trinacria&controller=rigaprogramma&task=callDettaglio&id_programma='.$items[$i]->id_programma.'\';}">
					</a>';
				echo '</td>';
				*/
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
