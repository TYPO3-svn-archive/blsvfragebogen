<?php
namespace BLSV\Blsvfragebogen\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c)  Berti Golf, <berti.golf@blsv.de>, BLSV
 *  Martin Gonschor <martin.gonschor@blsv.de>, BLSV
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
class Antworten extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * externenUID
	 *
	 * @var \integer
	 */
	protected $externeuid = 0;

	/**
	 * Wert
	 *
	 * @var \integer
	 */
	protected $value=0;

	/**
	 * Anmerkung
	 *
	 * @var \string
	 */
	protected $anmerkung = '';

	/**
	 * Sonstiges, und zwar:
	 *
	 * @var \string
	 */
	protected $sonstigestext = '';

	/**
	 * fragebogenteilnehmer
	 *
	 * @var \BLSV\Blsvfragebogen\Domain\Model\Fragebogenteilnehmer
	 * @lazy
	 */
	protected $fragebogenteilnehmer;

	/**
	 * __construct
	 *
	 * @param \BLSV\Blsvfragebogen\Domain\Model\Fragebogenteilnehmer $fragebogenteilnehmer
	 * @param number $externeUid
	 * @return Antworten
	 */
	public function __construct( \BLSV\Blsvfragebogen\Domain\Model\Fragebogenteilnehmer $fragebogenteilnehmer, $externeUid=0 ) {	
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();	
		$this->fragebogenteilnehmer = $fragebogenteilnehmer;
		$this->externeuid = $externeUid;
	}

	/**
	 * Initializes all ObjectStorage properties.
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		// empty
	}

	/**
	 * Returns the externeuid
	 *
	 * @return \integer $externeuid
	 */
	public function getExterneuid() {
		return $this->externeuid;
	}

	/**
	 * Sets the externeuid
	 *
	 * @param \integer $externeuid
	 * @return void
	 */
	public function setExterneuid($externeuid) {
		$this->externeuid = $externeuid;
	}

	/**
	 * Returns the value
	 *
	 * @return \integer $value
	 */
	public function getValue() {
		return $this->value;
	}

	/**
	 * Sets the value
	 *
	 * @param \integer $value
	 * @return void
	 */
	public function setValue($value) {
		$this->value = $value;
	}

	/**
	 * Returns the anmerkung
	 *
	 * @return \string $anmerkung
	 */
	public function getAnmerkung() {
		return $this->anmerkung;
	}

	/**
	 * Sets the anmerkung
	 *
	 * @param \string $anmerkung
	 * @return void
	 */
	public function setAnmerkung($anmerkung) {
		$this->anmerkung = $anmerkung;
	}

	/**
	 * Returns the sonstigestext
	 *
	 * @return \string $sonstigestext
	 */
	public function getSonstigestext() {
		return $this->sonstigestext;
	}

	/**
	 * Sets the sonstigestext
	 *
	 * @param \string $sonstigestext
	 * @return void
	 */
	public function setSonstigestext($sonstigestext) {
		$this->sonstigestext = $sonstigestext;
	}

	/**
	 * Returns the fragebogenteilnehmer
	 *
	 * @return \BLSV\Blsvfragebogen\Domain\Model\Fragebogenteilnehmer $fragebogenteilnehmer
	 */
	public function getFragebogenteilnehmer() {
		return $this->fragebogenteilnehmer;
	}

	/**
	 * Sets the fragebogenteilnehmer
	 *
	 * @param \BLSV\Blsvfragebogen\Domain\Model\Fragebogenteilnehmer $fragebogenteilnehmer
	 * @return void
	 */
	public function setFragebogenteilnehmer(\BLSV\Blsvfragebogen\Domain\Model\Fragebogenteilnehmer $fragebogenteilnehmer) {
		$this->fragebogenteilnehmer = $fragebogenteilnehmer;
	}

}
?>