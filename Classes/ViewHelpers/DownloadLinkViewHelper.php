<?php
namespace ArnoSchoon\ResourceDownload\ViewHelpers;

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
 * Class DownloadLinkViewHelper
 *
 * @package ArnoSchoon\ResourceDownload\ViewHelpers
 */
class DownloadLinkViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper {

	/**
	 * @var string
	 */
	protected $tagName = 'a';

	/**
	 * Initialize arguments
	 *
	 * @return void
	 * @api
	 */
	public function initializeArguments() {
		$this->registerUniversalTagAttributes();
		$this->registerTagAttribute('name', 'string', 'Specifies the name of an anchor');
		$this->registerTagAttribute('rel', 'string', 'Specifies the relationship between the current document and the linked document');
		$this->registerTagAttribute('rev', 'string', 'Specifies the relationship between the linked document and the current document');
		$this->registerTagAttribute('target', 'string', 'Specifies where to open the linked document');
	}

	/**
	 * @param \TYPO3\CMS\Extbase\Domain\Model\File|\TYPO3\CMS\Extbase\Domain\Model\FileReference $resource
	 *
	 * @return string Rendered link
	 */
	public function render($resource) {
		$originalResource = $resource->getOriginalResource();

		if ($originalResource instanceof \TYPO3\CMS\Core\Resource\FileReference) {
			$originalResource = $originalResource->getOriginalFile();
		}

		$seal = md5(serialize(array(
			(int) $originalResource->getUid(),
			$GLOBALS['TYPO3_CONF_VARS']['SYS']['encryptionKey']
		)));

		$uri = sprintf(
			'/?eID=%s&resource=%d&seal=%s',
			'resource_download',
			$originalResource->getUid(),
			$seal
		);

		$this->tag->addAttribute('href', $uri);
		$this->tag->setContent($this->renderChildren());
		$this->tag->forceClosingTag(TRUE);

		return $this->tag->render();
	}

}
?>