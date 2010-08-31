<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks']['tx_damscheduler_indexTask'] = array(
	'extension'        => $_EXTKEY,
	'title'            => 'LLL:EXT:' . $_EXTKEY . '/locallang.xml:title',
	'description'      => 'LLL:EXT:' . $_EXTKEY . '/locallang.xml:description',
	'additionalFields' => 'tx_damscheduler_indexTask_AdditionalFieldProvider'
);
?>