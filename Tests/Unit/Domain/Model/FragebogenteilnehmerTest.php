<?php

namespace BLSV\Blsvfragebogen\Tests;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Berti Golf, <berti.golf@blsv.de>, BLSV
 *  			Martin Gonschor <martin.gonschor@blsv.de>, BLSV
 *  			
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class \BLSV\Blsvfragebogen\Domain\Model\Fragebogenteilnehmer.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage Fragebogen
 *
 * @author Berti Golf, <berti.golf@blsv.de>
 * @author Martin Gonschor <martin.gonschor@blsv.de>
 */
class FragebogenteilnehmerTest extends \TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase {
	/**
	 * @var \BLSV\Blsvfragebogen\Domain\Model\Fragebogenteilnehmer
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new \BLSV\Blsvfragebogen\Domain\Model\Fragebogenteilnehmer();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function getTitelReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setTitelForStringSetsTitel() { 
		$this->fixture->setTitel('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getTitel()
		);
	}
	
	/**
	 * @test
	 */
	public function getArtReturnsInitialValueForInteger() { 
		$this->assertSame(
			0,
			$this->fixture->getArt()
		);
	}

	/**
	 * @test
	 */
	public function setArtForIntegerSetsArt() { 
		$this->fixture->setArt(12);

		$this->assertSame(
			12,
			$this->fixture->getArt()
		);
	}
	
	/**
	 * @test
	 */
	public function getNrReturnsInitialValueForInteger() { 
		$this->assertSame(
			0,
			$this->fixture->getNr()
		);
	}

	/**
	 * @test
	 */
	public function setNrForIntegerSetsNr() { 
		$this->fixture->setNr(12);

		$this->assertSame(
			12,
			$this->fixture->getNr()
		);
	}
	
	/**
	 * @test
	 */
	public function getOrtReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setOrtForStringSetsOrt() { 
		$this->fixture->setOrt('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getOrt()
		);
	}
	
	/**
	 * @test
	 */
	public function getBeginReturnsInitialValueForDateTime() { }

	/**
	 * @test
	 */
	public function setBeginForDateTimeSetsBegin() { }
	
	/**
	 * @test
	 */
	public function getEndReturnsInitialValueForDateTime() { }

	/**
	 * @test
	 */
	public function setEndForDateTimeSetsEnd() { }
	
	/**
	 * @test
	 */
	public function getFragebogenReturnsInitialValueForFragebogen() { 
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getFragebogen()
		);
	}

	/**
	 * @test
	 */
	public function setFragebogenForObjectStorageContainingFragebogenSetsFragebogen() { 
		$fragebogen = new \BLSV\Blsvfragebogen\Domain\Model\Fragebogen();
		$objectStorageHoldingExactlyOneFragebogen = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneFragebogen->attach($fragebogen);
		$this->fixture->setFragebogen($objectStorageHoldingExactlyOneFragebogen);

		$this->assertSame(
			$objectStorageHoldingExactlyOneFragebogen,
			$this->fixture->getFragebogen()
		);
	}
	
	/**
	 * @test
	 */
	public function addFragebogenToObjectStorageHoldingFragebogen() {
		$fragebogen = new \BLSV\Blsvfragebogen\Domain\Model\Fragebogen();
		$objectStorageHoldingExactlyOneFragebogen = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneFragebogen->attach($fragebogen);
		$this->fixture->addFragebogen($fragebogen);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneFragebogen,
			$this->fixture->getFragebogen()
		);
	}

	/**
	 * @test
	 */
	public function removeFragebogenFromObjectStorageHoldingFragebogen() {
		$fragebogen = new \BLSV\Blsvfragebogen\Domain\Model\Fragebogen();
		$localObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$localObjectStorage->attach($fragebogen);
		$localObjectStorage->detach($fragebogen);
		$this->fixture->addFragebogen($fragebogen);
		$this->fixture->removeFragebogen($fragebogen);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getFragebogen()
		);
	}
	
	/**
	 * @test
	 */
	public function getFeuserReturnsInitialValueForFrontendUser() { 
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getFeuser()
		);
	}

	/**
	 * @test
	 */
	public function setFeuserForObjectStorageContainingFrontendUserSetsFeuser() { 
		$feuser = new \TYPO3\CMS\Extbase\Domain\Model\FrontendUser();
		$objectStorageHoldingExactlyOneFeuser = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneFeuser->attach($feuser);
		$this->fixture->setFeuser($objectStorageHoldingExactlyOneFeuser);

		$this->assertSame(
			$objectStorageHoldingExactlyOneFeuser,
			$this->fixture->getFeuser()
		);
	}
	
	/**
	 * @test
	 */
	public function addFeuserToObjectStorageHoldingFeuser() {
		$feuser = new \TYPO3\CMS\Extbase\Domain\Model\FrontendUser();
		$objectStorageHoldingExactlyOneFeuser = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneFeuser->attach($feuser);
		$this->fixture->addFeuser($feuser);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneFeuser,
			$this->fixture->getFeuser()
		);
	}

	/**
	 * @test
	 */
	public function removeFeuserFromObjectStorageHoldingFeuser() {
		$feuser = new \TYPO3\CMS\Extbase\Domain\Model\FrontendUser();
		$localObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$localObjectStorage->attach($feuser);
		$localObjectStorage->detach($feuser);
		$this->fixture->addFeuser($feuser);
		$this->fixture->removeFeuser($feuser);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getFeuser()
		);
	}
	
}
?>