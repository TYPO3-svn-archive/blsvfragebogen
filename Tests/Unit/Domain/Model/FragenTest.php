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
 * Test case for class \BLSV\Blsvfragebogen\Domain\Model\Fragen.
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
class FragenTest extends \TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase {
	/**
	 * @var \BLSV\Blsvfragebogen\Domain\Model\Fragen
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new \BLSV\Blsvfragebogen\Domain\Model\Fragen();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function getGruppeReturnsInitialValueForInteger() { 
		$this->assertSame(
			0,
			$this->fixture->getGruppe()
		);
	}

	/**
	 * @test
	 */
	public function setGruppeForIntegerSetsGruppe() { 
		$this->fixture->setGruppe(12);

		$this->assertSame(
			12,
			$this->fixture->getGruppe()
		);
	}
	
	/**
	 * @test
	 */
	public function getFrageReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setFrageForStringSetsFrage() { 
		$this->fixture->setFrage('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getFrage()
		);
	}
	
	/**
	 * @test
	 */
	public function getTypReturnsInitialValueForInteger() { 
		$this->assertSame(
			0,
			$this->fixture->getTyp()
		);
	}

	/**
	 * @test
	 */
	public function setTypForIntegerSetsTyp() { 
		$this->fixture->setTyp(12);

		$this->assertSame(
			12,
			$this->fixture->getTyp()
		);
	}
	
	/**
	 * @test
	 */
	public function getExternebezeichnungReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setExternebezeichnungForStringSetsExternebezeichnung() { 
		$this->fixture->setExternebezeichnung('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getExternebezeichnung()
		);
	}
	
	/**
	 * @test
	 */
	public function getMoeglcheantwortenReturnsInitialValueForMoeglicheantworten() { 
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getMoeglcheantworten()
		);
	}

	/**
	 * @test
	 */
	public function setMoeglcheantwortenForObjectStorageContainingMoeglicheantwortenSetsMoeglcheantworten() { 
		$moeglcheantworten = new \BLSV\Blsvfragebogen\Domain\Model\Moeglicheantworten();
		$objectStorageHoldingExactlyOneMoeglcheantworten = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneMoeglcheantworten->attach($moeglcheantworten);
		$this->fixture->setMoeglcheantworten($objectStorageHoldingExactlyOneMoeglcheantworten);

		$this->assertSame(
			$objectStorageHoldingExactlyOneMoeglcheantworten,
			$this->fixture->getMoeglcheantworten()
		);
	}
	
	/**
	 * @test
	 */
	public function addMoeglcheantwortenToObjectStorageHoldingMoeglcheantworten() {
		$moeglcheantworten = new \BLSV\Blsvfragebogen\Domain\Model\Moeglicheantworten();
		$objectStorageHoldingExactlyOneMoeglcheantworten = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneMoeglcheantworten->attach($moeglcheantworten);
		$this->fixture->addMoeglcheantworten($moeglcheantworten);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneMoeglcheantworten,
			$this->fixture->getMoeglcheantworten()
		);
	}

	/**
	 * @test
	 */
	public function removeMoeglcheantwortenFromObjectStorageHoldingMoeglcheantworten() {
		$moeglcheantworten = new \BLSV\Blsvfragebogen\Domain\Model\Moeglicheantworten();
		$localObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$localObjectStorage->attach($moeglcheantworten);
		$localObjectStorage->detach($moeglcheantworten);
		$this->fixture->addMoeglcheantworten($moeglcheantworten);
		$this->fixture->removeMoeglcheantworten($moeglcheantworten);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getMoeglcheantworten()
		);
	}
	
}
?>