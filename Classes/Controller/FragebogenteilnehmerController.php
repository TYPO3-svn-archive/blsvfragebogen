<?php
namespace BLSV\Blsvfragebogen\Controller;

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
class FragebogenteilnehmerController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * fragebogenteilnehmerRepository
	 *
	 * @var \BLSV\Blsvfragebogen\Domain\Repository\FragebogenteilnehmerRepository
	 * @inject
	 */
	protected $fragebogenteilnehmerRepository;

	/**
	 * action list
	 *
	 * @return void
	 * @param BLSV\Blsvfragebogenteilnehmer\Domain\Model\Fragebogenteilnehmer
	 */
	public function listAction() {
		$fragebogenteilnehmers = $this->fragebogenteilnehmerRepository->findAll();
		$this->view->assign('fragebogenteilnehmers', $fragebogenteilnehmers);
	}

	/**
	 * action show
	 *
	 * @param BLSV\Blsvfragebogenteilnehmer\Domain\Model\Fragebogenteilnehmer
	 * @return void
	 */
	public function showAction(\BLSV\Blsvfragebogen\Domain\Model\Fragebogenteilnehmer $fragebogenteilnehmer) {
		$this->view->assign('fragebogenteilnehmer', $fragebogenteilnehmer);
	}

	/**
	 * action new
	 *
	 * @param BLSV\Blsvfragebogenteilnehmer\Domain\Model\Fragebogenteilnehmer
	 * @dontvalidate $newFragebogenteilnehmer
	 * @return void
	 */
	public function newAction(\BLSV\Blsvfragebogen\Domain\Model\Fragebogenteilnehmer $newFragebogenteilnehmer = NULL) {
		$this->view->assign('newFragebogenteilnehmer', $newFragebogenteilnehmer);
	}

	/**
	 * action create
	 *
	 * @param BLSV\Blsvfragebogenteilnehmer\Domain\Model\Fragebogenteilnehmer
	 * @return void
	 */
	public function createAction(\BLSV\Blsvfragebogen\Domain\Model\Fragebogenteilnehmer $newFragebogenteilnehmer) {
		$this->fragebogenteilnehmerRepository->add($newFragebogenteilnehmer);
		$this->flashMessageContainer->add('Your new Fragebogenteilnehmer was created.');
		$this->redirect('list');
	}

	public function initializeEditAction(){
		echo '<pre>';
	}
	
	/**
	 * action edit
	 *
	 * @param BLSV\Blsvfragebogenteilnehmer\Domain\Model\Fragebogenteilnehmer
	 * @return void
	 */
	public function editAction(\BLSV\Blsvfragebogen\Domain\Model\Fragebogenteilnehmer $fragebogenteilnehmer=NULL) {
		$neu = ($fragebogenteilnehmer==NULL);
		// $neu = true;
		
		if ($neu) {
			$fragebogenteilnehmer = new \BLSV\Blsvfragebogen\Domain\Model\Fragebogenteilnehmer();

			$fragebogen = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
			$fragebogenObj = new \BLSV\Blsvfragebogen\Domain\Model\Fragebogen();
			$fragebogen->attach($fragebogenObj);
			$fragebogenteilnehmer->setFragebogen($fragebogen);

			$this->fragebogenteilnehmerRepository->add($fragebogenteilnehmer);

		}
		
		$uid = $fragebogenteilnehmer->getUid();
		$fragebogen = $fragebogenteilnehmer->getFragebogen();
		$data = compact('uid', 'fragebogen');
		
		
		$this->view->assign('fragebogenteilnehmer', $fragebogenteilnehmer);
		
		$this->view->assign('data', $data);
		
		
	}

	/**
	 * action update
	 *
	 * @param BLSV\Blsvfragebogenteilnehmer\Domain\Model\Fragebogenteilnehmer
	 * @return void
	 */
	public function updateAction(\BLSV\Blsvfragebogen\Domain\Model\Fragebogenteilnehmer $fragebogenteilnehmer) {
		$this->fragebogenteilnehmerRepository->update($fragebogenteilnehmer);
		$this->flashMessageContainer->add('Your Fragebogenteilnehmer was updated.');
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param BLSV\Blsvfragebogenteilnehmer\Domain\Model\Fragebogenteilnehmer
	 * @return void
	 */
	public function deleteAction(\BLSV\Blsvfragebogen\Domain\Model\Fragebogenteilnehmer $fragebogenteilnehmer) {
		$this->fragebogenteilnehmerRepository->remove($fragebogenteilnehmer);
		$this->flashMessageContainer->add('Your Fragebogenteilnehmer was removed.');
		$this->redirect('list');
	}

}
?>