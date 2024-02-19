<?php
	function read_file($file, $lines){
    $handle = fopen($file, "r");
    $linecounter = $lines;
    $pos = -2;
    $beginning = false;
    $text = array();
    while ($linecounter > 0) {
      $t = " ";
      while ($t != "\n") {
      if(fseek($handle, $pos, SEEK_END) == -1) {
        $beginning = true; break; 
      }
      $t = fgetc($handle);
      $pos --;
      }
      $linecounter --;
      if($beginning) rewind($handle);
      $text[$lines-$linecounter-1] = fgets($handle);
      if($beginning) break;
    }
    fclose ($handle);
    return array_reverse($text); // array_reverse is optional: you can also just return the $text array which consists of the file's lines. 
  }
  function throttle($log_filename, $current_time) {
    $timeout = 1;
    $last_line = read_file($log_filename,1)[0];
    if (preg_match('/^(\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2})Z/', $last_line, $matches)) {
      $last_timestamp = strtotime($matches[0]);
    } else {
      $last_timestamp = null;
    }
    return $last_timestamp && abs(strtotime($current_time) - $last_timestamp) <= $timeout;
  }
