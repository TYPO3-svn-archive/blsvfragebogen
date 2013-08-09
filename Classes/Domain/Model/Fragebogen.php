<?php
namespace BLSV\Blsvfragebogen\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Berti Golf, <berti.golf@blsv.de>, BLSV
 *  Martin Gonschor <martin.gonschor@blsv.de>, BLSV
 *  
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
class Fragebogen extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * fragen
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\BLSV\Blsvfragebogen\Domain\Model\Fragen>
	 */
	protected $fragen;

	/**
	 * __construct
	 *
	 * @return Fragebogen
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all ObjectStorage properties.
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		/**
		 * Do not modify this method!
		 * It will be rewritten on each save in the extension builder
		 * You may modify the constructor of this class instead
		 */
		$this->fragen = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Adds a Fragen
	 *
	 * @param \BLSV\Blsvfragebogen\Domain\Model\Fragen $fragen
	 * @return void
	 */
	public function addFragen(\BLSV\Blsvfragebogen\Domain\Model\Fragen $fragen) {
		$this->fragen->attach($fragen);
	}

	/**
	 * Removes a Fragen
	 *
	 * @param \BLSV\Blsvfragebogen\Domain\Model\Fragen $fragenToRemove The Fragen to be removed
	 * @return void
	 */
	public function removeFragen(\BLSV\Blsvfragebogen\Domain\Model\Fragen $fragenToRemove) {
		$this->fragen->detach($fragenToRemove);
	}

	/**
	 * Returns the fragen
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\BLSV\Blsvfragebogen\Domain\Model\Fragen> $fragen
	 */
	public function getFragen() {
		return $this->fragen;
	}

	/**
	 * Sets the fragen
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\BLSV\Blsvfragebogen\Domain\Model\Fragen> $fragen
	 * @return void
	 */
	public function setFragen(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $fragen) {
		$this->fragen = $fragen;
	}

	/**
	 * Returns the moeglcheantwortenOhneantworten
	 *
	 * @param \BLSV\Blsvfragebogen\Domain\Model\Fragebogenteilnehmer $fragebogenteilnehmer
	 * @param array $eintraege
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\BLSV\Blsvfragebogen\Domain\Model\Moeglicheantworten> moeglcheantworten
	 */
	public function getMoeglcheantwortenOhneAntworten(  \BLSV\Blsvfragebogen\Domain\Model\Fragebogenteilnehmer $fragebogenteilnehmer=NULL, $eintraege = array() ) {
		$moeglcheantwortenOhneAntworten = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage;
		
		foreach($this->fragen as $frage){
			if( !$frage->getExternebezeichnung() ){
				foreach( $frage->getMoeglcheantwortenOhneAntworten( $fragebogenteilnehmer ) as $moeglicheAntworten){
					$moeglcheantwortenOhneAntworten->attach( $moeglicheAntworten );
				}
			}
			else{
				foreach ( $eintraege[$frage->getExternebezeichnung()] as $eintrag){
					foreach( $frage->getMoeglcheantwortenOhneAntworten( $fragebogenteilnehmer, $eintrag[uid] ) as $moeglicheAntworten){
						$moeglcheantwortenOhneAntworten->attach( $moeglicheAntworten );
					}
				}
			}
		}
		
		return $moeglcheantwortenOhneAntworten;
	}

	
}
?>