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
 * Class ModuleDailyMenuList
 *
 * @copyright  numero2 2010 
 * @author     numero2 
 * @package    Controller
 */
class ModuleDailyMenuList extends Module {

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_daily_menu_list';


	/**
	 * Generate module
	 */
	protected function compile() {

        $this->Template = new FrontendTemplate($this->dailymenu_list_tpl);
        
        // get list of selected locals to show
        $aLocalIds = !($this->dailymenu_list_locals) ? array() : unserialize($this->dailymenu_list_locals);
    
        $aMenus = array();
        $oMenus = array();

        $sQuery = " SELECT dml.name AS local ,dmm.* FROM tl_gastronomy_locals AS dml JOIN tl_gastronomy_dailymenus dmm ON( dmm.pid = dml.id ) WHERE DATE(FROM_UNIXTIME(dmm.date)) = '" .date('Y-m-d'). "' ";

        if( !empty($aLocalIds) ) {
        
            $sQuery .= " AND dml.id IN (".implode($aLocalIds).") ";
        }
        
        $sQuery .= " ; ";
        
        $oMenus = $this->Database->execute($sQuery);
        
        while( $oMenus->next() ) {
        
            $aMenus[] = array(
                'name'  => $oMenus->name
            ,   'price' => $oMenus->price
            ,   'date'  => $oMenus->date
            ,   'local' => $oMenus->local
            );
        }
        
        $this->Template->menus = $aMenus;

	}
}

?>