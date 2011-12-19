<?php

//codice anti accesso diretto
defined('_JEXEC') or die('Restricted access');

class AnagraficaHelper{
	
	function displayHome() {
		echo	'<div class="componentheading">'; 
			echo JText::_('Gestione  Anagrafica');
		echo '</div>'; 
	}


function displayAnagraficaForm($tipoAnagrafica) {
	echo '<div>';
	echo '<fieldset style="width: 720px;">';
	echo '<form name="anagraficaForm" id="anagraficaForm" method="post" action="index.php?option=com_trinacria&controller=anagrafica&task=submit" >';

	echo '<div>';
	
	echo '<table id="hor-zebra" width="100%" border="1" cellspacing="1" cellpadding="1">';
		echo '<tr>';
			echo '<th scope="row" colspan="2">';
				echo JText::_('Nuova Anagrafica');
			echo '</th>';
		echo '</tr>';
		
		
		echo '<tr>';
			echo '<th scope="row">';
				echo JText::_('Figura');
			echo '</th>';
			echo '<td>';
					$arr = array();
					$arr[] = JHTML::_('select.optgroup',  JText::_('Figure&nbsp;Disponibili'));
					for($p=0;$p<count($tipoAnagrafica); $p++){
						$arr[] = JHTML::_('select.option',  JText::_($tipoAnagrafica[$p]->id_tipo_anagrafica), JText::_($tipoAnagrafica[$p]->descrizione));
					}
 				echo JHTML::_('select.genericlist', $arr, 'id_tipo_anagrafica', null, 'value', 'text', null);
			echo '</td>';
		echo '</tr>';
		
		
		
		
		echo '<tr>';
			echo '<th scope="row">';
				echo JText::_('Nominativo');
			echo '</th>';
			echo '<td>';
					echo '<input class="text_area" type="text" name="nominativo" id="nominativo" size="75" maxlength="250" value="';
					echo '"/>';	
			echo '</td>';
				
		echo '</tr>';
		
		echo '<tr>';
			echo '<th scope="row">';
			echo JText::_('Partita&nbsp;IVA');
			echo '</th>';
			echo '<td>';
					echo '<input class="text_area" type="text" name="partita_iva" id="partita_iva" maxlength="11" size="11" value="';
					echo '"/>';	
			echo '</td>';
				
		echo '</tr>';
		
		echo '<tr>';
			echo '<th scope="col">';
				echo JText::_('Codice&nbsp;Fiscale');
			echo '</th>';
			echo '<td>';
					echo '<input class="text_area" type="text" name="codice_fiscale" id="codice_fiscale" maxlength="16" size="16" value="';
					echo '"/>';	
			echo '</td>';	
		echo '</tr>';
		
		
		echo '<tr>';
			echo '<th scope="col">';
				echo JText::_('Indirizzo');
			echo '</th>';
			echo '<td>';
					echo '<input class="text_area" type="text" name="indirizzo" id="indirizzo" maxlength="250" size="75" value="';
					echo '"/>';	
			echo '</td>';	
		echo '</tr>';
		
		echo '<tr>';
			echo '<th scope="col">';
				echo JText::_('Recapiti');
			echo '</th>';
			echo '<td>';
					echo '<input class="text_area" type="text" name="recapiti" id="recapiti" maxlength="250" size="75" value="';
					echo '"/>';	
			echo '</td>';	
		echo '</tr>';
		
		echo '<tr>';
			echo '<th scope="col">';
				echo JText::_('E-mail');
			echo '</th>';
			echo '<td>';
					echo '<input class="text_area" type="text" name="email" id="email" maxlength="250" size="75" value="';
					echo '"/>';	
			echo '</td>';	
		echo '</tr>';
		
		echo '<tr>';
			echo '<th scope="row">';
				echo JText::_('Note');
			echo '</th>';
			echo '<td>';
					echo '<input class="text_area" type="text" name="note" id="note" maxlength="200" size="75" value="';
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

	
	
	
	
function displayAnagraficaTable($items, $tipoAnagrafica, $listaFornitori) {
	echo '<table id="hor-zebra"  border="1" cellspacing="1" cellpadding="1">';
		echo '<tr>';
			echo '<th scope="row">';
				echo JText::_('Figura');
			echo '</th>';
			echo '<th scope="row">';
				echo JText::_('Nominativo');
			echo '</th>';
			echo '<th scope="row" >';
				echo JText::_('Partita&nbsp;IVA');
			echo '</th>';
			echo '<th scope="row" >';
				echo JText::_('Codice&nbsp;Fiscale');
			echo '</th>';
			echo '<th scope="row">';
				echo JText::_('Indirizzo');
			echo '</th>';
			echo '<th scope="row">';
				echo JText::_('Recapiti');
			echo '</th>';
			echo '<th scope="row">';
				echo JText::_('Email');
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
			echo '<form name="anagraficaFormMod'.$i.'" id="anagraficaFormMod'.$i.'" method="post" action="index.php?option=com_trinacria&controller=anagrafica&task=submit"onsubmit="if(!confirm(\'Sicuro di voler modificare?\')){this.action=\'index.php?option=com_trinacria&view=anagrafica\'}">';
				echo '<td>';
					echo '<input type="hidden" name="id_anagrafica" id="id_anagrafica" value="';
					echo JText::_($items[$i]->id_anagrafica);
					echo '"/>';
					echo '<input type="hidden" name="id_tipo_anagrafica" id="id_tipo_anagrafica" value="';
					echo JText::_($items[$i]->id_tipo_anagrafica);
					echo '"/>';
$optionSelected = JText::_($items[$i]->id_tipo_anagrafica);
					$arr = array();
					$arr[] = JHTML::_('select.optgroup',  JText::_('Figure&nbsp;Disponibili'));
					for($p=0;$p<count($tipoAnagrafica); $p++){
						$arr[] = JHTML::_('select.option',  JText::_($tipoAnagrafica[$p]->id_tipo_anagrafica), JText::_($tipoAnagrafica[$p]->descrizione));
					}
 				echo JHTML::_('select.genericlist', $arr, 'id_tipo_anagrafica', null, 'value', 'text',  $optionSelected);
				echo '</td>';
				
				echo '<td>';
				echo '<input class="text_area" type="text" name="nominativo" id="nominativo" maxlength="50" value="';
					echo JText::_($items[$i]->nominativo);
					echo '"/>';
				echo '</td>';	
				
				echo '<td>';
					echo '<input class="text_area" type="text" name="partita_iva" id="partita_iva" maxlength="11" size="11" value="';
					echo JText::_($items[$i]->partita_iva);
					echo '"/>';	
				echo '</td>';
				
				echo '<td>';
					echo '<input class="text_area" type="text" name="codice_fiscale" id="codice_fiscale" maxlength="16" size="16" value="';
					echo JText::_($items[$i]->codice_fiscale);
					echo '"/>';	
				echo '</td>';
				
				echo '<td>';
					echo '<input class="text_area" type="text" name="indirizzo" id="indirizzo" maxlength="50" size="5" value="';
					echo JText::_($items[$i]->indirizzo);
					echo '"/>';	
				echo '</td>';
				echo '<td>';
					echo '<input class="text_area" type="text" name="recapiti" id="recapiti"  maxlength="50" size="5" value="';
					echo JText::_($items[$i]->recapiti);
					echo '"/>';	
				echo '</td>';
				
				echo '<td>';
					echo '<input class="text_area" type="text" name="email" id="email" maxlength="50" size="5" value="';
					echo JText::_($items[$i]->email);
					echo '"/>';	
				echo '</td>';
				
				echo '<td>';
					echo '<input class="text_area" type="text" name="note" id="note" maxlength="200" size="5" value="';
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
