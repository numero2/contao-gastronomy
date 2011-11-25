<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2010 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  numero2 2010 
 * @author     numero2 
 * @package    contao 
 * @license    commercial 
 * @filesource
 */


/** 
 * Fields 
 */ 
$GLOBALS['TL_LANG']['tl_gastronomy_dailymenus']['name']   = array('Name des Gerichts', 'Bitte den Namen des Gerichts eingeben'); 
$GLOBALS['TL_LANG']['tl_gastronomy_dailymenus']['price']  = array('Preis', 'Bitte geben Sie den Preis ohne Angabe der Währung ein'); 
$GLOBALS['TL_LANG']['tl_gastronomy_dailymenus']['date']   = array('Datum', 'Wählen Sie aus für welches Datum das Gericht gilt.'); 

/** 
 * Reference 
 */ 
$GLOBALS['TL_LANG']['tl_gastronomy_dailymenus']['menu_legend'] = 'Gericht'; 
$GLOBALS['TL_LANG']['tl_gastronomy_dailymenus']['settings_legend'] = 'Einstellungen'; 

/** 
 * Listing
 */ 
$GLOBALS['TL_LANG']['tl_gastronomy_dailymenus']['from_past'] = 'Dieses Tagesgericht liegt bereits in der Vergangenheit'; 
$GLOBALS['TL_LANG']['tl_gastronomy_dailymenus']['from_today'] = 'Dies ist das Tagesgericht von heute'; 
$GLOBALS['TL_LANG']['tl_gastronomy_dailymenus']['no_menu_for_tomorrow'] = 'Sie haben noch kein Tagesgericht für morgen angelegt!'; 
$GLOBALS['TL_LANG']['tl_gastronomy_dailymenus']['no_menu_for_today'] = '<b>Achtung:</b> Sie haben noch kein Tagesgericht für heute angelegt!'; 

/** 
 * Buttons 
 */ 
$GLOBALS['TL_LANG']['tl_gastronomy_dailymenus']['new']    = array('Neues Tagesgericht', 'Ein neues Tagesgericht anlegen'); 
$GLOBALS['TL_LANG']['tl_gastronomy_dailymenus']['edit']   = array('Editieren', 'Tagesgericht ID %s editieren'); 
$GLOBALS['TL_LANG']['tl_gastronomy_dailymenus']['copy']   = array('Tagesgericht kopieren', 'Das Tagesgericht in die Zwischenablage kopieren'); 
$GLOBALS['TL_LANG']['tl_gastronomy_dailymenus']['delete'] = array('Tagesgericht löschen', 'Das Tagesgericht aus der Liste entfernen'); 
$GLOBALS['TL_LANG']['tl_gastronomy_dailymenus']['show']   = array('Details', 'Details des Tagesgerichts ID %s anzeigen');
?>