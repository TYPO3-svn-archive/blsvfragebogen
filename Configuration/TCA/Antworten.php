<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_blsvfragebogen_domain_model_antworten'] = array(
	'ctrl' => $TCA['tx_blsvfragebogen_domain_model_antworten']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, externeuid, value, anmerkung, sonstigestext, fragebogenteilnehmer',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, externeuid, value, anmerkung, sonstigestext, fragebogenteilnehmer,--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_blsvfragebogen_domain_model_antworten',
				'foreign_table_where' => 'AND tx_blsvfragebogen_domain_model_antworten.pid=###CURRENT_PID### AND tx_blsvfragebogen_domain_model_antworten.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'externeuid' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:blsvfragebogen/Resources/Private/Language/locallang_db.xlf:tx_blsvfragebogen_domain_model_antworten.externeuid',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			),
		),
		'value' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:blsvfragebogen/Resources/Private/Language/locallang_db.xlf:tx_blsvfragebogen_domain_model_antworten.value',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			),
		),
		'anmerkung' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:blsvfragebogen/Resources/Private/Language/locallang_db.xlf:tx_blsvfragebogen_domain_model_antworten.anmerkung',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			),
		),
		'sonstigestext' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:blsvfragebogen/Resources/Private/Language/locallang_db.xlf:tx_blsvfragebogen_domain_model_antworten.sontigestext',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			), 
		),
		'fragebogenteilnehmer' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:blsvfragebogen/Resources/Private/Language/locallang_db.xlf:tx_blsvfragebogen_domain_model_antworten.fragebogenteilnehmer',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_blsvfragebogen_domain_model_fragebogenteilnehmer',
				'minitems' => 0, 
				'maxitems' => 1,
				'appearance' => array(
					'collapseAll' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),
		),
		'moeglicheantworten' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
	),
);

?>