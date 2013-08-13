<?php
namespace BLSV\Blsvfragebogen\Controller;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013  Berti Golf, <berti.golf@blsv.de>, BLSV
 *  Martin Gonschor <martin.gonschor@blsv.de>, BLSV
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
	 * antwortenRepository
	 *
	 * @var \BLSV\Blsvfragebogen\Domain\Repository\AntwortenRepository
	 * @inject
	 */
	protected $antwortenRepository;
	
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
		$fragebogenteilnehmers = $this->fragebogenteilnehmerRepository->findByFeuser( $this->feuser );
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

	/**
	 * action edit
	 *
	 * @param BLSV\Blsvfragebogenteilnehmer\Domain\Model\Fragebogenteilnehmer $fragebogenteilnehmer
	 * @param array $veranstaltung
	 * @param int $editHeader
	 * @param array $eintraege
	 * @return void
	 */
	public function editAction(\BLSV\Blsvfragebogen\Domain\Model\Fragebogenteilnehmer $fragebogenteilnehmer=NULL, $veranstaltung=array() , $editHeader=0, $eintraege=array() ) {
		
		if (!$eintraege){
			$eintraege['referenten'] = array(
					array( 'uid' => 1, 'name'=> 'Max Mustermann' ),
					array( 'uid' => 2, 'name'=> 'Martina Musterfrau' )
			);		
		}
		
		if ( $fragebogenteilnehmer==NULL ) {
			$fragebogenteilnehmer = $this->fragebogenteilnehmerRepository->findOneByNrAndFeuser( $veranstaltung['nr'], $this->feuser );
			
			if ( $fragebogenteilnehmer==NULL ) {
				
				$veranstaltung = $this->checkVeranstaltung( $veranstaltung );	
				$fragebogenteilnehmer = $this->createFunction( $veranstaltung );
				
			}
		}
		//echo '<pre>'; print_r($veranstaltung);die();
		$fehlendeAntworten =  $fragebogenteilnehmer->getFragebogen()->getMoeglcheantwortenOhneAntworten( $fragebogenteilnehmer, $eintraege );

		foreach ($fehlendeAntworten as $fehlendeAntwort){
			$this->moeglicheantwortenRepository->update( $fehlendeAntwort );
			
		}
		$this->moeglicheantwortenRepository->persistAll();
		$options = compact('eintraege','editHeader');
		$this->view->assign('fragebogenteilnehmer', $fragebogenteilnehmer);
		$this->view->assign('options', $options);
	}
	
	/**
	 * 
	 * @param array $veranstaltung
	 * @return \BLSV\Blsvfragebogen\Domain\Model\Fragebogenteilnehmer
	 */
	private function createFunction( $veranstaltung=array() ){
			$fragebogenteilnehmer = new \BLSV\Blsvfragebogen\Domain\Model\Fragebogenteilnehmer();
			$fragebogenteilnehmer->setFragebogen( $this->fragebogenRepository->getFirst() );
			$fragebogenteilnehmer->setFeuser( $this->feuser );
			$fragebogenteilnehmer->setTitel( $veranstaltung['titel'] );
			$fragebogenteilnehmer->setNr( $veranstaltung['nr'] );
			$fragebogenteilnehmer->setOrt( $veranstaltung['ort'] );
			$fragebogenteilnehmer->setBegin( $veranstaltung['begin'] );
			$fragebogenteilnehmer->setEnd( $veranstaltung['end'] );
			$this->fragebogenteilnehmerRepository->add( $fragebogenteilnehmer );
			$this->fragebogenteilnehmerRepository->persistAll();
			return $fragebogenteilnehmer;
		
	}

	/**
	 *
	 * @param array $veranstaltung
	 * @return array
	 */
	private function checkVeranstaltung( $veranstaltung=array() ){
		if ( !$veranstaltung['titel'] ) $veranstaltung['titel'] = 'Neue Veranstaltung';
		if ( !$veranstaltung['ort'] ) $veranstaltung['ort'] = 'Ort';
		if ( !$veranstaltung['nr'] ) $veranstaltung['nr'] = 0;
		if ( ! ( is_object( $veranstaltung['begin'] ) &&  get_class( $veranstaltung['begin']=='DateTime' ) ) ) {
			try {
				$veranstaltung['begin'] =  new \DateTime( $veranstaltung['begin'] );
			} 
			catch (Exception $e) {
				$veranstaltung['begin'] =  new \DateTime();
			}			
		}
		if ( ! ( is_object( $veranstaltung['end'] ) &&  get_class( $veranstaltung['end']!='DateTime' ) ) ) {
			try {
				$veranstaltung['end'] =  new \DateTime( $veranstaltung['end'] );
			} 
			catch (Exception $e) {
				$veranstaltung['end'] =  new \DateTime();
			}			
		}
		
	
		return $veranstaltung;
	}
	
	public function initializeUpdateAction(){
		echo '<pre>';
		  //print_r($_REQUEST[tx_blsvfragebogen_pi1]['antworten']);
		echo '</pre>';
	}
	
	/**
	 * action update
	 * 
	 * @param \BLSV\Blsvfragebogen\Domain\Model\Fragebogenteilnehmer $fragebogenteilnehmer
	 * 
	 * @param array $antworten
	 * @return void
	 * 
	*/
	public function updateAction( \BLSV\Blsvfragebogen\Domain\Model\Fragebogenteilnehmer $fragebogenteilnehmer = Null, $antworten = null ) {
		
		
			
		if ( $fragebogenteilnehmer ){
			if ( $antworten ){
				$this->updateAntworten($antworten , $fragebogenteilnehmer->GetUid() );
			}
			$this->fragebogenteilnehmerRepository->update( $fragebogenteilnehmer );
		}
		
		$this->redirect('list');
	}
	
	/**
	 * funstion update Antworten
	 *
	 * @param array $antworten
	 * @parma integer $fragebogenteilnehmerUID
	 * @return void
	 *
	*/
	private function updateAntworten( $antworten=Null, $fragebogenteilnehmerUID=0 ){
		if ( $antworten ) {
			foreach ( $antworten as $uid => $arrAntwort ){
				if ( $uid ){
					$antwort = $this->antwortenRepository->findByUid( $uid );
					if ( $antwort && ( $antwort->GetFragebogenteilnehmer()->GetUID() == $fragebogenteilnehmerUID ) ){
						$antwort->setValue( $arrAntwort['value'] );
						$antwort->setAnmerkung( $arrAntwort['anmerkung'] );
						$antwort->setSonstigestext( $arrAntwort['sonstigestext'] );  
						$this->antwortenRepository->update( $antwort );
					}
				}
			}
		}	
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