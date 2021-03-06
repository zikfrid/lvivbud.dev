<?php
/**
 * @package         Advanced Module Manager
 * @version         6.0.1PRO
 * 
 * @author          Peter van Westen <info@regularlabs.com>
 * @link            http://www.regularlabs.com
 * @copyright       Copyright © 2016 Regular Labs All Rights Reserved
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

/**
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

jimport('joomla.filesystem.file');

$this->config->show_assignto_groupusers = (int) (
	$this->config->show_assignto_usergrouplevels
	|| $this->config->show_assignto_users
);

require_once JPATH_LIBRARIES . '/regularlabs/helpers/functions.php';
$this->config->show_assignto_easyblog      = (int) ($this->config->show_assignto_easyblog && RLFunctions::extensionInstalled('easyblog'));
$this->config->show_assignto_flexicontent  = (int) ($this->config->show_assignto_flexicontent && RLFunctions::extensionInstalled('flexicontent'));
$this->config->show_assignto_form2content  = (int) ($this->config->show_assignto_form2content && RLFunctions::extensionInstalled('form2content'));
$this->config->show_assignto_k2            = (int) ($this->config->show_assignto_k2 && RLFunctions::extensionInstalled('k2'));
$this->config->show_assignto_zoo           = (int) ($this->config->show_assignto_zoo && RLFunctions::extensionInstalled('zoo'));
$this->config->show_assignto_akeebasubs    = (int) ($this->config->show_assignto_akeebasubs && RLFunctions::extensionInstalled('akeebasubs'));
$this->config->show_assignto_hikashop      = (int) ($this->config->show_assignto_hikashop && RLFunctions::extensionInstalled('hikashop'));
$this->config->show_assignto_mijoshop      = (int) ($this->config->show_assignto_mijoshop && RLFunctions::extensionInstalled('mijoshop'));
$this->config->show_assignto_redshop       = (int) ($this->config->show_assignto_redshop && RLFunctions::extensionInstalled('redshop'));
$this->config->show_assignto_virtuemart    = (int) ($this->config->show_assignto_virtuemart && RLFunctions::extensionInstalled('virtuemart'));
$this->config->show_assignto_cookieconfirm = (int) ($this->config->show_assignto_cookieconfirm && RLFunctions::extensionInstalled('cookieconfirm'));

$assignments = array(
	'menuitems',
	'homepage',
	'date',
	'groupusers',
	'languages',
	'ips',
	'geo',
	'templates',
	'urls',
	'os',
	'browsers',
	'components',
	'tags',
	'content',
	'easyblog',
	'flexicontent',
	'form2content',
	'k2',
	'zoo',
	'akeebasubs',
	'hikashop',
	'mijoshop',
	'redshop',
	'virtuemart',
	'cookieconfirm',
	'php',
);
foreach ($assignments as $i => $ass)
{
	if ($ass != 'menuitems' && (!isset($this->config->{'show_assignto_' . $ass}) || !$this->config->{'show_assignto_' . $ass}))
	{
		unset($assignments[$i]);
	}
}

$html = array();

$html[] = $this->render($this->assignments, 'assignments');

$html[] = $this->render($this->assignments, 'mirror_module');
$html[] = '<div class="clear"></div>';
$html[] = '<div id="' . rand(1000000, 9999999) . '___mirror_module.0" class="rl_toggler">';

if (count($assignments) > 1)
{
	$html[] = $this->render($this->assignments, 'match_method');
	$html[] = $this->render($this->assignments, 'show_assignments');
}
else
{
	$html[] = '<input type="hidden" name="show_assignments" value="1">';
}

foreach ($assignments as $ass)
{
	$html[] = $this->render($this->assignments, 'assignto_' . $ass);
}

$show_assignto_users = (int) $this->config->show_assignto_users;
$html[] = '<input type="hidden" name="show_users" value="' . $show_assignto_users . '">';
$html[] = '<input type="hidden" name="show_usergrouplevels" value="' . (int) $this->config->show_assignto_usergrouplevels . '">';

$html[] = '</div>';

echo implode("\n\n", $html);
