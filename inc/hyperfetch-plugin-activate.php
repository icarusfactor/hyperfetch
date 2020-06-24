<?php
/**
 * @package  HyperFetchPlugin
 */

class HyperFetchPluginActivate
{
	public static function activate() {
		flush_rewrite_rules();
	}
}