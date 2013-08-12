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
	protected $art=0;

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
	 * @var \BLSV\Blsvfragebogen\Domain\Model\Fragebogen
	 * @lazy
	 */
	protected $fragebogen;

	/**
	 * feuser
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FrontendUser
	 * @lazy
	 */
	protected $feuser;


	/**
	 * Returns the feuser
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FrontendUser $feuser
	 */
	public function getFeuser() {
		
		return $this->feuser;
	}

	/**
	 * Sets the feuser
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FrontendUser $feuser
	 * @return void
	 */
	public function setFeuser( \TYPO3\CMS\Extbase\Domain\Model\FrontendUser $feuser) {
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
	 * Returns the fragebogen
	 *
	 * @return\BLSV\Blsvfragebogen\Domain\Model\Fragebogen fragebogen
	 */
	public function getFragebogen() {
		return $this->fragebogen;
	}

	/**
	 * Sets the fragebogen
	 *
	 * @param \BLSV\Blsvfragebogen\Domain\Model\Fragebogen $fragebogen
	 * @return void
	 */
	public function setFragebogen( \BLSV\Blsvfragebogen\Domain\Model\Fragebogen $fragebogen) {
		$this->fragebogen = $fragebogen;
	}

}
?>