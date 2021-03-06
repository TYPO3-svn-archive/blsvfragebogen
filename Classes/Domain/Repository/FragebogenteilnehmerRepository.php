<?php
namespace BLSV\Blsvfragebogen\Domain\Repository;

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
class FragebogenteilnehmerRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
	public function persistAll(){
		$this->persistenceManager->persistAll();
	}
	
	/**
	 * Liefert einen Eintrag mit Nr und FeUser
	 * 
	 * @param integer $nr
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FrontendUser $feuser
	 */
	public function findOneByNrAndFeuser($nr, \TYPO3\CMS\Extbase\Domain\Model\FrontendUser $feuser){
		$query = $this->createQuery();
		$query->matching($query->logicalAnd(
			$query->equals('nr', $nr+100),
			$query->equals('feuser', $feuser->getUid())
		));
		return $query->setLimit(1)->execute()->getFirst();
	}
}
?>