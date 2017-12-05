<?php

/*** Extracts text in a table view into multi-dimensional array ***/

namespace aputx;

class HtmTbl {

  protected $rows;

  public function __construct($path)
  {
    $this->rows = array();
    $text = file_get_contents($path);
    $rows = explode('<tr',$text);
    // trim everything before the table
    array_shift($rows);
    foreach ($rows as $row) {
      $row_to_append = array();
      $cols = explode('<td',$row);
      // trim the first element
      array_shift($cols);
      foreach ($cols as $col) {
        // start the extraction at the first occurrence of '>'
        $stp = strpos($col,'>') + 1;
        // end of extraction is at '</td'
        $end = strpos($col,'</td');
        $len = $end - $stp;
        // $txt = strip_tags(substr($col,$stp,$len));
        $txt = substr($col,$stp,$len);
        array_push($row_to_append,$txt);
      } // ./foreach cell
      array_push($this->rows,$row_to_append);
    } // ./foreach row
  }

  public function rows()
  {
    return $this->rows;
  }

  public function json()
  {
    return json_encode($this->rows);
  }

}
