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
class Fragebogenteilnehmer extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * Titel
	 *
	 * @var \string
	 */
	protected $titel;

	/**
	 * Art des Fragebogens
	 *
	 * @var \integer
	 */
	protected $art;

	/**
	 * Veranstaltungsnummer
	 *
	 * @var \integer
	 */
	protected $nr;

	/**
	 * ort
	 *
	 * @var \string
	 */
	protected $ort;

	/**
	 * Beginn
	 *
	 * @var \DateTime
	 */
	protected $begin;

	/**
	 * Ende
	 *
	 * @var \DateTime
	 */
	protected $end;

	/**
	 * fragebogen
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\BLSV\Blsvfragebogen\Domain\Model\Fragebogen>
	 * @lazy
	 */
	protected $fragebogen;

	/**
	 * feuser
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FrontendUser>
	 * @lazy
	 */
	protected $feuser;

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
		$this->fragebogen = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		
		$this->feuser = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Adds a FrontendUser
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FrontendUser $feuser
	 * @return void
	 */
	public function addFeuser(\TYPO3\CMS\Extbase\Domain\Model\FrontendUser $feuser) {
		$this->feuser->attach($feuser);
	}

	/**
	 * Removes a FrontendUser
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FrontendUser $feuserToRemove The FrontendUser to be removed
	 * @return void
	 */
	public function removeFeuser(\TYPO3\CMS\Extbase\Domain\Model\FrontendUser $feuserToRemove) {
		$this->feuser->detach($feuserToRemove);
	}

	/**
	 * Returns the feuser
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FrontendUser> $feuser
	 */
	public function getFeuser() {
		return $this->feuser;
	}

	/**
	 * Sets the feuser
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FrontendUser> $feuser
	 * @return void
	 */
	public function setFeuser(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $feuser) {
		$this->feuser = $feuser;
	}

	/**
	 * Returns the titel
	 *
	 * @return \string $titel
	 */
	public function getTitel() {
		return $this->titel;
	}

	/**
	 * Sets the titel
	 *
	 * @param \string $titel
	 * @return void
	 */
	public function setTitel($titel) {
		$this->titel = $titel;
	}

	/**
	 * Returns the art
	 *
	 * @return \integer $art
	 */
	public function getArt() {
		return $this->art;
	}

	/**
	 * Sets the art
	 *
	 * @param \integer $art
	 * @return void
	 */
	public function setArt($art) {
		$this->art = $art;
	}

	/**
	 * Returns the nr
	 *
	 * @return \integer $nr
	 */
	public function getNr() {
		return $this->nr;
	}

	/**
	 * Sets the nr
	 *
	 * @param \integer $nr
	 * @return void
	 */
	public function setNr($nr) {
		$this->nr = $nr;
	}

	/**
	 * Returns the ort
	 *
	 * @return \string $ort
	 */
	public function getOrt() {
		return $this->ort;
	}

	/**
	 * Sets the ort
	 *
	 * @param \string $ort
	 * @return void
	 */
	public function setOrt($ort) {
		$this->ort = $ort;
	}

	/**
	 * Returns the begin
	 *
	 * @return \DateTime $begin
	 */
	public function getBegin() {
		return $this->begin;
	}

	/**
	 * Sets the begin
	 *
	 * @param \DateTime $begin
	 * @return void
	 */
	public function setBegin($begin) {
		$this->begin = $begin;
	}

	/**
	 * Returns the end
	 *
	 * @return \DateTime $end
	 */
	public function getEnd() {
		return $this->end;
	}

	/**
	 * Sets the end
	 *
	 * @param \DateTime $end
	 * @return void
	 */
	public function setEnd($end) {
		$this->end = $end;
	}

	/**
	 * Adds a Fragen
	 *
	 * @param \BLSV\Blsvfragebogen\Domain\Model\Fragebogen $fragebogen
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\BLSV\Blsvfragebogen\Domain\Model\Fragebogen> fragebogen
	 */
	public function addFragebogen(\BLSV\Blsvfragebogen\Domain\Model\Fragebogen $fragebogen) {
		$this->fragebogen->attach($fragebogen);
	}

	/**
	 * Removes a Fragen
	 *
	 * @param \BLSV\Blsvfragebogen\Domain\Model\Fragebogen $fragebogenToRemove The Fragebogen to be removed
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\BLSV\Blsvfragebogen\Domain\Model\Fragebogen> fragebogen
	 */
	public function removeFragebogen(\BLSV\Blsvfragebogen\Domain\Model\Fragebogen $fragebogenToRemove) {
		$this->fragebogen->detach($fragebogenToRemove);
	}

	/**
	 * Returns the fragebogen
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\BLSV\Blsvfragebogen\Domain\Model\Fragebogen> fragebogen
	 */
	public function getFragebogen() {
		return $this->fragebogen;
	}

	/**
	 * Sets the fragebogen
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\BLSV\Blsvfragebogen\Domain\Model\Fragebogen> $fragebogen
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\BLSV\Blsvfragebogen\Domain\Model\Fragebogen> fragebogen
	 */
	public function setFragebogen(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $fragebogen) {
		$this->fragebogen = $fragebogen;
	}

}
?>