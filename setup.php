<?php
/*
 -------------------------------------------------------------------------
 Example plugin for GLPI
 Copyright (C) {YEAR} by the {NAME} Development Team.

 -------------------------------------------------------------------------

 LICENSE

 This file is part of Prueba.

 Example is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 Example is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with Example. If not, see <http://www.gnu.org/licenses/>.
 --------------------------------------------------------------------------
 */

// ----------------------------------------------------------------------
// Original Author of file:
// Purpose of file:
// ----------------------------------------------------------------------

define ('PLUGIN_PLUGS_VERSION', '0.1');

/**
 * Init hooks of the plugin.
 * REQUIRED
 *
 * @return void
 */
function plugin_init_plugs() {
   global $PLUGIN_HOOKS,$CFG_GLPI;

   // CSRF compliance : All actions must be done via POST and forms closed by Html::closeForm();
   $PLUGIN_HOOKS['csrf_compliant']['plugs'] = true;

   $PLUGIN_HOOKS['item_add']['plugs'] = [
                                          'Computer'  => 'plugs_item_called',
                                          'Phone'     => 'plugs_item_called'
                                       ];

   $PLUGIN_HOOKS['item_update']['plugs'] = [
                                             'Computer'  => 'plugs_item_called',
                                             'Phone'     => 'plugs_item_called'
                                          ];
}


/**
 * Get the name and the version of the plugin
 * REQUIRED
 *
 * @return array
 */
function plugin_version_plugs() {
   return [
      'name'           => 'Plugin Plugs',
      'version'        => PLUGIN_PLUGS_VERSION,
      'author'         => 'Javier Crespo',
      'license'        => 'GPLv2+',
      'homepage'       => 'https://www.javiercrespo.es',
      'requirements'   => [
         'glpi' => [
            'min' => '9.3',
            'dev' => true
         ]
      ]
   ];
}


/**
 * Check pre-requisites before install
 * OPTIONNAL, but recommanded
 *
 * @return boolean
 */
function plugin_plugs_check_prerequisites() {

   $version = rtrim(GLPI_VERSION, '-dev');
   if (version_compare($version, '9.3', 'lt')) {
      echo "This plugin requires GLPI 9.3";
      return false;
   }

   return true;
}

/**
 * Check configuration process
 *
 * @param boolean $verbose Whether to display message on failure. Defaults to false
 *
 * @return boolean
 */
function plugin_plugs_check_config($verbose = false) {
   if (true) { // Your configuration check
      return true;
   }

   if ($verbose) {
      echo __('Installed / not configured', 'plugs');
   }
   return false;
}
