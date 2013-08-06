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
 * Test case for class \BLSV\Blsvfragebogen\Domain\Model\Fragebogen.
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
class FragebogenTest extends \TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase {
	/**
	 * @var \BLSV\Blsvfragebogen\Domain\Model\Fragebogen
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new \BLSV\Blsvfragebogen\Domain\Model\Fragebogen();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function getFragenReturnsInitialValueForFragen() { 
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getFragen()
		);
	}

	/**
	 * @test
	 */
	public function setFragenForObjectStorageContainingFragenSetsFragen() { 
		$fragen = new \BLSV\Blsvfragebogen\Domain\Model\Fragen();
		$objectStorageHoldingExactlyOneFragen = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneFragen->attach($fragen);
		$this->fixture->setFragen($objectStorageHoldingExactlyOneFragen);

		$this->assertSame(
			$objectStorageHoldingExactlyOneFragen,
			$this->fixture->getFragen()
		);
	}
	
	/**
	 * @test
	 */
	public function addFragenToObjectStorageHoldingFragen() {
		$fragen = new \BLSV\Blsvfragebogen\Domain\Model\Fragen();
		$objectStorageHoldingExactlyOneFragen = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneFragen->attach($fragen);
		$this->fixture->addFragen($fragen);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneFragen,
			$this->fixture->getFragen()
		);
	}

	/**
	 * @test
	 */
	public function removeFragenFromObjectStorageHoldingFragen() {
		$fragen = new \BLSV\Blsvfragebogen\Domain\Model\Fragen();
		$localObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$localObjectStorage->attach($fragen);
		$localObjectStorage->detach($fragen);
		$this->fixture->addFragen($fragen);
		$this->fixture->removeFragen($fragen);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getFragen()
		);
	}
	
}
?>