<?php
/**
 * @version	$Id$
 * @copyright	Copyright (C) 2012 Wijiti Pty Ltd, Inc. All rights reserved.
 * @license	http://www.gnu.org/licenses/gpl-3.0.html
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.plugin.plugin');

/**
 *
 * @package	JSpace.Plugin
 * @subpackage	JSpace.Init
 */
class plgJspaceDriver extends JPlugin
{
	public function onJSpaceRegisterDrivers()
	{
		$this->loadLanguage();//translation for config
		JSpaceLog::add('Triggered plgJspaceDriver.onJSpaceRegisterDrivers', JLog::DEBUG, JSpaceLog::CAT_INIT);
		$blankPath = JPATH_LIBRARIES . DIRECTORY_SEPARATOR . 'jspace' . DIRECTORY_SEPARATOR . 'repository' . DIRECTORY_SEPARATOR . 'blank' . DIRECTORY_SEPARATOR;
		return array(
			'blank'	=> array(
					'configXmlPath'	=> $blankPath . 'adminConfig.xml',
					'classPrefix'	=> 'JSpaceRepositoryBlank',
					'basePath'		=> $blankPath,
			),
		);
	}
	
	public function onJSpaceRegisterCacheDrivers()
	{
		$basePath = JPATH_LIBRARIES . DIRECTORY_SEPARATOR . 'jspace' . DIRECTORY_SEPARATOR . 'repository' . DIRECTORY_SEPARATOR . 'cache' . DIRECTORY_SEPARATOR . 'jselective' . DIRECTORY_SEPARATOR;
		return array(
				'other'	=> array(
					'options'		=> array('driver'	=> 'jselective'),
					'classPrefix'	=> 'JSpaceRepositoryCacheJselective',	
					'basePath'		=> $basePath,
				),
		);
	}
	
	public function onJSpaceRegisterFilters() {
		$path = JPATH_LIBRARIES . DIRECTORY_SEPARATOR . 'jspace' . DIRECTORY_SEPARATOR . 'repository' . DIRECTORY_SEPARATOR . 'dspace' . DIRECTORY_SEPARATOR . 'filters' . DIRECTORY_SEPARATOR;
		
		return array (
			'example' => array(
				'classPrefix'	=> 'JSpaceRepositoryDspaceFilters',
				'basePath'		=> $path,
				'driver'		=> 'DSpace',
			)
		);
	}
}

