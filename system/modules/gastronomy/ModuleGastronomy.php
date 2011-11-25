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
 * Class ModuleGastronomy
 *
 * @copyright  numero2 2010 
 * @author     numero2 
 * @package    Controller
 */
class ModuleGastronomy extends Frontend {


	/**
	 * Replace insert tags with their values
	 * @param string
	 * @return string
	 */
	protected function replaceInsertTags($strBuffer, $blnCache=false) {
       
        $aParams = explode('::', $strBuffer);
 
        switch( $aParams[0] ) {
        
            // insert a local
            case 'gastronomy_insert_local' :
            
                $oTpl = NULL;
                $oTpl = new FrontendTemplate('mod_locale_view');
                
                $oLocal = NULL;
                $oLocal = $this->Database->execute(" SELECT * FROM tl_gastronomy_locals WHERE `id` = ".(int)$aParams[1]." LIMIT 1; ");

                $oTpl->local = $oLocal->fetchAssoc();
                $oTpl->linkURL = "";
                
                // generate jumpTo link
                $oPage = NULL;
                $oPage = $this->Database->prepare("SELECT id, alias FROM tl_page WHERE id=?")->limit(1)->execute($oTpl->local['jumpTo']);

                if( $oPage->numRows ) {
                
                    $oTpl->linkURL = $this->generateFrontendUrl($oPage->fetchAssoc());
                }
                
                // user just wants data of a specific field
                if( !empty($aParams[2]) ) {
                
                    if( array_key_exists($aParams[2],$oTpl->local) )
                        return $oTpl->local[$aParams[2]];
                    else
                        throw new Exception("Unknown field `".$aParams[2]."` in inserttag");
                
                // display whole rendered info template
                } else {
                
                    return $oTpl->parse();
                }
                
            break;
            
            // not our insert tag?
            default :
                return false;
            break;
        }

        return false;
    
    }
}

?>