<?php
namespace BLSV\Blsvfragebogen\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 
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
class Fragen extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * gruppe
	 *
	 * @var \integer
	 * @validate NotEmpty
	 */
	protected $gruppe;

	/**
	 * frage
	 *
	 * @var \string
	 * @validate NotEmpty
	 */
	protected $frage;

	/**
	 * typ
	 *
	 * @var \integer
	 * @validate NotEmpty
	 */
	protected $typ;

	/**
	 * externebezeichnung
	 *
	 * @var \string
	 */
	protected $externebezeichnung;

	/**
	 * moeglcheantworten
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\BLSV\Blsvfragebogen\Domain\Model\Moeglicheantworten>
	 * @lazy
	 */
	protected $moeglcheantworten;

	/**
	 * __construct
	 *
	 * @return Fragen
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
		$this->moeglcheantworten = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Returns the gruppe
	 *
	 * @return \integer $gruppe
	 */
	public function getGruppe() {
		return $this->gruppe;
	}

	/**
	 * Sets the gruppe
	 *
	 * @param \integer $gruppe
	 * @return void
	 */
	public function setGruppe($gruppe) {
		$this->gruppe = $gruppe;
	}

	/**
	 * Returns the frage
	 *
	 * @return \string $frage
	 */
	public function getFrage() {
		return $this->frage;
	}

	/**
	 * Sets the frage
	 *
	 * @param \string $frage
	 * @return void
	 */
	public function setFrage($frage) {
		$this->frage = $frage;
	}

	/**
	 * Returns the typ
	 *
	 * @return \integer $typ
	 */
	public function getTyp() {
		return $this->typ;
	}

	/**
	 * Sets the typ
	 *
	 * @param \integer $typ
	 * @return void
	 */
	public function setTyp($typ) {
		$this->typ = $typ;
	}

	/**
	 * Returns the externebezeichnung
	 *
	 * @return \string $externebezeichnung
	 */
	public function getExternebezeichnung() {
		return $this->externebezeichnung;
	}

	/**
	 * Sets the externebezeichnung
	 *
	 * @param \string $externebezeichnung
	 * @return void
	 */
	public function setExternebezeichnung($externebezeichnung) {
		$this->externebezeichnung = $externebezeichnung;
	}

	/**
	 * Adds a Antworten
	 *
	 * @param \BLSV\Blsvfragebogen\Domain\Model\Moeglicheantworten $moeglcheantworten
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\BLSV\Blsvfragebogen\Domain\Model\Moeglicheantworten> moeglcheantworten
	 */
	public function addMoeglcheantworten(\BLSV\Blsvfragebogen\Domain\Model\Moeglicheantworten $moeglcheantworten) {
		$this->moeglcheantworten->attach($moeglcheantworten);
	}

	/**
	 * Removes a Antworten
	 *
	 * @param \BLSV\Blsvfragebogen\Domain\Model\Moeglicheantworten $moeglcheantwortenToRemove The Moeglicheantworten to be removed
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\BLSV\Blsvfragebogen\Domain\Model\Moeglicheantworten> moeglcheantworten
	 */
	public function removeMoeglcheantworten(\BLSV\Blsvfragebogen\Domain\Model\Moeglicheantworten $moeglcheantwortenToRemove) {
		$this->moeglcheantworten->detach($moeglcheantwortenToRemove);
	}

	/**
	 * Returns the moeglcheantworten
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\BLSV\Blsvfragebogen\Domain\Model\Moeglicheantworten> moeglcheantworten
	 */
	public function getMoeglcheantworten() {
		return $this->moeglcheantworten;
	}
	
	/**
	 * Returns the moeglcheantwortenOhneantworten
	 * 
	 * @param \BLSV\Blsvfragebogen\Domain\Model\Fragebogenteilnehmer $fragebogenteilnehmer
	 * @param array $eintraege
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\BLSV\Blsvfragebogen\Domain\Model\Moeglicheantworten> moeglcheantworten
	 */
	public function getMoeglcheantwortenOhneAntworten( \BLSV\Blsvfragebogen\Domain\Model\Fragebogenteilnehmer $fragebogenteilnehmer = NULL, $externUid = 0 ) {
		$moeglcheantwortenOhneantworten = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage;
		
		foreach ( $this->moeglcheantworten as $moeglicheAntwort ){
		 	if ( $moeglicheAntwort->getFirstAntwort( $fragebogenteilnehmer, $externUid ) == Null ){
		 		$antwort = New \BLSV\Blsvfragebogen\Domain\Model\Antworten( $fragebogenteilnehmer, $externUid );
		 		$moeglicheAntwort->addAntworten( $antwort );
		 		$moeglcheantwortenOhneantworten->attach( $moeglicheAntwort );			 		
		 	}
		}
		return $moeglcheantwortenOhneantworten;
	}
	

	/**
	 * Sets the moeglcheantworten
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\BLSV\Blsvfragebogen\Domain\Model\Moeglicheantworten> $moeglcheantworten
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\BLSV\Blsvfragebogen\Domain\Model\Moeglicheantworten> moeglcheantworten
	 */
	public function setMoeglcheantworten(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $moeglcheantworten) {
		$this->moeglcheantworten = $moeglcheantworten;
	}

}
?>