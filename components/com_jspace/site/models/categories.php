<?php 
/**
 * A model that displays information about category.
 * 
 * @author		$LastChangedBy$
 * @package		JSpace
 * @copyright	Copyright (C) 2011 Wijiti Pty Ltd. All rights reserved.
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
 * Michał Kocztorz				<michalkocztorz@wijiti.com> 
 * 
 */

defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.model');


class JSpaceModelCategories extends JModelLegacy
{
	/**
	 * 
	 * @var JSpaceRepositoryCategory
	 */
	protected $_category = null;
	
	/**
	 * 
	 * @param mixed $id
	 * @return JSpaceRepositoryCategory
	 */
	public function getCategory( $id=0 ) {
		if( is_null( $this->_category ) ) {
			try {
				$this->_category = JSpaceFactory::getRepository()->getCategory( $id );
			}
			catch( Exception $e ) {
				//
			}
		}
		
		return $this->_category;
	}
}







