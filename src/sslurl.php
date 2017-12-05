<?php

namespace aputx;

class SslUrl {

  protected $url;

  protected $text;

  public function __construct($url)
  {
    $this->url = $url;
    $ssl = array('verify_peer' => false,'verify_peer_name' => false);
    $options = array('ssl' => $ssl);
    $this->text = file_get_contents ($this->url,false,stream_context_create($options));
  } // ./Constructor

  public function getText() {
    return $this->text;
  } // ./getText

} // ./SslUrl
