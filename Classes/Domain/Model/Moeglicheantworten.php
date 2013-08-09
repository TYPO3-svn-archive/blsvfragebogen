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
class Moeglicheantworten extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * vorbelegung
	 *
	 * @var \integer
	 */
	protected $vorbelegung;

	/**
	 * typ
	 *
	 * @var \integer
	 */
	protected $typ;

	/**
	 * antworten
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\BLSV\Blsvfragebogen\Domain\Model\Antworten>
	 * @lazy
	 */
	protected $antworten;
	
	/**
	 * antwort
	 *
	 * @var \string
	 */
	protected $antwort='';
	
	

	/**
	 * __construct
	 *
	 * @return Moeglicheatworten
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
		$this->antworten = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
	 * Adds a Antworten
	 *
	 * @param \BLSV\Blsvfragebogen\Domain\Model\Antworten $antworten
	 * @return void
	 */
	public function addAntworten(\BLSV\Blsvfragebogen\Domain\Model\Antworten $antworten) {
		$this->antworten->attach($antworten);
	}

	/**
	 * Removes a Antworten
	 *
	 * @param \BLSV\Blsvfragebogen\Domain\Model\Antworten $antwortenToRemove The Antworten to be removed
	 * @return void
	 */
	public function removeAntworten(\BLSV\Blsvfragebogen\Domain\Model\Antworten $antwortenToRemove) {
		$this->antworten->detach($antwortenToRemove);
	}

	/**
	 * Returns the antworten
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\BLSV\Blsvfragebogen\Domain\Model\Antworten> $antworten
	 */
	public function getAntworten() {
		return $this->antworten;
	}

	/**
	 * Sets the antworten
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\BLSV\Blsvfragebogen\Domain\Model\Antworten> $antworten
	 * @return void
	 */
	public function setAntworten(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $antworten) {
		$this->antworten = $antworten;
	}

	/**
	 * Returns the vorbelegung
	 *
	 * @return \integer vorbelegung
	 */
	public function getVorbelegung() {
		return $this->vorbelegung;
	}

	/**
	 * Sets the vorbelegung
	 *
	 * @param \integer $vorbelegung
	 * @return \integer vorbelegung
	 */
	public function setVorbelegung($vorbelegung) {
		$this->vorbelegung = $vorbelegung;
	}
	
	/**
	 * Returns the antwort
	 *
	 * @return \string $antwort
	 */
	public function getAntwort() {
		return $this->antwort;
	}
	
	/**
	 * Sets the antwort
	 *
	 * @param \string $antwort
	 * @return void
	 */
	public function setAntwort($antwort) {
		if (!$this->antwort->getFeuser()){
			$this->antwort->setFeuser($GLOBALS['TSFE']->fe_user->user['uid']);
		}
		$this->antwort = $antwort;
	}
	
	/**
	 * Returns the antwort
	 *
	 * @param \BLSV\Blsvfragebogen\Domain\Model\Fragebogenteilnehmer $fragebogenteilnehmer
	 * @param int $externUid
	 * @return mixed
	 */
	public function getFirstAntwort( \BLSV\Blsvfragebogen\Domain\Model\Fragebogenteilnehmer $fragebogenteilnehmer = NULL, $externUid=0  ) {
		if ( $this->antworten ){		
			foreach ( $this->antworten as $key => $antwort ) {
				if ( $fragebogenteilnehmer ){
					$fragebogenteilnehmerIskorrekt = $antwort->getFragebogenteilnehmer() && ( $antwort->getFragebogenteilnehmer()->getUid() === $fragebogenteilnehmer->getUid() );
				} 
				else{ //if there is no fragebogenteilnehmer given, check antworten with feuser
					$fragebogenteilnehmerIskorrekt = $antwort->getFragebogenteilnehmer() && ($antwort->getFragebogenteilnehmer()->getFeuser()->getUid() == $GLOBALS['TSFE']->fe_user->user['uid']);
				}
				
				if( $fragebogenteilnehmerIskorrekt && ( $antwort->getExterneuid() === $externUid ) ){					
					return $antwort;
				}
			}
		}
		return NUll;
	}
}
?>