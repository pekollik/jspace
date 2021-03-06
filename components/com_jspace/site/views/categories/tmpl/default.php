<?php
/**
 * Default display for details about a single category.
 * 
 * @author		$LastChangedBy$
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
 * Michał Kocztorz				<michalkocztorz@wijiti.com> 
 * 
 */

defined( '_JEXEC' ) or die( 'Restricted access' );
/* @var $category JSpaceRepositoryCategory */
$category = $this->category;

/* @var $pagination JPagination */
$pagination = $this->pagination;

JLoader::discover('JSpaceHelper', JPATH_BASE . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'com_jspace' . DIRECTORY_SEPARATOR . 'helpers' );

?> 
<?php if( !$category->isRoot() ): ?>
	<a href="<?php echo JSpaceHelperRoute::getCategoryUrl( $category->getParent()->getId() ); ?>">
		<?php echo $category->getParent()->getName(); ?>
	</a>
<?php endif; ?>
<h2><?php echo $category->getName(); ?></h2>
<ul class="jspace-categories">
	<?php foreach( $category->getChildren() as $subcategory ): ?>
		<li>
			<a href="<?php echo JSpaceHelperRoute::getCategoryUrl( $subcategory->getId() ); ?>">
				<?php echo $subcategory->getName(); ?>
			</a>
		</li>
	<?php endforeach; ?>
</ul>
<ul class="jspace-items">
	<?php foreach( $this->items as $id => $item ): ?>
		<li>
			<a href="<?php echo JSpaceHelperRoute::getItemFullRoute( $id ); ?>">
				<?php echo $item->getMetadata('title'); ?>
			</a>
		</li>
	<?php endforeach; ?>
</ul>

<div class="jspace-pagination">
	<?php echo $pagination->getPagesLinks(); ?>
</div>


