<?php
/**
 * Item aware cache class. 
 * Caches requests for each item separately (if request is item related).
 * This allows purging the cache for one item.
 * 
 * @package		JSpace
 * @subpackage	Repository
 * @copyright	Copyright (C) 2012 Wijiti Pty Ltd. All rights reserved.
 * @license     This file is part of the JSpace library for Joomla!.

   The JSpace library for Joomla! is free software: you can redistribute it 
   and/or modify it under the terms of the GNU General Public License as 
   published by the Free Software Foundation, either version 3 of the License, 
   or (at your option) any later version.

   The JSpace library for Joomla! is distributed in the hope that it will be 
   useful, but WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   GNU General Public License for more details.

   You should have received a copy of the GNU General Public License
   along with the JSpace library for Joomla!.  If not, see 
   <http://www.gnu.org/licenses/>.

 * Contributors
 * Please feel free to add your name and email (optional) here if you have 
 * contributed any source code changes.
 * Name							Email
 * Micha� Kocztorz				<michalkocztorz@wijiti.com> 
 * 
 */
 
defined('JPATH_PLATFORM') or die;

jimport('jspace.repository.cache');
jimport('jspace.repository.cache.jcache.cache');//joomla cache controller

JCacheController::addIncludePath(dirname(__FILE__));

/**
 * @package     JSpace
 * @subpackage  Repository
 */
class JSpaceRepositoryCacheJselectiveCache extends JSpaceRepositoryCacheJcacheCache
{
	/**
	 * Returns JCache obkect with group set.
	 * Default group is: jspace.default
	 * If cached data is related to item: jspace.item.<item_id> 
	 * 
	 * @param JSpaceRepositoryCacheKey $key
	 * @return JCache
	 */
	protected function _getJCache( JSpaceRepositoryCacheKey $key ) {
		$group = $key->getEndpoint()->get('group');
		JSpaceLog::add("Cache [{$this->_driver}]. Fetch JCache group {$group}", JLog::DEBUG, JSpaceLog::CAT_CACHE);
		$cache = JFactory::getCache($group, 'plain');
		$cache->setCaching( true );
		return $cache;
	}
	
	public function clean( JSpaceRepositoryCacheKey $key ) {
		$group = $key->getEndpoint()->get('group');
		JSpaceLog::add("Cache [{$this->_driver}]. Fetch JCache group {$group}", JLog::DEBUG, JSpaceLog::CAT_CACHE);
		$cache = JFactory::getCache($group, 'plain');
		return $cache->clean();
	}
}




