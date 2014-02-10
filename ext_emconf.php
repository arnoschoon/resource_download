<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "extbase_rest".
 *
 * Auto generated 03-02-2014 10:23
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'Download proxy for resources (sys_file)',
	'description' => '',
	'category' => 'fe',
	'shy' => 0,
	'version' => '0.0.0',
	'dependencies' => '',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'module' => '',
	'state' => 'alpha',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearcacheonload' => 0,
	'lockType' => '',
	'author' => 'Arno Schoon',
	'author_email' => 'arno@maxserv.nl',
	'author_company' => 'MaxServ B.V.',
	'CGLcompliance' => NULL,
	'CGLcompliance_note' => NULL,
	'constraints' => 
	array (
		'depends' => 
		array (
			'typo3' => '6.1.0-6.1.7',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
	'_md5_values_when_last_written' => 'a:11:{s:16:"ext_autoload.php";s:4:"068a";s:12:"ext_icon.gif";s:4:"452a";s:17:"ext_localconf.php";s:4:"4784";s:18:"Classes/Router.php";s:4:"68c7";s:38:"Classes/Controller/DummyController.php";s:4:"70d8";s:26:"Classes/Core/Bootstrap.php";s:4:"1424";s:44:"Classes/Hook/FrontendRequestPreProcessor.php";s:4:"7ef5";s:34:"Classes/Mvc/Web/RequestBuilder.php";s:4:"f430";s:38:"Classes/Mvc/Web/RestRequestHandler.php";s:4:"7258";s:35:"Classes/Utility/FrontendUtility.php";s:4:"8e98";s:32:"Resources/Private/PHP/Router.php";s:4:"72bd";}',
);

?>