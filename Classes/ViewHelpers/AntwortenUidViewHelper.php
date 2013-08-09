<?php
namespace BLSV\Blsvfragebogen\ViewHelpers;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Berti Golf <berti.golf@blsv.de>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 *
 *
 * @package blsvfragebogen
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class AntwortenUidViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {
	
	/**
	 * gibt die zugehörigge Antwort zurück
	 *
	 * @param \BLSV\Blsvfragebogen\Domain\Model\Moeglicheantworten $moeglicheantwort 
	 * @param \BLSV\Blsvfragebogen\Domain\Model\Fragebogenteilnehmer $fragebogenteilnehmer
	 * @param integer $externeUid
	 * @param string $property
	 * @return \BLSV\Blsvfragebogen\Domain\Model\Antworten
	 */
	public function render( \BLSV\Blsvfragebogen\Domain\Model\Moeglicheantworten $moeglicheantwort=null, \BLSV\Blsvfragebogen\Domain\Model\Fragebogenteilnehmer $fragebogenteilnehmer=null, $externeUid=0, $property="value" ) {
		if( $moeglicheantwort ){
			$getFunc='get' . ucfirst( $property );
			$antwort = $moeglicheantwort->getFirstAntwort( $fragebogenteilnehmer, $externeUid)->$getFunc();
		}
		else{
			$antwort = 0;
		}
		return $antwort;
	
	
	}
	
	
}