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
 * Add palettes to tl_settings
 */
$GLOBALS['TL_DCA']['tl_settings']['palettes']['default'] = '{tl_gastronomy_legend},tl_gastronomy_city_autocomplete;' . $GLOBALS['TL_DCA']['tl_settings']['palettes']['default'];

/**
 * Add fields to tl_settings
 */
$GLOBALS['TL_DCA']['tl_settings']['fields']['tl_gastronomy_city_autocomplete'] = array(
	'label'				=> &$GLOBALS['TL_LANG']['tl_settings']['tl_gastronomy_city_autocomplete'],
	'inputType'			=> 'checkbox',
	'default'			=> '1',
	'eval'				=> array(
		'tl_class'			=> 'w50'
	)
);

?>