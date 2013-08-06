<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Pi1',
	'Fragebogen'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Fragebogen');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_blsvfragebogen_domain_model_fragebogenteilnehmer', 'EXT:blsvfragebogen/Resources/Private/Language/locallang_csh_tx_blsvfragebogen_domain_model_fragebogenteilnehmer.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_blsvfragebogen_domain_model_fragebogenteilnehmer');
$TCA['tx_blsvfragebogen_domain_model_fragebogenteilnehmer'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:blsvfragebogen/Resources/Private/Language/locallang_db.xlf:tx_blsvfragebogen_domain_model_fragebogenteilnehmer',
		'label' => 'titel',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'sortby' => 'sorting',
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'titel,art,nr,ort,begin,end,fragebogen,feuser,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Fragebogenteilnehmer.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_blsvfragebogen_domain_model_fragebogenteilnehmer.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_blsvfragebogen_domain_model_fragen', 'EXT:blsvfragebogen/Resources/Private/Language/locallang_csh_tx_blsvfragebogen_domain_model_fragen.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_blsvfragebogen_domain_model_fragen');
$TCA['tx_blsvfragebogen_domain_model_fragen'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:blsvfragebogen/Resources/Private/Language/locallang_db.xlf:tx_blsvfragebogen_domain_model_fragen',
		'label' => 'frage',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'sortby' => 'sorting',
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'gruppe,frage,typ,externebezeichnung,moeglcheantworten,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Fragen.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_blsvfragebogen_domain_model_fragen.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_blsvfragebogen_domain_model_antworten', 'EXT:blsvfragebogen/Resources/Private/Language/locallang_csh_tx_blsvfragebogen_domain_model_antworten.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_blsvfragebogen_domain_model_antworten');
$TCA['tx_blsvfragebogen_domain_model_antworten'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:blsvfragebogen/Resources/Private/Language/locallang_db.xlf:tx_blsvfragebogen_domain_model_antworten',
		'label' => 'externeuid',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'externeuid,value,anmerkung,sontigestext,feuser,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Antworten.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_blsvfragebogen_domain_model_antworten.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_blsvfragebogen_domain_model_moeglicheantworten', 'EXT:blsvfragebogen/Resources/Private/Language/locallang_csh_tx_blsvfragebogen_domain_model_moeglicheantworten.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_blsvfragebogen_domain_model_moeglicheantworten');
$TCA['tx_blsvfragebogen_domain_model_moeglicheantworten'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:blsvfragebogen/Resources/Private/Language/locallang_db.xlf:tx_blsvfragebogen_domain_model_moeglicheantworten',
		'label' => 'antwort',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'vorbelegung,typ,antwort,antworten,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Moeglicheantworten.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_blsvfragebogen_domain_model_moeglicheantworten.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_blsvfragebogen_domain_model_fragebogen', 'EXT:blsvfragebogen/Resources/Private/Language/locallang_csh_tx_blsvfragebogen_domain_model_fragebogen.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_blsvfragebogen_domain_model_fragebogen');
$TCA['tx_blsvfragebogen_domain_model_fragebogen'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:blsvfragebogen/Resources/Private/Language/locallang_db.xlf:tx_blsvfragebogen_domain_model_fragebogen',
		'label' => 'fragen',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'fragen,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Fragebogen.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_blsvfragebogen_domain_model_fragebogen.gif'
	),
);

?>