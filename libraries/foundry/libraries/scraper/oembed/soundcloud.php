<?php
/**
* @package		Foundry
* @copyright	Copyright (C) Stack Ideas Sdn Bhd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* Foundry is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');

class OembedAdapterSoundCloud extends OembedAdapter
{
	/**
	 * Tests to see if the url is a valid url for this adapter
	 *
	 * @since	1.0.0
	 * @access	public
	 */
	public function isValid($url)
	{
		if (stristr($url, 'soundcloud.com') === false) {
			return false;
		}

		return true;
	}

	public function process(&$result)
	{
		$url = 'https://soundcloud.com/oembed?format=json&url=' . urlencode($this->url);

		$connector = FH::connector($url);
		$contents = $connector->execute()->getResult();

		$oembed = json_decode($contents);

		// Test if thumbnail_url is set so we can standardize this
		if (isset($oembed->thumbnail_url)) {
			$oembed->thumbnail = $oembed->thumbnail_url;
		}

		$result->oembed = $oembed;
	}
}
