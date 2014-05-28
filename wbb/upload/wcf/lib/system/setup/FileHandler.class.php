<?php
/**
 * A FileHandler class logs files and checks their overwriting rights.
 * 
 * @author	Marcel Werk
 * @copyright	2001-2009 WoltLab GmbH
 * @license	GNU Lesser General Public License <http://opensource.org/licenses/lgpl-license.php>
 * @package	com.woltlab.wcf
 * @subpackage	system.setup
 * @category 	Community Framework
 */
interface FileHandler {
	/**
	 * Checks the overwriting rights of the given files.
	 * 
	 * @param	array		$files
	 */
	public function checkFiles(&$files);
	
	/**
	 * Logs the given list of files.
	 * 
	 * @param	array		$files
	 */
	public function logFiles(&$files);
}
?>