<?php
// wcf imports
require_once(WCF_DIR.'lib/page/Page.class.php');

/**
 * All form classes should implement this interface. 
 * 
 * @author	Marcel Werk
 * @copyright	2001-2009 WoltLab GmbH
 * @license	GNU Lesser General Public License <http://opensource.org/licenses/lgpl-license.php>
 * @package	com.woltlab.wcf
 * @subpackage	form
 * @category 	Community Framework
 */
interface Form extends Page {
	/**
	 * Is called when the form was submitted.
	 */
	public function submit();
	
	/**
	 * Validates form inputs.
	 */
	public function validate();
	
	/**
	 * Saves the data of the form.
	 */
	public function save();
	
	/**
	 * Reads the given form parameters.
	 */
	public function readFormParameters();
}
?>