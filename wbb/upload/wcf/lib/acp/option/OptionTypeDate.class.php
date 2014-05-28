<?php
// wcf imports
require_once(WCF_DIR.'lib/acp/option/OptionType.class.php');
require_once(WCF_DIR.'lib/acp/option/SearchableUserOption.class.php');
require_once(WCF_DIR.'lib/system/language/Language.class.php');

/**
 * OptionTypeDate is an implementation of OptionType for date inputs.
 *
 * @author	Marcel Werk
 * @copyright	2001-2009 WoltLab GmbH
 * @license	GNU Lesser General Public License <http://opensource.org/licenses/lgpl-license.php>
 * @package	com.woltlab.wcf
 * @subpackage	acp.option
 * @category 	Community Framework
 */
class OptionTypeDate implements OptionType, SearchableUserOption {
	protected $yearRequired = true;
	
	/**
	 * @see OptionType::getFormElement()
	 */
	public function getFormElement(&$optionData) {
		if (!isset($optionData['optionValue'])) {
			if (isset($optionData['defaultValue'])) $optionData['optionValue'] = $optionData['defaultValue'];
			else $optionData['optionValue'] = '';
		}
		$optionData['isOptionGroup'] = true;
		$optionData['divClass'] = 'formDate';
		
		$year = $month = $day = '';
		$optionValue = explode('-', (is_array($optionData['optionValue']) ? implode('-', $optionData['optionValue']) : $optionData['optionValue']));
		if (isset($optionValue[0])) $year = intval($optionValue[0]);
		if (empty($year)) $year = '';
		if (isset($optionValue[1])) $month = $optionValue[1];
		if (isset($optionValue[2])) $day = $optionValue[2];
		$dateInputOrder = explode('-', WCF::getLanguage()->get('wcf.global.dateInputOrder'));
		
		// generate days
		$days = array();
		$days[0] = '';
		for ($i = 1; $i < 32; $i++) {
			$days[$i] = $i;		
		}
		
		// generate months
		$months = array();
		$months[0] = '';
		$monthFormat = (Language::$dateFormatLocalized ? '%B' : '%m');
		for ($i = 1; $i < 13; $i++) {
			$months[$i] = DateUtil::formatDate($monthFormat, gmmktime(0, 0, 0, $i, 10, 2006), false, true);
		}
		
		WCF::getTPL()->assign(array(
			'year' => $year,
			'month' => $month,
			'day' => $day,
			'days' => $days,
			'months' => $months,
			'optionData' => $optionData,
			'dateInputOrder' => $dateInputOrder,
			'yearRequired' => $this->yearRequired
		));
		return WCF::getTPL()->fetch('optionTypeDate');
	}
	
	/**
	 * Formats the user input.
	 * 
	 * @param	array		$newValue
	 */
	protected function getValue(&$newValue) {
		if (isset($newValue['year'])) $newValue['year'] = intval($newValue['year']);
		else $newValue['year'] = 0;
		if (isset($newValue['month'])) $newValue['month'] = intval($newValue['month']);
		else $newValue['month'] = 0;
		if (isset($newValue['day'])) $newValue['day'] = intval($newValue['day']);
		else $newValue['day'] = 0;
	}
	
	/**
	 * @see OptionType::validate()
	 */
	public function validate($optionData, $newValue) {
		$this->getValue($newValue);
		
		if ($newValue['year'] || $newValue['month'] || $newValue['day']) {
			if (strlen($newValue['year']) == 2) {
				$newValue['year'] = '19'.$newValue['year'];
			}
			
			if (!checkdate(intval($newValue['month']), intval($newValue['day']), ((!$this->yearRequired && !$newValue['year']) ? 2000 : intval($newValue['year'])))) {
				throw new UserInputException($optionData['optionName'], 'validationFailed');
			}
			if (($newValue['year'] || $this->yearRequired) && ((strlen($newValue['year']) != 4 && strlen($newValue['year']) != 2) || $newValue['year'] < 1902)) {
				throw new UserInputException($optionData['optionName'], 'validationFailed');
			}
		}
	}
	
	/**
	 * @see OptionType::getData()
	 */
	public function getData($optionData, $newValue) {
		$this->getValue($newValue);
		
		if ($newValue['year'] || $newValue['month'] || $newValue['day']) {
			if ($newValue['month'] < 10) $newValue['month'] = '0'.$newValue['month'];
			if ($newValue['day'] < 10) $newValue['day'] = '0'.$newValue['day'];
			if (strlen($newValue['year']) == 2) {
				$newValue['year'] = '19'.$newValue['year'];
			}
			if (!$this->yearRequired && strlen($newValue['year']) < 2) {
				$newValue['year'] = '0000';
			}
			return $newValue['year'].'-'.$newValue['month'].'-'.$newValue['day'];
		}
		
		return '';
	}
	
	/**
	 * @see SearchableUserOption::getSearchFormElement()
	 */
	public function getSearchFormElement(&$optionData) {
		return $this->getFormElement($optionData);
	}
	
	/**
	 * @see SearchableUserOption::getCondition()
	 */
	public function getCondition($optionData, $value, $matchesExactly = true) {
		$value = $this->getData($optionData, $value);
		if ($value == '') return false;
		
		return "option_value.userOption".$optionData['optionID']." = '".escapeString($value)."'";
	}
}
?>