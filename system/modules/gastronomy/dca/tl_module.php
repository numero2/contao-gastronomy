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
 * Add palettes to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['dailymenu_list'] = '{title_legend},name,headline,type;{config_legend:hide},dailymenu_list_tpl,dailymenu_list_locals;{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_module']['palettes']['dailymenu'] = '{title_legend},name,headline,type;{config_legend},dailymenu_num_days;{expert_legend:hide},guests,cssID,space';

/**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['dailymenu_list_locals'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['dailymenu_list_locals'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'options_callback'        => array('tl_module_locals', 'getLocals'),
	'eval'                    => array('mandatory'=>false, 'multiple'=>true, 'tl_class'=>'w50')
);
$GLOBALS['TL_DCA']['tl_module']['fields']['dailymenu_list_tpl'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['dailymenu_list_tpl'],
	'default'                 => 'mod_daily_menu_list',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => $this->getTemplateGroup('mod_daily_menu_'),
	'eval'                    => array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['dailymenu_num_days'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['dailymenu_num_days'],
	'default'                 => '7',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => range(1,14,1),
	'eval'                    => array('tl_class'=>'w50')
);

class tl_module_locals extends Backend {


    /**
    * Returns a list of all locals
    * @param value
    * @return string
    */
    public function getLocals() {
    
		$arrCalendars = array();
		$objCalendars = $this->Database->execute("SELECT id, name FROM tl_gastronomy_locals ORDER BY name");

		while ($objCalendars->next())
		{
				$arrCalendars[$objCalendars->id] = $objCalendars->name;
		}

		return $arrCalendars;
    }
}
?>