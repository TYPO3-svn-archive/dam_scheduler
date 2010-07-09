<?php

########################################################################
# Extension Manager/Repository config file for ext "dam_scheduler".
#
# Auto generated 03-07-2010 14:51
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'DAM Scheduler task',
	'description' => 'A Task for the TYPO3 integrated scheduler (former gabriel) to automatically index DAM records.',
	'category' => 'misc',
	'author' => 'Michael Feinbier',
	'author_email' => 'typo3@feinbier.net',
	'shy' => '',
	'dependencies' => 'dam,scheduler',
	'conflicts' => '',
	'priority' => '',
	'module' => '',
	'state' => 'alpha',
	'internal' => '',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'author_company' => '',
	'version' => '0.0.0',
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
	'_md5_values_when_last_written' => 'a:8:{s:9:"ChangeLog";s:4:"b864";s:35:"class.tx_damscheduler_indexTask.php";s:4:"62e4";s:16:"ext_autoload.php";s:4:"6897";s:12:"ext_icon.gif";s:4:"243b";s:17:"ext_localconf.php";s:4:"cb49";s:13:"locallang.xml";s:4:"2b79";s:19:"doc/wizard_form.dat";s:4:"431e";s:20:"doc/wizard_form.html";s:4:"d449";}',
	'suggests' => array(
	),
);

?>