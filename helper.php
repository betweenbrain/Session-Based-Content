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
	 * @since 1.0.0
	 *
	 */
	public function __construct($params)
	{
		$this->db     = JFactory::getDbo();
		$this->params = $params;
	}

	/**
	 * Checks the user's session for matches as configured
	 *
	 * @return boolean
	 *
	 * @since 1.0.0
	 */
	public function showData()
	{
		$isFallback      = $this->params->get('isFallback', false);
		$mode            = $this->params->get('mode', 'inclusive');
		$sessionVariable = $this->params->get('sessionVariable');
		$sessionValues   = $this->getSessionValues();
		$session         = JFactory::getSession();

		$match = ($mode == 'inclusive') ? in_array($session->get($sessionVariable), $sessionValues) : !in_array($session->get($sessionVariable), $sessionValues);

		if ($session->has($sessionVariable) && $match)
		{
			return true;
		}

		if (!$session->has($sessionVariable) && $isFallback)
		{
			return true;
		}

		return false;
	}

	/**
	 * Gets and formats the configured session values
	 *
	 * @return array
	 *
	 * @since 1.0.0
	 */
	private function getSessionValues()
	{
		$sessionValues = $this->params->get('sessionValues', '');

		$pattern = '/[\s,]+/';
		if (preg_match($pattern, $sessionValues))
		{
			$sessionValues = preg_split($pattern, $sessionValues, 0, PREG_SPLIT_NO_EMPTY);
		}

		if (!is_array($sessionValues))
		{
			$sessionValues = str_split($sessionValues, strlen($sessionValues));
		}

		return $sessionValues;

	}
}