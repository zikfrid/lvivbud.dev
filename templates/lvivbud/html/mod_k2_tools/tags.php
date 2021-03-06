<?php
/**
 * @version		2.6.x
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2014 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die;

?>

<div id="k2ModuleBox<?php echo $module->id; ?>" class="works_tag k2TagCloudBlock<?php if($params->get('moduleclass_sfx')) echo ' '.$params->get('moduleclass_sfx'); ?>">
	<a href="/vykonani-roboty" class="works_tag__item" > <?php echo JText::_('MOD_K2_ALL_RROJECTS') ?></a>
	<?php foreach ($tags as $tag): ?>
	<?php if(!empty($tag->tag)): ?>
	<a href="<?php echo $tag->link; ?>" class="works_tag__item" title="<?php echo $tag->count.' '.JText::_('K2_ITEMS_TAGGED_WITH').' '.K2HelperUtilities::cleanHtml($tag->tag); ?>">
		<?php echo $tag->tag; ?>
	</a>
	<?php endif; ?>
	<?php endforeach; ?>
	<div class="clr"></div>
</div>
