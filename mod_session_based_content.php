<?php defined('_JEXEC') or die;

/**
 * File       mod_session_based_content.php
 * Created    1/1/15 7:20 AM
 * Author     Matt Thomas | matt@betweenbrain.com | http://betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2015 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v2 or later
 */

// Include the syndicate functions only once
require_once __DIR__ . '/helper.php';

$helper = new modSessionBasedContentHelper($params);

if (!$helper->showData())
{
	$module->content = null;
}

if ($module->content && $params->def('prepare_content', 1))
{
	JPluginHelper::importPlugin('content');
	$module->content = JHtml::_('content.prepare', $module->content, '', 'mod_session_based_content.content');
}

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

if ($module->content)
{
	require JModuleHelper::getLayoutPath('mod_session_based_content', 'default');
}