<?php

//codice anti accesso diretto
defined('_JEXEC') or die('Restricted access');

class ProgrammaHelper{
	
	function displayHome() {
		echo	'<div class="componentheading">'; 
			echo JText::_('Gestione Programmi Produzione');
		echo '</div>'; 
	}
	
function displayProgrammaTable($items) {
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
			/*
			echo '<th scope="row" >';
				echo JText::_('Stato');
			echo '</th>';
			*/
			echo '<th scope="row" >';
				echo JText::_('&nbsp;');
			echo '</th>';
			echo '<th scope="row" >';
				echo JText::_('&nbsp;');
			echo '</th>';
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
			echo '<form name="programmaFormMod'.$i.'" id="programmaFormMod'.$i.'" method="post" action="index.php?option=com_trinacria&controller=programma&task=submit" onsubmit="if(!confirm(\'Sicuro di voler modificare?\')){this.action=\'index.php?option=com_trinacria&view=programma\'}">';
				echo '<td>';
					echo '<input type="hidden" name="id_programma" id="id_programma" value="';
					echo JText::_($items[$i]->id_programma);
					echo '"/>';
					echo '<input class="text_area" type="text" name="descrizione" id="descrizione" maxlength="50" value="';
					echo JText::_($items[$i]->descrizione);
					echo '"/>';	
				echo '</td>';
				
				
				echo '<td>';
				
					if($items[$i]->data_inserimento != "0000-00-00"){
    				$fv = strftime('%d-%m-%Y', strtotime($items[$i]->data_inserimento));
					}
					else{
						$fv = null;
					}
  					echo JHTML::_('calendar', $fv, 'data_inserimento', 'data_inserimento'.$i, '%d-%m-%Y', array('size'=>'9'));
						
				echo '</td>';
				
				echo '<td>';
				
				if($items[$i]->data_consegna != "0000-00-00"){
    				$dds = strftime('%d-%m-%Y', strtotime($items[$i]->data_consegna));
					}
					else{
						$dds = null;
					}
    				
  					echo JHTML::_('calendar', $dds, 'data_consegna', 'data_consegna'.$i, '%d-%m-%Y', array('size'=>'9'));
					
					
				echo '</td>';
				/*
				echo '<td>';
					echo '<input class="text_area" type="text" name="stato_programma" id="stato_programma" maxlength="200" size="5" value="';
					echo JText::_($items[$i]->stato_programma);
					echo '"/>';	
				echo '</td>';
				*/
				echo '<td>';
				echo '<input type="submit" name="Modifica" value="Modifica"';
				echo '</td>';
				
				echo '<td>';
				echo'<a id="a_elimina" name="a_elimina" href="index.php?option=com_trinacria&controller=programma&task=delete&id_programma='.$items[$i]->id_programma.'" style="text-decoration: none;">
					<input value="Elimina" type="button" id="conferma_elimina" name="conferma_elimina" onclick="if(!confirm(\'Sicuro di voler Eliminare?\')){document.getElementById(\'a_elimina\').href = \'index.php?option=com_trinacria&view=programma\';}">
					</a>';
				echo '</td>';
				
				echo '<td>';
				
				echo'<a href="index.php?option=com_trinacria&controller=rigaprogramma&task=callDettaglio&id_programma='.$items[$i]->id_programma.'" style="text-decoration: none;"><input value="Dettagli" type="button"></a>';
				
				echo '</td>';
				
				
			echo '</form>';
			echo '</tr>';
			
		}
	echo '</table>';
	
	}
	

function displayProgrammaForm() {
	echo '<div>';
	echo '<fieldset style="width: 720px;">';
	echo '<form name="programmaForm" id="programmaForm" method="post" action="index.php?option=com_trinacria&controller=programma&task=submit" >';

	
	echo '<div>';
	
	echo '<table id="hor-zebra" border="1" cellspacing="1" cellpadding="1">';
		echo '<tr>';
			echo '<th cope="row" colspan="2">';
				echo JText::_('Programma Produzione');
			echo '</th>';
		echo '</tr>';
		
		echo '<tr>';
			
			echo '<th scope="col">';
				echo JText::_('Descrizione');
			echo '</th>';
			
			echo '<td>';
					echo '<input class="text_area" type="text" name="descrizione" id="descrizione" maxlength="50" value="';
					echo '"/>';	
			echo '</td>';
				
		echo '</tr>';
		
		echo '<tr>';
			echo '<th scope="row">';
			echo JText::_('Data&nbsp;di&nbsp;Inserimento');
			echo '</th>';
			echo '<td>';
					$ddc= date('d-m-Y',time());
  					echo JHTML::_('calendar', $ddc, 'data_inserimento', 'data_inserimento', '%d-%m-%Y', array('size'=>'9'));
				echo '</td>';
		echo '</tr>';
		echo '<tr>';
			echo '<th scope="row">';
			echo JText::_('Data&nbsp;di&nbsp;Consegna');
			echo '</th>';
			echo '<td>';
					
  					echo JHTML::_('calendar', $fv, 'data_consegna', 'data_consegna', '%d-%m-%Y', array('size'=>'9'));
				echo '</td>';
		echo '</tr>';
		
		
		
		
		/*
		echo '<tr>';
			echo '<th scope="row">';
				echo JText::_('Stato');
			echo '</th>';
				echo '<td>';
					echo '<input class="text_area" type="text" name="stato_programma" id="stato_programma"  maxlength="50" value="';	
				echo '"/>';	
					
				echo '</td>';
		echo '</tr>';
		*/
		echo '</table>';
	

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
