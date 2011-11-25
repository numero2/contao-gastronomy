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
 * Table tl_gastronomy_locals 
 */ 
$GLOBALS['TL_DCA']['tl_gastronomy_locals'] = array (

	// Config
	'config' => array (
		'dataContainer'               => 'Table',
		'enableVersioning'            => true,
        'ctable'                      => 'tl_gastronomy_dailymenus',
        'switchToEdit'                => true,
		'onload_callback' => array
		(
			array('tl_gastronomy_locals', 'checkPermission')
		),        
	),

	// List
	'list' => array (
		'sorting' => array (
			'mode'                    => 2,
			'fields'                  => array('name'),
			'flag'                    => 1
		),
		'label' => array (
			'fields'                  => array('name'),
			'format'                  => '%s'
		),
		'global_operations' => array
		(
            //
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_gastronomy_locals']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif',
                'button_callback'     => array('tl_gastronomy_locals', 'checkButtonPermission')                
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_gastronomy_locals']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"',
                'button_callback'     => array('tl_gastronomy_locals', 'checkButtonPermission')
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_gastronomy_locals']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),

	// Palettes
	'palettes' => array
	(
		'__selector__'                => array(''),
		'default'                     => '{common_legend},name,opening_times,description,jumpTo;{images_legend},logo,main_image;{adress_legend},addr_street,addr_postal,addr_city;{contact_legend},cont_phone;'
	),

	// Subpalettes
	'subpalettes' => array
	(
		''                            => ''
	),

	// Fields
	'fields' => array
	(
		'name' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_gastronomy_locals']['name'],
			'exclude'                 => false,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50')
		)
    ,   'opening_times' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_gastronomy_locals']['opening_times'],
			'exclude'                 => false,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50')
		)
    ,   'description' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_gastronomy_locals']['description'],
			'exclude'                 => false,
			'inputType'               => 'textarea',
			'eval'                    => array('mandatory'=>false, 'style' => 'height:100px;' )
		)
    ,   'jumpTo' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_gastronomy_locals']['jumpTo'],
			'exclude'                 => true,
			'inputType'               => 'pageTree',
			'eval'                    => array('fieldType'=>'radio')
		)        
    ,   'logo' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_gastronomy_locals']['logo'],
			'exclude'                 => false,
			'inputType'               => 'fileTree',
			'eval'                    => array('mandatory'=>false, 'files'=>true, 'fieldType'=>'radio', 'filesOnly' => true, 'extensions' => 'jpg,jpeg,png,gif')
		)
    ,   'main_image' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_gastronomy_locals']['main_image'],
			'exclude'                 => false,
			'inputType'               => 'fileTree',
			'eval'                    => array('mandatory'=>false, 'files'=>true, 'fieldType'=>'radio', 'filesOnly' => true, 'extensions' => 'jpg,jpeg,png,gif')
		)
    ,   'addr_street' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_gastronomy_locals']['addr_street'],
			'exclude'                 => false,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50')
		)
    ,   'addr_postal' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_gastronomy_locals']['addr_postal'],
			'exclude'                 => false,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'submitOnChange'=>true, 'tl_class'=>'w50')
		)
    ,   'addr_city' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_gastronomy_locals']['addr_city'],
			'exclude'                 => false,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50'),
            'save_callback'           => array( array('tl_gastronomy_locals', 'getCityByPostal') )
		)
    ,   'cont_phone' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_gastronomy_locals']['cont_phone'],
			'exclude'                 => false,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50')
		)
	)
);


// overwrite edit button when selecting specific module
if( !empty($GLOBALS['_GET']['do']) ) {

    switch( $GLOBALS['_GET']['do'] ) {
    
        case 'dailymenu' :
            $GLOBALS['TL_DCA']['tl_gastronomy_locals']['list']['operations']['edit'] = array(
                'label' => &$GLOBALS['TL_LANG']['tl_gastronomy_locals']['menus']
            ,   'href'  => 'table=tl_gastronomy_dailymenus'
            ,   'icon'  => 'edit.gif'
            );
            
            // we dont want to delete locals when editing other things
            unset($GLOBALS['TL_DCA']['tl_gastronomy_locals']['list']['operations']['delete']);
        break;
    }
}


class tl_gastronomy_locals extends Backend {


	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		$this->import('BackendUser', 'User');
	}
    
    
	/**
	 * Button Callback for checking permission
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */		
	public function checkButtonPermission($row, $href, $label, $title, $icon, $attributes) {

        $access = true;   

        if( $this->Input->get('do') == 'locals' ) {
            switch( $icon ) {
            
                case 'edit.gif' :
                    $access = $this->User->hasAccess('edit', 'gastronomy_locals_permissions');
                break;
                case 'delete.gif' :
                    $access = $this->User->hasAccess('delete', 'gastronomy_locals_permissions');
                break;                
            }
        }

        return ($this->User->isAdmin || $access ) ? '<a href="'.$this->addToUrl($href.'&id='.$row['id']).'" title="'.specialchars($title).'"'.$attributes.'>'.$this->generateImage($icon, $label).'</a> ' : $this->generateImage(preg_replace('/\.gif$/i', '_.gif', $icon)).' ';    
	}

    
	/**
	 * Check permissions to edit table tl_gastronomy_locals
	 */
	public function checkPermission() {

        // admins are allowed to do everything
		if( $this->User->isAdmin ) {
			return;
		}

        // filter results by enabled locals
        if( is_array($this->User->gastronomy_locals_list) ) {
            $GLOBALS['TL_DCA']['tl_gastronomy_locals']['list']['sorting']['filter'][] = array(
                'id IN('.implode(',',$this->User->gastronomy_locals_list).')'
            );
        }

        // check permissions for actions
        if( $this->Input->get('do') == 'locals' ) {
        
            // check permissions to add locals
            if( !$this->User->hasAccess('create', 'gastronomy_locals_permissions') ) {
                $GLOBALS['TL_DCA']['tl_gastronomy_locals']['config']['closed'] = true;
            }
        }
    }
    
    
    /**
    * Returns the city name according to the given postal
    * @param value
    * @return string
    */
    public function getCityByPostal( $value, $cont ) {
    
        if( $GLOBALS['TL_CONFIG']['tl_gastronomy_city_autocomplete'] ) {

            $postalCode = NULL;
            $postalCode = $cont->Input->post('addr_postal');

            $sReqURL = NULL;
            $sReqURL = sprintf("http://ws.geonames.org/postalCodeSearchJSON?postalcode=%s&maxRows=1&style=full&country=DE",trim($postalCode));

            $sResp = NULL;
            $sResp = @file_get_contents($sReqURL);

            if( !empty($sResp) ) {

                $aResp = array();
                $aResp = json_decode($sResp,1);

                if( !empty($aResp['postalCodes'][0]['placeName']) )
                    return $aResp['postalCodes'][0]['placeName'];
            }
        }

        return $value;
    }
}
?>