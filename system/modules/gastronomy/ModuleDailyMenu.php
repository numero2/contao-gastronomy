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
 * Class ModuleDailyMenu
 *
 * @copyright  numero2 2010 
 * @author     numero2 
 * @package    Controller
 */
class ModuleDailyMenu extends Module {


	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_daily_menu';

    
	/**
	 * Parse the template
	 * @return string
	 */
    public function generate() {

        if( $this->Input->get('pdf') ) {
        
            $this->_createPDF();
            return;
        }
        
        return parent::generate();
    }
    
    
	/**
	 * Creates a pdf
	 * @return none
	 */
    private function _createPDF() {
    
        $oTpl = NULL;
        $oTpl = new FrontendTemplate('mod_daily_menu_pdf');

        $iMinDate = 0;
        $iMaxDate = 0;
    
        $aLocals = array();
        $oLocals = array();

        $sQuery = " SELECT * FROM tl_gastronomy_locals ORDER BY name ASC; ";        
        $oLocals = $this->Database->execute($sQuery);        
        $aLocals = $oLocals->fetchAllAssoc();
        
        if( !empty($aLocals) ) {
        
            foreach( $aLocals as $i => $local ) {
         
                // resize the logo
                if( !empty($local['logo']) ) {
                
                    $resizedLogo = NULL;
                    $resizedLogo = $this->getImage($local['logo'], 200, NULL);
                    
                    if( $resizedLogo )
                        $local['logo'] = $resizedLogo;
                }
         
                $aMenus = array();
                $oMenus = array();

                $weekStartingDate = NULL;
                $weekStartingDate = $this->week_to_date( time() );
                
                $sQuery = " SELECT * FROM tl_gastronomy_dailymenus WHERE pid = ".(int)$local['id']." AND date >= '" .strtotime($weekStartingDate). "' AND date < '" .(strtotime($weekStartingDate)+(86400*$this->dailymenu_num_days)). "' ORDER BY date ASC; ";
                $oMenus = $this->Database->execute($sQuery);
                $aMenus = $oMenus->fetchAllAssoc();
                
                if( !empty($aMenus) ) {
                
                    foreach( $aMenus as $menu ) {
                    
                        if( !$iMinDate || $menu['date'] < $iMinDate )
                            $iMinDate = $menu['date'];
                        if( !$iMaxDate || $menu['date'] > $iMaxDate )
                            $iMaxDate = $menu['date'];
                    }
                }
                
                $local['_menus'] = $aMenus;
                
                $aLocals[$i] = $local;
            }
        }
        
        $oTpl->minDate = $iMinDate;
        $oTpl->maxDate = $iMaxDate;
        $oTpl->locals = $aLocals;
    
        $sHTML = $oTpl->parse();
		$sHTML = $this->replaceInsertTags($sHTML);
    
        // set title
        $pdfTitle = sprintf($GLOBALS['TL_LANG']['tl_gastronomy_dailymenus']['menu_from_till'],date('d.m',$iMinDate),date('d.m',$iMaxDate));
    
		// Include library
		require_once(TL_ROOT . '/system/config/tcpdf.php');
		require_once(TL_ROOT . '/plugins/tcpdf/tcpdf.php');

		// Create new PDF document
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true);

		// Set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor(PDF_AUTHOR);
		$pdf->SetTitle($pdfTitle);
		$pdf->SetSubject($pdfTitle);
		//$pdf->SetKeywords($objArticle->keywords);

		// Prevent font subsetting (huge speed improvement)
		$pdf->setFontSubsetting(false);

		// Remove default header/footer
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

		// Set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

		// Set auto page breaks
		$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

		// Set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// Set some language-dependent strings
		$pdf->setLanguageArray($l);

		// Initialize document and add a page
		$pdf->AliasNbPages();
		$pdf->AddPage();

		// Set font
		$pdf->SetFont('helvetica', '', PDF_FONT_SIZE_MAIN);
        
		// Write the HTML content
		$pdf->writeHTML( $sHTML, true, 0, true, 0);

		// Close and output PDF document
		$pdf->lastPage();
		$pdf->Output(standardize(ampersand($pdfTitle, false)) . '.pdf', 'D');
    
        exit();
    }
    

	/**
	 * Generate module
	 */
	protected function compile() {

        $iMinDate = 0;
        $iMaxDate = 0;
    
        $aLocals = array();
        $oLocals = array();

        $sQuery = " SELECT * FROM tl_gastronomy_locals ORDER BY name ASC; ";        
        $oLocals = $this->Database->execute($sQuery);        
        $aLocals = $oLocals->fetchAllAssoc();
        
        if( !empty($aLocals) ) {
        
            foreach( $aLocals as $i => $local ) {
         
                // resize the logo
                if( !empty($local['logo']) ) {
                
                    $resizedLogo = NULL;
                    $resizedLogo = $this->getImage($local['logo'], 100, NULL);
                    
                    if( $resizedLogo )
                        $local['logo'] = $resizedLogo;
                }
         
                $aMenus = array();
                $oMenus = array();

                $weekStartingDate = NULL;
                $weekStartingDate = $this->week_to_date( time() );
                
                $sQuery = " SELECT * FROM tl_gastronomy_dailymenus WHERE pid = ".(int)$local['id']." AND date >= '" .strtotime($weekStartingDate). "' AND date < '" .(strtotime($weekStartingDate)+(86400*$this->dailymenu_num_days)). "' ORDER BY date ASC; ";
                $oMenus = $this->Database->execute($sQuery);
                $aMenus = $oMenus->fetchAllAssoc();
                
                if( !empty($aMenus) ) {
                
                    foreach( $aMenus as $menu ) {
                    
                        if( !$iMinDate || $menu['date'] < $iMinDate )
                            $iMinDate = $menu['date'];
                        if( !$iMaxDate || $menu['date'] > $iMaxDate )
                            $iMaxDate = $menu['date'];
                    }
                }
                
                $local['_menus'] = $aMenus;
                
                $aLocals[$i] = $local;
            }
        }

        $this->Template->pdfLink = $this->addToUrl('pdf=1');        
        $this->Template->minDate = $iMinDate;
        $this->Template->maxDate = $iMaxDate;
        $this->Template->locals = $aLocals;
	}
    
	function week_to_date( $timestamp ) {
        
        if( date('N',$timestamp) == 6 )
            return date("Y-m-d H:i:s",$timestamp);
        else
            return date("Y-m-d H:i:s", strtotime("last saturday",$timestamp) );
	}
}

?>