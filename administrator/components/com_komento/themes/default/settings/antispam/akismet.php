<?php
/**
* @package		Komento
* @copyright	Copyright (C) Stack Ideas Sdn Bhd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* Komento is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');
?>
<div class="grid grid-cols-1 md:grid-cols-12 gap-md">
	<div class="col-span-1 md:col-span-6 w-auto">
		<div class="panel">
			<?php echo $this->fd->html('panel.heading', 'COM_KOMENTO_SETTINGS_AKISMET'); ?>
			<div class="panel-body">
				<?php echo $this->fd->html('settings.toggle', 'antispam_akismet', 'COM_KOMENTO_SETTINGS_AKISMET_ENABLE'); ?>
				<?php echo $this->fd->html('settings.text', 'antispam_akismet_key', 'COM_KOMENTO_SETTINGS_AKISMET_API_KEY'); ?>

				<?php echo $this->fd->html('settings.dropdown', 'antispam_akismet_rejection_type', 'COM_KOMENTO_SETTINGS_ANTISPAM_REJECTION_TYPE', [
					'high' => 'COM_KOMENTO_SETTINGS_ANTISPAM_REJECTION_TYPE_COMPLETE_BLOCK',
					'low' => 'COM_KOMENTO_SETTINGS_ANTISPAM_REJECTION_TYPE_ALLOW_PASSTHROUGH'
				], '', '', 'COM_KOMENTO_SETTINGS_ANTISPAM_REJECTION_TYPE_INFO'); ?>
			</div>
		</div>
	</div>

	<div class="col-span-1 md:col-span-6 w-auto">
	</div>
</div>