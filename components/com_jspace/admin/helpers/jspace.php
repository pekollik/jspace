<?php
/**
 * A general helper for the JSpace component.
 * 
 * @author		$LastChangedBy$
 * @package		JSpace
 * @copyright	Copyright (C) 2012 Wijiti Pty Ltd. All rights reserved.
 * @license     This file is part of the JSpace component for Joomla!.

   The JSpace component for Joomla! is free software: you can redistribute it 
   and/or modify it under the terms of the GNU General Public License as 
   published by the Free Software Foundation, either version 3 of the License, 
   or (at your option) any later version.

   The JSpace component for Joomla! is distributed in the hope that it will be 
   useful, but WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   GNU General Public License for more details.

   You should have received a copy of the GNU General Public License
   along with the JSpace component for Joomla!.  If not, see 
   <http://www.gnu.org/licenses/>.

 * Contributors
 * Please feel free to add your name and email (optional) here if you have 
 * contributed any source code changes.
 * Name							Email
 * Hayden Young					<haydenyoung@wijiti.com> 
 * 
 */

defined('_JEXEC') or die('Restricted access');

class JSpaceHelper
{
	public static $extension = 'com_jspace';

	/**
	 * Configure the Linkbar.
	 *
	 * @param string $vName The name of the active view.
	 *
	 * @return void
	 */
	public static function addSubmenu($vName)
	{
		JSubMenuHelper::addEntry(
			JText::_('COM_JSPACE_SUBMENU_CONFIGURATION'),
			'index.php?option=com_jspace&view=configuration',
			$vName == 'configuration'
		);
		JSubMenuHelper::addEntry(
			JText::_('COM_JSPACE_SUBMENU_COMMUNITIES'),
			'index.php?option=com_jspace&view=communities',
			$vName == 'communities'
		);
		JSubMenuHelper::addEntry(
			JText::_('COM_JSPACE_SUBMENU_COLLECTIONS'),
			'index.php?option=com_jspace&view=collections',
			$vName == 'collections'
		);
		JSubMenuHelper::addEntry(
			JText::_('COM_JSPACE_SUBMENU_USERS'),
			'index.php?option=com_jspace&view=users',
			$vName == 'users'
		);
	}
	
	/**
	 * Gets a list of the actions that can be performed.
	 *
	 * @param	int		The community ID.
	 *
	 * @return	JObject
	 * @since	1.6
	 */
	public static function getActions($communityId = 0)
	{
		$user	= JFactory::getUser();
		$result	= new JObject();

		if (empty($communityId)) {
			$assetName = 'com_jspace';
		} else {
			$assetName = 'com_jspace.community.'.(int) $communityId;
		}

		$actions = array(
			'core.admin', 
			'core.manage', 
			'core.create', 
			'core.edit', 
			'core.edit.own', 
			'core.edit.state', 
			'core.delete',
			'jspace.workflows.view',
			'jspace.workflow.review',
			'jspace.workflow.review.global'
		);

		foreach ($actions as $action) {
			$result->set($action,	$user->authorise($action, $assetName));
		}

		return $result;
	}
}