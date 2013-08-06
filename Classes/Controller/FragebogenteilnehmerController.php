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
	 * fragebogenRepository
	 *
	 * @var \BLSV\Blsvfragebogen\Domain\Repository\FragebogenRepository
	 * @inject
	 */
	protected $fragebogenRepository;

	/**
	 * moeglicheantwortenRepository
	 *
	 * @var \BLSV\Blsvfragebogen\Domain\Repository\MoeglicheantwortenRepository
	 * @inject
	 */
	protected $moeglicheantwortenRepository;
	
	/**
	 * feuserRepository
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Repository\FrontendUserRepository
	 * @inject
	 */
	protected $feuserRepository;
	
	/**
	 * User
	 *
	 * @var TYPO3\CMS\Extbase\Domain\Model\FrontendUser
	 */
	protected $feuser;
		
	/**
	 * Initializes the current action
	 *
	 * @return void
	 */
	protected function initializeAction() {
		$userTSConfig_all = $GLOBALS["TSFE"]->fe_user->getUserTSconf();
		$this->feuser =  $this->feuserRepository->findByUid( $GLOBALS['TSFE']->fe_user->user['uid'] );
	
		if ($this->feuser == NULL) {
			die('Sie sind nicht als gültiger User angemeldet');
		}
	}
	
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
		//echo '<pre>';
	}
	
	/**
	 * action edit
	 *
	 * @param BLSV\Blsvfragebogenteilnehmer\Domain\Model\Fragebogenteilnehmer
	 * @return void
	 */
	public function editAction(\BLSV\Blsvfragebogen\Domain\Model\Fragebogenteilnehmer $fragebogenteilnehmer=NULL) {
		
		$eintraege['referenten'] = array(
				array( 'uid' => 1, 'name'=> 'martin gonschor' ),
				array( 'uid' => 2, 'name'=> 'berti golf' )
		);
		
		$eintraege['anderesExternesFeld'] = array(
				array( 'uid' => 1, 'name'=> 'martin gonschor' ),
				array( 'uid' => 2, 'name'=> 'berti golf' )
		);
		
		

		$neu = ($fragebogenteilnehmer==NULL);
		// $neu = true;
		
		if ($neu) {
			$fragebogenteilnehmer = new \BLSV\Blsvfragebogen\Domain\Model\Fragebogenteilnehmer();
			$fragebogen = $this->fragebogenRepository->getFirst();
			$fragebogenteilnehmer->setFragebogen($fragebogen);
			$fragebogenteilnehmer->setFeuser($this->feuser);
			$this->fragebogenteilnehmerRepository->add($fragebogenteilnehmer);
		}
		
		$fragebogen = $fragebogenteilnehmer->getFragebogen();
		
		
		$fehlendeAntworten = $fragebogen->getMoeglcheantwortenOhneAntworten($eintraege);
		
		foreach ($fehlendeAntworten as $fehlendeAntwort){
			$antwort = new \BLSV\Blsvfragebogen\Domain\Model\Antworten($this->feuser);
			$fehlendeAntwort->addAntworten($antwort);	
			$this->moeglicheantwortenRepository->update($fehlendeAntwort);
		}
		
		
		$data = compact('fragebogenteilnehmer', 'fragebogen', 'eintraege', 'fehlendeAntworten');		
		
		
		$this->view->assign('fragebogenteilnehmer', $fragebogenteilnehmer);
		$this->view->assign('eintraege', $eintraege);
		
		$this->view->assign('data', $data);
	}

	/*
	 * action update
	 *
	 * @param BLSV\Blsvfragebogenteilnehmer\Domain\Model\Fragebogenteilnehmer
	 * @return void
	 */
	//public function updateAction(\BLSV\Blsvfragebogen\Domain\Model\Fragebogenteilnehmer $fragebogenteilnehmer) {
	public function updateAction() {
		echo '<pre>';
		print_r($_REQUEST);
		exit;
		
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