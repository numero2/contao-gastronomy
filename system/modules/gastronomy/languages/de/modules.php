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

$GLOBALS['TL_LANG']['MOD']['gastronomy'] = 'Gastronomie';
 
 
/**
 * Back end modules
 */
$GLOBALS['TL_LANG']['MOD']['locals']    = array('Lokale', 'Lokale verwalten und als Liste ausgeben.');
$GLOBALS['TL_LANG']['MOD']['menus'] = array('Speisekarten', 'Speisekarten verwalten und als PDF exportieren.');
$GLOBALS['TL_LANG']['MOD']['meals'] = array('Speisen/Getränke', 'Verwaltung der Speisen und Getränke.');
$GLOBALS['TL_LANG']['MOD']['dailymenu'] = array('Tagesgerichte', 'Tagesgerichte verwalten und als Liste ausgeben.');


/**
 * Front end modules
 */
$GLOBALS['TL_LANG']['FMD']['gastronomy'] = $GLOBALS['TL_LANG']['MOD']['gastronomy'];
$GLOBALS['TL_LANG']['FMD']['dailymenu_list'] = array('Tagesgerichte Auflistung', 'Listet alle Tagesgerichte des aktuellen Tages auf');
$GLOBALS['TL_LANG']['FMD']['dailymenu'] = array('Tagesgerichte', 'Eine Seite mit einer Liste aller Tagesgerichte von allen Lokalen');

$GLOBALS['TL_LANG']['tl_module']['dailymenu_list_tpl']      = array('Template', 'Template der Auflistung');
$GLOBALS['TL_LANG']['tl_module']['dailymenu_list_locals']   = array('Anzuzeigende Lokale', 'Wählen Sie hier die Lokale deren Tagesgerichte angezeigt werden sollen');
$GLOBALS['TL_LANG']['tl_module']['dailymenu_num_days']      = array('Anzahl Tage','Hiermit bestimmen Sie für wieviele Tage im Vorraus die Tagesgerichte angezeigt werden sollen');

?>