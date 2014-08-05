<?php
namespace ArnoSchoon\ResourceDownload\Utility;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Arno Schoon <arno@maxserv.com>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Class FrontendUtility
 *
 * @package ArnoSchoon\ResourceDownload\Utility
 */
class FrontendUtility {

	/**
	 * @var \TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController
	 */
	protected static $tsfeBackup;

	/**
	 * @return void
	 */
	public static function startSimulation() {
		self::$tsfeBackup = $GLOBALS['TSFE'];

		/** @var \TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController $tsfe */
		$tsfe = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
			'TYPO3\\CMS\\Frontend\\Controller\\TypoScriptFrontendController',
			$GLOBALS['TYPO3_CONF_VARS'],
			0,
			0
		);

		$tsfe->initFEuser();
		$tsfe->determineId();

		if (!isset($GLOBALS['TCA']['pages'])) {
			\TYPO3\CMS\Core\Core\Bootstrap::getInstance()->loadCachedTca();
		}

		$tsfe->initTemplate();
		$tsfe->getConfigArray();
		$tsfe->convPOSTCharset();
		$tsfe->settingLanguage();
		$tsfe->settingLocale();

		$GLOBALS['TSFE'] = $tsfe;
	}

	/**
	 * @return void
	 */
	public static function stopSimulation() {
		$GLOBALS['TSFE'] = self::$tsfeBackup;
	}

}
?>