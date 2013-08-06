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
 * Test case for class \BLSV\Blsvfragebogen\Domain\Model\Moeglicheatworten.
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
class MoeglicheatwortenTest extends \TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase {
	/**
	 * @var \BLSV\Blsvfragebogen\Domain\Model\Moeglicheatworten
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new \BLSV\Blsvfragebogen\Domain\Model\Moeglicheatworten();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function getVorbelegungReturnsInitialValueForInteger() { 
		$this->assertSame(
			0,
			$this->fixture->getVorbelegung()
		);
	}

	/**
	 * @test
	 */
	public function setVorbelegungForIntegerSetsVorbelegung() { 
		$this->fixture->setVorbelegung(12);

		$this->assertSame(
			12,
			$this->fixture->getVorbelegung()
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
	public function getAntwortenReturnsInitialValueForAntworten() { 
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getAntworten()
		);
	}

	/**
	 * @test
	 */
	public function setAntwortenForObjectStorageContainingAntwortenSetsAntworten() { 
		$antworten = new \BLSV\Blsvfragebogen\Domain\Model\Antworten();
		$objectStorageHoldingExactlyOneAntworten = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneAntworten->attach($antworten);
		$this->fixture->setAntworten($objectStorageHoldingExactlyOneAntworten);

		$this->assertSame(
			$objectStorageHoldingExactlyOneAntworten,
			$this->fixture->getAntworten()
		);
	}
	
	/**
	 * @test
	 */
	public function addAntwortenToObjectStorageHoldingAntworten() {
		$antworten = new \BLSV\Blsvfragebogen\Domain\Model\Antworten();
		$objectStorageHoldingExactlyOneAntworten = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneAntworten->attach($antworten);
		$this->fixture->addAntworten($antworten);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneAntworten,
			$this->fixture->getAntworten()
		);
	}

	/**
	 * @test
	 */
	public function removeAntwortenFromObjectStorageHoldingAntworten() {
		$antworten = new \BLSV\Blsvfragebogen\Domain\Model\Antworten();
		$localObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$localObjectStorage->attach($antworten);
		$localObjectStorage->detach($antworten);
		$this->fixture->addAntworten($antworten);
		$this->fixture->removeAntworten($antworten);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getAntworten()
		);
	}
	
}
?>