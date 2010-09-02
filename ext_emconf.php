<?php

########################################################################
# Extension Manager/Repository config file for ext "dam_scheduler".
#
# Auto generated 31-08-2010 10:35
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'DAM Scheduler task',
	'description' => 'A Task for the TYPO3 integrated scheduler (former gabriel) to automatically index DAM records.',
	'category' => 'misc',
	'author' => 'Michael Feinbier, Joerg Kummer',
	'author_email' => 'typo3@feinbier.net',
	'shy' => '',
	'dependencies' => 'dam,scheduler',
	'conflicts' => '',
	'priority' => '',
	'module' => '',
	'state' => 'beta',
	'internal' => '',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'author_company' => '',
	'version' => '0.1.1',
	'constraints' => array(
		'depends' => array(
			'dam' => '',
			'scheduler' => '',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:8:{s:9:"ChangeLog";s:4:"b4fc";s:35:"class.tx_damscheduler_indexTask.php";s:4:"bdb7";s:59:"class.tx_damscheduler_indexTask_AdditionalFieldProvider.php";s:4:"fc4a";s:16:"ext_autoload.php";s:4:"00aa";s:12:"ext_icon.gif";s:4:"977f";s:17:"ext_localconf.php";s:4:"5fff";s:13:"locallang.xml";s:4:"c128";s:14:"doc/manual.sxw";s:4:"2c5d";}',
	'suggests' => array(
	),
);

?>