<?php
/**
 * Install hook
 *
 * @return boolean
 */
function plugin_plugs_install() {
   //do some stuff like instanciating databases, default values, ...
   return true;
}

/**
 * Uninstall hook
 *
 * @return boolean
 */
function plugin_plugs_uninstall() {
   //to some stuff, like removing tables, generated files, ...
   return true;
}


function plugs_item_called (CommonDBTM $item) {
   //do everything you want!
   //remember that $item is passed by reference (it is an abject)
   //so changes you will do here will be used by the core.
   if ($item::getType() === Computer::getType()) {
      //we're working with a computer
      Html::displayErrorAndDie("Computer add or updated");
   } elseif ($item::getType() === Phone::getType()) {
      //we're working with a phone
      Html::displayErrorAndDie("Phone add or updated");
   }
}
