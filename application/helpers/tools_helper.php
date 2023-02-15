<?php

/**
 * Pretty var_dump 
 * Possibility to set a title, a background-color and a text color
 */ 
function dd($data, $background="#ffffcc", $color="#004466"){
  echo "  
  <style>
      /* Styling pre tag */
      pre {
          padding:10px 20px;
          white-space: pre-wrap;
          white-space: -moz-pre-wrap;
          white-space: -pre-wrap;
          white-space: -o-pre-wrap;
          word-wrap: break-word;
      }

      /* ===========================
      == To use with XDEBUG 
      =========================== */
      /* Source file */
      pre small:nth-child(1) {
          font-weight: bold;
          font-size: 14px;
          color: #CC0000;
      }
      pre small:nth-child(1)::after {
          content: '';
          position: relative;
          width: 100%;
          height: 20px;
          left: 0;
          display: block;
          clear: both;
      }

      /* Separator */
      pre i::after{
          content: '';
          position: relative;
          width: 100%;
          height: 15px;
          left: 0;
          display: block;
          clear: both;
          border-bottom: 1px solid grey;
      }  
  </style>
  ";

  //=== Content            
  echo "<pre style='background:$background; color:$color; padding:10px 20px; border:2px inset $color'>";
          var_dump($data); 
  echo "</pre>";
  die();
}

function clean($string) {
    $string = str_replace('-', ' ', $string); // Replaces all spaces with hyphens.
    $string = preg_replace('/[^A-Za-z0-9\-]/', ' ', $string); // Removes special chars.

    return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
}

?>