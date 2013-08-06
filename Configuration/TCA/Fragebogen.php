<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_blsvfragebogen_domain_model_fragebogen'] = array(
	'ctrl' => $TCA['tx_blsvfragebogen_domain_model_fragebogen']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, fragen',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, fragen,--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,starttime, endtime'),
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
				'foreign_table' => 'tx_blsvfragebogen_domain_model_fragebogen',
				'foreign_table_where' => 'AND tx_blsvfragebogen_domain_model_fragebogen.pid=###CURRENT_PID### AND tx_blsvfragebogen_domain_model_fragebogen.sys_language_uid IN (-1,0)',
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
		'fragen' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:blsvfragebogen/Resources/Private/Language/locallang_db.xlf:tx_blsvfragebogen_domain_model_fragebogen.fragen',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_blsvfragebogen_domain_model_fragen',
				'foreign_field' => 'fragebogen',
				'maxitems'      => 9999,
				'size' => 10,
					'show_thumbs' => '1',
					'wizards' => Array(
					   	'_PADDING' => 1,
					 	'_VERTICAL' => 1,
						'edit' => Array(
							'type' => 'popup',
							'title' => 'Edit filemount',
							'script' => 'wizard_edit.php',
							'icon' => 'edit2.gif',
							'popup_onlyOpenIfSelected' => 1,
							'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1'
						 ),
						'add' => Array(
							'type' => 'script',
							'title' => 'Neues Frage',
							'icon' => 'add.gif',
							'params' => Array(
								'table'=>'tx_blsvfragebogen_domain_model_fragen',
								'setValue' => 'prepend',
								'pid'  => 311,
							 ),
							'script' => 'wizard_add.php',
					
						),
					
						
				),
			),
		),		
		'fragebogenteilnehmer' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
	),
);

?>