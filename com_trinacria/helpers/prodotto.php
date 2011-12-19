<?php

//codice anti accesso diretto
defined('_JEXEC') or die('Restricted access');

class ProdottoHelper{
	
	function displayHome() {
		echo	'<div class="componentheading">'; 
			echo JText::_('Gestione  Prodotti');
		echo '</div>'; 
	}
	
function displayProdottoTable($items) {
	echo '<table id="hor-zebra"  border="1" cellspacing="1" cellpadding="1">';
		echo '<tr>';
			echo '<th scope="row">';
				echo JText::_('Nome');
			echo '</th>';
			echo '<th scope="row">';
				echo JText::_('Unit&agrave&nbsp di Vendita');
			echo '</th>';
			echo '<th scope="row" >';
				echo JText::_('Lotto(ParteFissa)');
			echo '</th>';
			echo '<th scope="row" >';
				echo JText::_('Dimensione');
			echo '</th>';
			echo '<th scope="row" >';
				echo JText::_('Note');
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
			echo '<form name="prodottoFormMod'.$i.'" id="prodottoFormMod'.$i.'" method="post" action="index.php?option=com_trinacria&controller=prodotto&task=submit" onsubmit="if(!confirm(\'Sicuro di voler modificare?\')){this.action=\'index.php?option=com_trinacria&view=prodotto\'}">'; 
				echo '<td>';
					echo '<input type="hidden" name="id_prodotto" id="id_prodotto" value="';
					echo JText::_($items[$i]->id_prodotto);
					echo '"/>';
			
					echo '<input class="text_area" type="text" name="nome" id="nome" maxlength="50" value="';
					echo JText::_($items[$i]->nome);
					echo '"/>';	
				echo '</td>';
				
				echo '<td>';
					echo '<input class="text_area" type="text" name="unita_vendita" id="unita_vendita" maxlength="50" size="7" value="';
					echo JText::_($items[$i]->unita_vendita);
					echo '"/>';	
				echo '</td>';
				
	
				
				echo '<td>';
					echo '<input class="text_area" type="text" name="lotto_parte_fissa" id="lotto_parte_fissa" size ="5" maxlength="50" value="';
					echo JText::_($items[$i]->lotto_parte_fissa);
					echo '"/>';	
				echo '</td>';
				
				echo '<td>';
					echo '<input class="text_area" type="text" name="dimensione_cartone" size="5" id="dimensione_cartone" size="5" maxlength="50" value="';
					echo JText::_($items[$i]->dimensione_cartone);
					echo '"/>';	
				echo '</td>';
				
				echo '<td>';
					echo '<input class="text_area" type="text" name="note" id="note" maxlength="200" size="10" value="';
					echo JText::_($items[$i]->note);
					echo '"/>';	
				echo '</td>';
				
				
				
				echo '<td>';
				echo '<input type="submit" name="Modifica" value="Modifica"';
				echo '</td>';
			echo '</form>';
			echo '</tr>';
			
		}
	echo '</table>';
	
	}
	

function displayProdottoForm() {
	echo '<div>';
	echo '<fieldset style="width: 720px;">';
	echo '<form name="prodottoForm" id="prodottoForm" method="post" action="index.php?option=com_trinacria&controller=prodotto&task=submit" >';

	echo '<div>';
	
	echo '<table id="hor-zebra" width="100%" border="1" cellspacing="1" cellpadding="1">';
		echo '<tr>';
			echo '<th cope="row" colspan="2">';
				echo JText::_('Nuovo Prodotto');
			echo '</th>';
		echo '</tr>';
		
		echo '<tr>';
			echo '<th cope="row">';
				echo JText::_('Nome');
			echo '</th>';
			echo '<td>';
					echo '<input class="text_area" type="text" name="nome" id="nome" maxlength="50" value="';
					echo '"/>';	
			echo '</td>';
				
		echo '</tr>';
		
		echo '<tr>';
			echo '<th scope="row">';
			echo JText::_('Unit&agrave&nbsp;di&nbsp;vendita');
			echo '</th>';
			echo '<td>';
					echo '<input class="text_area" type="text" name="unita_vendita" id="unita_vendita" maxlength="50" value="';
					echo '"/>';	
			echo '</td>';
				
		echo '</tr>';
		
		echo '<tr>';
			echo '<th scope="col">';
				echo JText::_('Lotto(ParteFissa)');
			echo '</th>';
			echo '<td>';
					echo '<input class="text_area" type="text" name="lotto_parte_fissa" id="lotto_parte_fissa" maxlength="50" value="';
					echo '"/>';	
			echo '</td>';
				
		echo '</tr>';
		
		echo '<tr>';
			echo '<th scope="row">';
				echo JText::_('Dimensione&nbspCartone');
			echo '</th>';
				echo '<td>';
					echo '<input class="text_area" type="text" name="dimensione_cartone" id="dimensione_cartone"  maxlength="50" value="';	
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
	
	
	echo '<div>';
	
	
	echo '</div>';

	
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
