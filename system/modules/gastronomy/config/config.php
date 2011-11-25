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
 * Back end modules
 */
array_insert($GLOBALS['BE_MOD']['gastronomy'], 1, array (
	'locals' => array (
		'tables'     => array('tl_gastronomy_locals'),
		'icon'       => 'system/modules/gastronomy/html/icon_local.gif'
	)
/*
,   'menus' => array (
		'icon'       => 'system/modules/gastronomy/html/icon_menus.gif'
	)
,   'meals' => array (
		'icon'       => 'system/modules/gastronomy/html/icon_meals.gif'
	)
*/
,   'dailymenu' => array (
		'tables'     => array('tl_gastronomy_locals','tl_gastronomy_dailymenus'),
		'icon'       => 'system/modules/gastronomy/html/icon_menu.gif'
	)
));
 
 
/**
 * Front end modules
 */
array_insert($GLOBALS['FE_MOD'], 2, array
(
	'gastronomy' => array
	(
		'dailymenu_list'    => 'ModuleDailyMenuList'
    ,   'dailymenu'         => 'ModuleDailyMenu'
	)
));


/**
 * Register hooks
 */
$GLOBALS['TL_HOOKS']['replaceInsertTags'][] = array('ModuleGastronomy', 'replaceInsertTags');
?>