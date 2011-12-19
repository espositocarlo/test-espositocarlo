<?php

//codice anti accesso diretto
defined('_JEXEC') or die('Restricted access');

class RigaricettainversaHelper{
	
	function displayHome() {
		echo	'<div class="componentheading">'; 
			echo JText::_('Dettaglio Ricetta Inversa');
		echo '</div>'; 
	}


function displayInfoRicettainversa($ricettainversa) {
	echo '<table id="hor-zebra"  border="1" cellspacing="1" cellpadding="1">';
		echo '<tr>';
			echo '<th scope="row">';
				echo JText::_('Descrizione');
			echo '</th>';
			echo '<th scope="row">';
				echo JText::_('Data&nbsp;&nbsp;di&nbsp;&nbsp;Inserimento');
			echo '</th>';
			echo '<th scope="row">';
				echo JText::_('Prodotto');
			echo '</th>';
			echo '<th scope="row" >';
				echo JText::_('Quantit&agrave;');
			echo '</th>';
		echo '</tr>';
		
		echo '<tr>';

		
			echo '<td>';
					echo JText::_(str_ireplace(' ', '&nbsp;', $ricettainversa->descrizione));	
			echo '</td>';
				
			echo '<td>';
				
			if($ricettainversa->data_inserimento != "0000-00-00"){
    				$fv = strftime('%d-%m-%Y', strtotime($ricettainversa->data_inserimento));
					}
					else{
						$fv = null;
					}
							
				echo JText::_($fv);
				echo '</td>';

				
			echo '<td>';
				
				echo JText::_(str_ireplace(' ', '&nbsp;', $ricettainversa->nome));
					
			echo '</td>';
			echo '<td>';
				
				echo JText::_(str_ireplace(' ', '&nbsp;', $ricettainversa->quantita_prodotto));
					
			echo '</td>';
				
			echo '</tr>';
			
		
	echo '</table>';
	
	}
	
	
function displayRigaricettainversaForm($ricettainversa, $listaMerce) {
	echo '<div>';
	echo '<fieldset style="width: 720px;">';
	echo '<form name="rigaricettainversaForm" id="rigaricettainversaForm" method="post" action="index.php?option=com_trinacria&controller=rigaricettainversa&task=submit" >';

	echo '<div>';

	echo '<input type="hidden" name="id_ricetta_inversa" id="id_ricetta_inversa" value="';
					echo JText::_($ricettainversa->id_ricetta_inversa);
					echo '"/>';
	echo '<table id="hor-zebra" border="1" cellspacing="1" cellpadding="1">';
		echo '<tr>';
			echo '<th cope="row" colspan="3">';
				echo JText::_('Inserisci Dettaglio');
			echo '</th>';
		echo '</tr>';
		
		echo '<tr>';
			echo '<th scope="row">';
			echo JText::_('Seleziona&nbsp;Ingrediente');
			echo '</th>';
			echo '<td>';
					$arr = array();
					$arr[] = JHTML::_('select.option',  '', JText::_('Selezione Ingrediente'));
					$arr[] = JHTML::_('select.optgroup',  JText::_('Ingredienti'));
					for($p=0;$p<count($listaMerce); $p++){
						$arr[] = JHTML::_('select.option',  JText::_($listaMerce[$p]->id_merce), JText::_($listaMerce[$p]->descrizione.' - '.$listaMerce[$p]->lotto));
					}
					
 				echo JHTML::_('select.genericlist', $arr, 'id_merce', null, 'value', 'text', '');
				echo '</td>';
		
				echo '<td>';
				
				echo'<a href="index.php?option=com_trinacria&view=magazzino" style="text-decoration: none;"><input value="Nuovo Ingrediente" type="button"/></a>';
				
				echo '</td>';
		echo '</tr>';
		
		echo '<tr>';
			
			echo '<th scope="col">';
				echo JText::_('Quantit&agrave;');
			echo '</th>';
			echo '<td>';
					echo '<input class="text_area" type="text" name="quantita_merce" id="quantita_merce"  maxlength="50" value="';	
					echo '"/>';			
				echo '</td>';
				
		echo '</tr>';
		/*
		echo '<tr>';
			
			echo '<th scope="col">';
				echo JText::_('Percentuale');
			echo '</th>';
			echo '<td>';
					echo '<input class="text_area" type="text" name="percentuale_merce" id="percentuale_merce"  maxlength="50" value="';	
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
	
	
function displayRigaricettainversaTable($items, $listaMerce) {

	echo '<table id="hor-zebra"  border="1" cellspacing="1" cellpadding="1">';
		echo '<tr>';
			echo '<th scope="row">';
				echo JText::_('Ingrediente');
			echo '</th>';
			echo '<th scope="row">';
				echo JText::_('Quantit&agrave;');
			echo '</th>';
			echo '<th scope="row">';
				echo JText::_('Percentuale');
			echo '</th>';
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
			echo '<form name="rigaricettainversaFormMod'.$i.'" id="rigaricettainversaFormMod'.$i.'" method="post" action="index.php?option=com_trinacria&controller=rigaricettainversa&task=submit" onsubmit="if(!confirm(\'Sicuro di voler modificare?\')){this.action=\'index.php?option=com_trinacria&controller=rigaricettainversa&task=callDettaglio&id_ricetta_inversa='.$items[$i]->id_ricetta_inversa.'\'}">';
				echo '<td>';
					echo '<input type="hidden" name="id_riga_ricetta_inversa" id="id_riga_ricetta_inversa" value="';
					echo JText::_($items[$i]->id_riga_ricetta_inversa);
					echo '"/>';
					echo '<input type="hidden" name="id_ricetta_inversa" id="id_ricetta_inversa" value="';
					echo JText::_($items[$i]->id_ricetta_inversa);
					echo '"/>';
					
					$arr = array();
					
					$arr[] = JHTML::_('select.optgroup',  JText::_('Ingredienti'));
					for($p=0;$p<count($listaMerce); $p++){
						$arr[] = JHTML::_('select.option',  JText::_($listaMerce[$p]->id_merce), JText::_($listaMerce[$p]->descrizione.' - '.$listaMerce[$p]->lotto));
					}
					$optionSelected = $items[$i]->id_merce;
 				echo JHTML::_('select.genericlist', $arr, 'id_merce', null, 'value', 'text', $optionSelected);
					
				echo '</td>';
				
						
				echo '</td>';
				
				echo '<td>';
					echo '<input class="text_area" type="text" name="quantita_merce" id="quantita_merce" maxlength="50" size="7" value="';
					echo JText::_($items[$i]->quantita_merce);
					echo '"/>';	
				echo '</td>';

				echo '<td>';
					//echo '<input class="text_area" type="text" name="percentuale_merce" id="percentuale_merce" maxlength="50" size="7" value="';
					echo JText::_($items[$i]->percentuale_merce);
					//echo '"/>';	
				echo '</td>';
				
				echo '<td>';
				echo '<input type="submit" name="Modifica" value="Modifica" />';
				echo '</td>';
				
		/*
				echo '<td>';
				echo'<a id="a_elimina" name="a_elimina" href="index.php?option=com_trinacria&controller=rigaricettainversa&task=delete&id_ricetta_inversa='.$items[$i]->id_ricetta_inversa.'&id_riga_ricetta_inversa='.$items[$i]->id_riga_ricetta_inversa.'" style="text-decoration: none;">
					<input value="Elimina" type="button" id="conferma_elimina" name="conferma_elimina" onclick="if(!confirm(\'Sicuro di voler Eliminare?\')){document.getElementById(\'a_elimina\').href = \'index.php?option=com_trinacria&controller=rigaricettainversa&task=callDettaglio&id_ricetta_inversa='.$items[$i]->id_ricetta_inversa.'\';}">
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
