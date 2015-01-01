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

$helper  = new modSessionBasedContentHelper;
$options = $helper->getData();

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require JModuleHelper::getLayoutPath('mod_session_based_contet', 'default');