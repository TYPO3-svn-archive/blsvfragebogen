<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'BLSV.' . $_EXTKEY,
	'Pi1',
	array(
		'Fragebogenteilnehmer' => 'edit, list, show, new, create, update, delete',
		
	),
	// non-cacheable actions
	array(
		'Fragebogenteilnehmer' => 'list, show, new, create, edit, update, delete',
		
	)
);

?>