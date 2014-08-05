<?php
$resourceUid = \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('resource');
$seal = \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('seal');

if (empty($resourceUid) || empty($seal)) {
	header(\TYPO3\CMS\Core\Utility\HttpUtility::HTTP_STATUS_400);
	die;
}

$check = md5(serialize(array(
	(int) $resourceUid,
	$GLOBALS['TYPO3_CONF_VARS']['SYS']['encryptionKey']
)));

if (strcmp($seal, $check) !== 0) {
	header(\TYPO3\CMS\Core\Utility\HttpUtility::HTTP_STATUS_409);
	die;
}

\ArnoSchoon\ResourceDownload\Utility\FrontendUtility::startSimulation();

/** @var \TYPO3\CMS\Core\Resource\FileRepository $fileRepository */
$fileRepository = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Resource\\FileRepository');

$file = $fileRepository->findByUid($resourceUid);

if ($file instanceof \TYPO3\CMS\Core\Resource\File) {
	header('Pragma: public');
	header('Expires: 0');
	header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	header('Cache-Control: public');
	header('Content-Type: ' . $file->getMimeType());
	header('Content-length: ' . $file->getSize());
	header('Content-Disposition: attachment; filename=' . $file->getName());
	header('Content-Description: File Transfer');
	header('Content-Transfer-Encoding: binary');
	readfile($file->getForLocalProcessing(FALSE));
} else {
	header(\TYPO3\CMS\Core\Utility\HttpUtility::HTTP_STATUS_404);
}

\ArnoSchoon\ResourceDownload\Utility\FrontendUtility::stopSimulation();
?>