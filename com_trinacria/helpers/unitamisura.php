<?php

//codice anti accesso diretto
defined('_JEXEC') or die('Restricted access');

class UnitamisuraHelper{
	
	function displayHome() {
		echo	'<div class="componentheading">'; 
			echo JText::_('Gestione Unit&agrave di Misura');
		echo '</div>'; 
	}
	
function displayUnitamisuraTable($items) {
	echo '<table id="hor-zebra" width="100%" border="1" cellspacing="1" cellpadding="1">';
		echo '<tr>';
			echo '<th scope="row">';
				echo JText::_('Descrizione');
			echo '</th>';
			echo '<th scope="row">';
				echo JText::_('&nbsp;');
			echo '</th>';
		echo '</tr>';
		
		for($i=0; $i<count($items); $i++){

		if($i%2 == 1){
			echo '<tr class="odd">';
		}else{
			echo '<tr>';
			}
			echo '<form name="unitamisuraFormMod'.$i.'" id="unitamisuraFormMod'.$i.'" method="post" action="index.php?option=com_trinacria&controller=unitamisura&task=submit" onsubmit="if(!confirm(\'Sicuro di voler modificare?\')){this.action=\'index.php?option=com_trinacria&view=unitamisura\'}">';
				echo '<td>';
				echo '<input type="hidden" name="id_unitamisura" id="id_unitamisura" value="';
				echo JText::_($items[$i]->id_unitamisura);
				echo '"/>';
				echo '<input class="text_area" type="text" name="descrizione" id="descrizione" maxlength="50" value="';
					echo JText::_($items[$i]->descrizione);
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
	

function displayUnitamisuraForm() {
	echo '<div>';
	echo '<fieldset style="width: 600px;">';
	echo '<form name="unitamisuraForm" id="unitamisuraForm" method="post" action="index.php?option=com_trinacria&controller=unitamisura&task=submit" >';
	echo '<table id="hor-zebra" width="100%" border="1" cellspacing="1" cellpadding="1">';
		echo '<tr>';
			echo '<th scope="row">';
				echo JText::_('Inserisci Nuova Unit&agrave di Misura');
			echo '</th>';
		echo '</tr>';
		
		echo '<tr>';
			echo '<th scoper="row">';
				echo JText::_('Descrizione');
				echo '<input type="hidden" name="id_unitamisura" id="unitamisura"/>';
			echo '</th>';
		echo '</tr>';
		echo '<tr>';
			echo '<td>';
				echo '<input class="text_area" type="text" name="descrizione" id="descrizione" size="50" maxlength="50" value=""/>';
			echo '</th>';
		echo '</td>';
			
		
		echo '<tr>';
			echo '<td colspan="1">';
				echo '<p align="center">';
					echo '<input type="submit" name="Salva" value="Salva" />';
				echo '</p>';
			echo '</td>';
		echo '</tr>';
		
	echo '</table>';
	
	echo '</form>';
	echo '</fieldset>';
	echo '</div>';
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