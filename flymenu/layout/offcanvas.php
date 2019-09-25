<?php
use Joomla\CMS\Helper\ModuleHelper;
use Joomla\Registry\Registry as JRegistry;
$menutype = $displayData ? $displayData : 'mainmenu';
$modules = ModuleHelper::getModule('mod_menu'); 
$params = new JRegistry(); 
$params->loadString($modules->params); 
$params->set('layout', 'mega');
$params->set('menutype', 'mainmenu');
$params->set('showAllChildren', 1);
// create a module object to render
$module = new \stdClass;
$module->params = $params;
$module->module = 'mod_menu';
$module->id = 0;
$module->name = 'menu';
$module->title = 'Mega menu';
$module->position = 'none';

echo ModuleHelper::renderModule($module, []);
