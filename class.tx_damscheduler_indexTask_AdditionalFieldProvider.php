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
 
/**
* Additional fields, provided for automatically reindex DAM files via the scheduler
*
* @author     Michael Feinbier <typo3@feinbier.net>
* @author     Joerg Kummer <typo3[by]enobe.de>
* @package    TYPO3
* @subpackage tx_damscheduler
* @version    SVN: $Id$
*/
class tx_damscheduler_indexTask_AdditionalFieldProvider implements tx_scheduler_AdditionalFieldProvider {
	 
	protected $additionalFields = array(
		'setupFileKey' => 'setupFile',
		'setupTitle'   => 'setupTitle'
	);
	 
	/**
	* Gets additional fields to render in the form to add/edit a task
	*
	* @param array  Values of the fields from the add/edit task form
	* @param tx_scheduler_Task  The task object being eddited. Null when adding a task!
	* @param tx_scheduler_Module  Reference to the scheduler backend module
	* @return array  A two dimensional array, array('Identifier' => array('fieldId' => array('code' => '', 'label' => '', 'cshKey' => '', 'cshLabel' => ''))
	*/
	public function getAdditionalFields(array &$taskInfo, $task, tx_scheduler_Module $schedulerModule) {
		// check additional fields
		if (is_array($this->additionalFields)) {
			// set additional fields
			$additionalFields = array();
			// get additional fields
			foreach ($this->additionalFields as $key => $val) {
				$taskInfo[$val] = $task->{$val};
				 
				$fieldID = 'task_' . $val;
				$fieldCode = '<input type="text" name="tx_scheduler['. $val .']" id="' . $fieldID . '" value="' . $taskInfo[ $val ] . '" size="40" />';
				 
				$additionalFields[$fieldID] = array(
					'code'  => $fieldCode,
					'label' => 'LLL:EXT:dam_scheduler/locallang.xml:label.' . $val,
				);
			}
		}
		return $additionalFields;
	}
	 
	/**
	* Validates the additional fields' values
	*
	* @param array  An array containing the data submitted by the add/edit task form
	* @param tx_scheduler_Module  Reference to the scheduler backend module
	* @return boolean  True if validation was ok (or selected class is not relevant), false otherwise
	*/
	public function validateAdditionalFields(array &$submittedData, tx_scheduler_Module $schedulerModule) {
		if (empty($submittedData[ $this->additionalFields['setupFileKey'] ])) {
			$schedulerModule->addMessage($GLOBALS['LANG']->sL('LLL:EXT:dam_scheduler/locallang.xml:label.setupFile.empty'), t3lib_FlashMessage::ERROR);
			return false;
		}
		 
		$absoluteFilePath = PATH_site . 'fileadmin/' . $submittedData[ $this->additionalFields['setupFileKey'] ];
		if (false === file_exists($absoluteFilePath)) {
			$schedulerModule->addMessage(sprintf($GLOBALS['LANG']->sL('LLL:EXT:dam_scheduler/locallang.xml:label.setupFile.error'), $absoluteFilePath), t3lib_FlashMessage::ERROR);
			return false;
		} else {
			return true;
		}
	}
	 
	/**
	* Takes care of saving the additional fields' values in the task's object
	*
	* @param array  An array containing the data submitted by the add/edit task form
	* @param tx_scheduler_Module  Reference to the scheduler backend module
	* @return void
	*/
	public function saveAdditionalFields(array $submittedData, tx_scheduler_Task $task) {
		// check submitted data
		if (is_array($submittedData)) {
			foreach ($this->additionalFields as $key => $value) {
				$task->{$value} = $submittedData[ $value ];
			}
		}
	}
}
 
if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/dam_scheduler/class.tx_damscheduler_indexTask_AdditionalFieldProvider.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/dam_scheduler/class.tx_damscheduler_indexTask_AdditionalFieldProvider.php']);
}
