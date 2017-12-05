<?php

/**
 * @package   ApUtx
 * @author    Roderic Linguri
 * @copyright 2017 Digices LLC
 * @license   MIT
 */

/** Autoload **/

namespace digices\aputx;

require_once(__DIR__.DIRECTORY_SEPARATOR.'etc'.DIRECTORY_SEPARATOR.'config.php');

function load_lib() {
  $path = __DIR__.DIRECTORY_SEPARATOR.'src';
  $di = new \DirectoryIterator($path);
  foreach ($di as $item) {
    $fn = $item->getFilename();
    if (substr($fn, 0, 1) != '.') {
      require_once $path.DIRECTORY_SEPARATOR.$fn;
    }
  }
}

\digices\aputx\load_lib();
