<?php defined('_JEXEC') or die;

/**
 * File       helper.php
 * Created    1/1/15 7:20 AM
 * Author     Matt Thomas | matt@betweenbrain.com | http://betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2015 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v2 or later
 */
class ModSessionBasedContentHelper
{
	/**
	 * Constructor
	 *
	 * @param JRegistry $params : module parameters
	 *
	 * @since 0.1
	 *
	 */
	public function __construct($params)
	{
		$this->db     = JFactory::getDbo();
		$this->params = $params;
	}

	/**
	 * Gets the data
	 *
	 * @return int
	 */
	public function showData()
	{
		$isDefault       = $this->params->get('isDefault', false);
		$sessionVariable = $this->params->get('sessionVariable');
		$sessionValues   = $this->getSessionValues();
		$session         = JFactory::getSession();

		if ($session->has($sessionVariable) && in_array($session->get($sessionVariable), $sessionValues))
		{
			return true;
		}

		if (!$session->has($sessionVariable) && $isDefault)
		{
			return true;
		}

		return false;
	}

	private function getSessionValues()
	{
		$sessionValues = $this->params->get('sessionValues');

		$return = str_split(',', $sessionValues);

		if (!is_array($return))
		{
			$return = str_split($return, strlen($return));
		}

		return $return;

	}
}