<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  System.Highlight
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
use Joomla\Event\Event;
/**
 * System plugin to highlight terms.
 *
 * @since  2.5
 */
class PlgSystemFlymenu extends JPlugin
{
	public function __construct(& $subject, $config)
	{
		parent::__construct($subject, $config);
		// Include the menu functions only once
		JLoader::register('flymenuHelper', __DIR__ . '/helper.php');

	}
		/**
	 * The privacy consent expiration check code is triggered after the page has fully rendered.
	 *
	 * @return  void
	 *
	 * @since   3.9.0
	 */
	public function onBeforeRender()
	{
		$app = JFactory::getApplication();
		if($app->isAdmin()) return;
		$offcanvas = "<div class='flymemu' style='display:none;'>";
		$offcanvas .= \JLayoutHelper::render ('layout.offcanvas', $this->params->get('menutype'), JPATH_PLUGINS . '/system/flymenu');;
		$offcanvas .= "</div>";
		$offcanvas .= '<button class="flymenu-offcanvas-toggle"><span class="toggle-bars"></span></button>';
		echo $offcanvas;

	}
	public function onBeforeCompileHead() {
		$app = JFactory::getApplication();
		if($app->isAdmin()) return;
		$doc = JFactory::getDocument();
		$doc->addStyleSheet(\JUri::root(true) . 'plugins/system/flymenu/assets/css/flymenu.css');
		$doc->addScript(\JUri::root(true) . 'plugins/system/flymenu/assets/js/flymenu.js');
	}
}
