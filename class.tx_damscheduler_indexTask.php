<?php
/***************************************************************
*  Copyright notice
*
*  (c) 1999-2010 Michael Feinbier <typo3@feinbier.net>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*  A copy is found in the textfile GPL.txt and important notices to the license
*  from the author is found in LICENSE.txt distributed with these scripts.
*
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

require_once(PATH_txdam.'lib/class.tx_dam_scbase.php');
require_once(PATH_txdam.'lib/class.tx_dam_indexing.php');

/**
 * A Task for automatically reindex DAM files via the scheduler
 *
 * @author     Michael Feinbier <typo3@feinbier.net>
 * @author     Joerg Kummer <typo3[by]enobe.de>
 * @package    TYPO3
 * @subpackage tx_damscheduler
 * @version    SVN: $Id$
 */
class tx_damscheduler_indexTask extends tx_scheduler_Task {

	/**
	 * The Indexer to run
	 * @var tx_dam_indexing
	 */
	protected $indexer;

	/**
	 * Additional Field
	 * The path to the setupFile
	 * @var string
	 */
	public $setupFile;
	
	/**
	 * Additional Field
	 * The title for the setupFile
	 * @var string
	 */
	public $setupTitle;

	/**
	 * Executes the reindex of the DAM
	 *
	 * @return boolean
	 */
	public function execute() {
		$this->indexer = t3lib_div::makeInstance('tx_dam_indexing');
		$this->indexer->setRunType('cron');
		$this->indexer->init();

		if( !$this->indexer->restoreSerializedSetup( $this->getSetupFileContent() ) ) {
			return false;
		}

		$this->indexer->indexUsingCurrentSetup();
		return true;
	}

	/**
	 * Returns the XML-Content of the setup file content
	 *
	 * @return string (xml)
	 */
	protected function getSetupFileContent() {
		$absolutePath = PATH_site . 'fileadmin/' . $this->setupFile;
		return t3lib_div::getUrl( $absolutePath );
	}

	/**
	 * Return Additional Information from CronRun
	 *
	 * @return string
	 */
	public function getAdditionalInformation() {
		$string = 'Setup: ';
		if( empty($this->setupTitle)) {
			$string .= str_replace(PATH_site, '', $this->setupFile);
		} else {
			$string .= $this->setupTitle;
		}
		
		return $string;
	}

}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/dam_scheduler/class.tx_damscheduler_indexTask.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/dam_scheduler/class.tx_damscheduler_indexTask.php']);
}