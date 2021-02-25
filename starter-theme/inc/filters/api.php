<?php
namespace Matise\Filters;

/**
 * We add all fields to the api, we can filter them before returning. Try to use the ACF before using this!
 */

class API {
	public function __construct() {
		//Filter on relative URL
		add_filter('matise_get_relative_url', array($this, 'get_relative_url'), 10, 1);
	}

	/** 
	 * Filter for relative url, used by Matise wp core
	 * $permalink - formatted url
	 */
	public function get_relative_url($permalink) {
		$permalink = str_replace('https://north-east.test', '', $permalink);
		$permalink = str_replace('http://north-east.test', '', $permalink);
		$permalink = str_replace('https://staging.north-east.mati.se', '', $permalink);
		$permalink = str_replace('https://localhost:3000', '', $permalink);
		return $permalink;
	}
}
new API();