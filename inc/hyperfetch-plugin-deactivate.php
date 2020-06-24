<?php
/**
 * @package  HyperFetchPlugin
 */

class HyperFetchPluginDeactivate
{
	public static function deactivate() {
		flush_rewrite_rules();
	}
}