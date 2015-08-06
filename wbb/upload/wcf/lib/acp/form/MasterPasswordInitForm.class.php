<?php
// wcf imports
require_once(WCF_DIR.'lib/acp/form/MasterPasswordForm.class.php');

/**
 * Shows the master password init form.
 *
 * @author	Marcel Werk
 * @copyright	2001-2009 WoltLab GmbH
 * @license	GNU Lesser General Public License <http://opensource.org/licenses/lgpl-license.php>
 * @package	com.woltlab.wcf
 * @subpackage	acp.form
 * @category 	Community Framework
 */
class MasterPasswordInitForm extends MasterPasswordForm {
	// system
	public $templateName = 'masterPasswordInit';

	/**
	 * master password confirm
	 * 
	 * @var	string
	 */
	public $confirmMasterPassword = '';
	
	/**
	 * @see Page::readParameters()
	 */	
	public function readParameters() {
		ACPForm::readParameters();
		
		if (file_exists(WCF_DIR.'acp/masterPassword.inc.php')) {
			require_once(WCF_DIR.'acp/masterPassword.inc.php');
		}
		
		if (defined('MASTER_PASSWORD') && defined('MASTER_PASSWORD_SALT')) {
			throw new IllegalLinkException();
		}
	}
	
	/**
	 * @see Form::readFormParameters()
	 */
	public function readFormParameters() {
		parent::readFormParameters();
		
		if (isset($_POST['confirmMasterPassword'])) $this->confirmMasterPassword = $_POST['confirmMasterPassword'];
	}
	
	/**
	 * @see Form::validate()
	 */
	public function validate() {
		ACPForm::validate();
		
		if (empty($this->masterPassword)) {
			throw new UserInputException('masterPassword');
		}
		
		// check password security
		if (StringUtil::length($this->masterPassword) < 8) {
			throw new UserInputException('masterPassword', 'notSecure');
		}
		// digits
		if (!preg_match('![0-9]+!', $this->masterPassword)) {
			throw new UserInputException('masterPassword', 'notSecure');
		}
		// latin characters (lower-case)
		if (!preg_match('![a-z]+!', $this->masterPassword)) {
			throw new UserInputException('masterPassword', 'notSecure');
		}
		// latin characters (upper-case)
		if (!preg_match('![A-Z]+!', $this->masterPassword)) {
			throw new UserInputException('masterPassword', 'notSecure');
		}
		// special characters
		if (!preg_match('![^A-Za-z0-9]+!', $this->masterPassword)) {
			throw new UserInputException('masterPassword', 'notSecure');
		}
		
		// search for identical admin passwords
		$sql = "SELECT	password, salt
			FROM	wcf".WCF_N."_user
			WHERE	userID IN (
					SELECT	userID
					FROM	wcf".WCF_N."_user_to_groups
					WHERE	groupID = 4
				)";
		$result = WCF::getDB()->sendQuery($sql);
		while ($row = WCF::getDB()->fetchArray($result)) {
			if (StringUtil::getDoubleSaltedHash($this->masterPassword, $row['salt']) == $row['password']) {
				throw new UserInputException('masterPassword', 'notSecure');
			}
		}
		
		// confirm master password
		if (empty($this->confirmMasterPassword)) {
			throw new UserInputException('confirmMasterPassword');
		}
		
		if ($this->confirmMasterPassword != $this->masterPassword) {
			throw new UserInputException('confirmMasterPassword', 'notEqual');
		}
	}
	
	/**
	 * @see Form::save()
	 */
	public function save() {
		// generate salt
		$salt = StringUtil::getRandomID();

		// write master password file
		$file = new File(WCF_DIR.'acp/masterPassword.inc.php');
		$file->write("<?php
/** MASTER PASSWORD STORAGE
DO NOT EDIT THIS FILE */
define('MASTER_PASSWORD', '".StringUtil::getSaltedHash($this->masterPassword, $salt)."');
define('MASTER_PASSWORD_SALT', '".$salt."');
?>");
		$file->close();
		@chmod(WCF_DIR.'acp/masterPassword.inc.php', 0777);
		
		parent::save();
	}
	
	/**
	 * Generates a random user password with the given character length.
	 *
	 * @return	string		new password
	 */
	public static function getExamplePassword() {
		$availableCharacters = array(
			0 => 'abcdefghijklmnopqrstuvwxyz',
			1 => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
			2 => '0123456789',
			3 => '+#-.,;:?!'
		);
		
		$password = '';
		$type = 0;
		for ($i = 0; $i < 12; $i++) {
			$type = ($i % 4 == 0) ? 0 : ($type + 1);
			$password .= substr($availableCharacters[$type], MathUtil::getRandomValue(0, strlen($availableCharacters[$type]) - 1), 1);
		}
		
		return str_shuffle($password);
	}
	
	/**
	 * @see Page::assignVariables()
	 */
	public function assignVariables() {
		parent::assignVariables();
		
		WCF::getTPL()->assign(array(
			'confirmMasterPassword' => $this->confirmMasterPassword,
			'exampleMasterPassword' => self::getExamplePassword()
		));
	}
}
?>