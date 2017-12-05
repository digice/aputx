<?php

/**
 * @package   ApUtx
 * @author    Roderic Linguri
 * @copyright 2017 Digices LLC
 * @license   MIT
 */

namespace aputx;

class SslUrl {

  /** @property string **/
  protected $url;

  /** @property string **/
  protected $text;

  /** @method constructor **/
  public function __construct($url)
  {
    $this->url = $url;
    $ssl = array('verify_peer' => false,'verify_peer_name' => false);
    $options = array('ssl' => $ssl);
    $this->text = file_get_contents ($this->url,false,stream_context_create($options));
  } // ./constructor

  /** @method Get Text
    * @return string
    **/
  public function getText() {
    return $this->text;
  } // ./getText

} // ./SslUrl
