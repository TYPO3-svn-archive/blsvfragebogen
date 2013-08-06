<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_blsvfragebogen_domain_model_fragen'] = array(
	'ctrl' => $TCA['tx_blsvfragebogen_domain_model_fragen']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, gruppe, frage, typ, externebezeichnung, moeglcheantworten',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, gruppe, frage, typ, externebezeichnung, moeglcheantworten,--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,starttime, endtime'),
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
				'foreign_table' => 'tx_blsvfragebogen_domain_model_fragen',
				'foreign_table_where' => 'AND tx_blsvfragebogen_domain_model_fragen.pid=###CURRENT_PID### AND tx_blsvfragebogen_domain_model_fragen.sys_language_uid IN (-1,0)',
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
		'gruppe' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:blsvfragebogen/Resources/Private/Language/locallang_db.xlf:tx_blsvfragebogen_domain_model_fragen.gruppe',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int,required'
			),
		),
		'frage' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:blsvfragebogen/Resources/Private/Language/locallang_db.xlf:tx_blsvfragebogen_domain_model_fragen.frage',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim,required',
				'wizards' => array(
					'RTE' => array(
						'icon' => 'wizard_rte2.gif',
						'notNewRecords'=> 1,
						'RTEonly' => 1,
						'script' => 'wizard_rte.php',
						'title' => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
						'type' => 'script'
					)
				)
			),
			'defaultExtras' => 'richtext:rte_transform[flag=rte_enabled|mode=ts]',
		),
		'typ' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:blsvfragebogen/Resources/Private/Language/locallang_db.xlf:tx_blsvfragebogen_domain_model_fragen.typ',
			'config' => array(
				'type' => 'select',

 	  			'items' => Array (

 	             	Array('1 - Überschrift', '1'),
 	  			 	Array('2 - ein Wert pro Antwort', '2'),
 	  			 	Array('3 - vier  Werte pro Antwort', '3'),
 	  				Array('4 - ja/nein', '4'), 	  						
 	  			  	Array('5 - nur Text', '5'),

 			      ),
			),
		),
		'externebezeichnung' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:blsvfragebogen/Resources/Private/Language/locallang_db.xlf:tx_blsvfragebogen_domain_model_fragen.externebezeichnung',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'moeglcheantworten' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:blsvfragebogen/Resources/Private/Language/locallang_db.xlf:tx_blsvfragebogen_domain_model_fragen.moeglcheantworten',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_blsvfragebogen_domain_model_moeglicheantworten',
				'foreign_field' => 'fragen',
				'maxitems'      => 9999,
				'appearance' => array(
					'collapseAll' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),
		),
		'fragebogen' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
	),
);

?>