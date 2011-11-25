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
 * Table tl_gastronomy_dailymenus
 */
$GLOBALS['TL_DCA']['tl_gastronomy_dailymenus'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'enableVersioning'            => true,
        'ptable'                      => 'tl_gastronomy_locals',
        'onload_callback'             => array(
            array('tl_gastronomy_dailymenus', 'checkForMenuOfNextDay')
        )
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
          'mode'                    => 4,
          'fields'                  => array('date DESC'),
          'flag'                    => 5,
          'headerFields'            => array('name'),
          'panelLayout'             => 'sort,filter;search,limit',
          'child_record_callback'   => array('tl_gastronomy_dailymenus', 'listMenus'),
          'disableGrouping'         => true
		),
		'label' => array
		(
			'fields'                  => array('name','date'),
			'format'                  => '%s - %s'
		),
		'global_operations' => array
		(
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset();" accesskey="e"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_gastronomy_dailymenus']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_gastronomy_dailymenus']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_gastronomy_dailymenus']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_gastronomy_dailymenus']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),

	// Palettes
	'palettes' => array
	(
		'__selector__'                => array(''),
		'default'                     => '{menu_legend},name,price;{settings_legend},date;'
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
			'label'                   => &$GLOBALS['TL_LANG']['tl_gastronomy_dailymenus']['name'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50 wizard')
		),
		'price' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_gastronomy_dailymenus']['price'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50 wizard'),
            'save_callback'           => array( array('tl_gastronomy_dailymenus', 'correctPriceValue') )
		),
		'date' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_gastronomy_dailymenus']['date'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'date', 'datepicker'=>$this->getDatePickerString(), 'tl_class'=>'w50 wizard'),
            'default'                 => time()
		)        
	)
);


class tl_gastronomy_dailymenus extends Backend {


    /**
    * Throws some messages if there is no menu for today or tomorrow
    * depending on the weekend
    */
    public function checkForMenuOfNextDay() {

        if( $this->Input->get('act') )
            return;
    
        // get current weekday
        $currWD = date('w');
        $nextWD = date('w',(time()+86400));
        
        // check menu for today (don't check on weekend)
        if( $currWD != 0 && $currWD != 6 ) {

            $objMenus = $this->Database->prepare(" SELECT * FROM tl_gastronomy_dailymenus WHERE date >= '" .strtotime(date('Y-m-d')). "' AND date < '" .(time()+86400). "' AND `pid` = ? ")->limit(1)->execute( $this->Input->get('id') );
        
            if( !$objMenus->numRows )
                $_SESSION['TL_ERROR'][] = $GLOBALS['TL_LANG']['tl_gastronomy_dailymenus']['no_menu_for_today'];
        }
        
        // check menu for tomorrow (don't check on weekend)
        if( $nextWD != 0 && $nextWD != 6 ) {

            $objMenus = $this->Database->prepare(" SELECT * FROM tl_gastronomy_dailymenus WHERE date >= '" .strtotime(date('Y-m-d',(time()+86400))). "' AND date < '" .(time()+(86400*2)). "' AND `pid` = ? ")->limit(1)->execute( $this->Input->get('id') );
        
            if( !$objMenus->numRows )
                $_SESSION['TL_INFO'][] = $GLOBALS['TL_LANG']['tl_gastronomy_dailymenus']['no_menu_for_tomorrow'];
        }
    }


    /**
    * Corrects the price
    * @param value
    * @return string
    */
    public function correctPriceValue( $value ) {

        return str_replace(',','.',$value);
    }


    /**
    * List all menus of the selected local
    * @param array
    * @return string
    */
    public function listMenus( $arrRow ) {
    
        // highlight todays menu
        $rowStyle = date("Ymd",$arrRow['date']) == date("Ymd") ? 'font-weight: bold; color:#178C00;' : '';
        $rowTitle = date("Ymd",$arrRow['date']) == date("Ymd") ? $GLOBALS['TL_LANG']['tl_gastronomy_dailymenus']['from_today'] : '';
        
        // slightly fade out expired menus
        $rowStyle = ($arrRow['date'] < time() && date("Ymd",$arrRow['date']) != date("Ymd") ) ? 'color:#aaa' : $rowStyle;
        $rowTitle = ($arrRow['date'] < time() && date("Ymd",$arrRow['date']) != date("Ymd") ) ? $GLOBALS['TL_LANG']['tl_gastronomy_dailymenus']['from_past'] : $rowTitle;

        $sRow = '<div style="' .$rowStyle. '" title="'.$rowTitle.'">'
                    . '<span style="">'.date("d.m.Y",$arrRow['date']).'</span> - '.$arrRow['name']
               .'</div>';
        
        return $sRow;
    }
}

?>