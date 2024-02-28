<?php
require __DIR__ . '/util.php';
$log_filename = 'numbers.log';
$last_line = read_file($log_filename,1)[0];
if (preg_match("/\d{4}-\d{2}-\d{2}\s\d{2}:\d{2}:\d{2}Z: (\d+)/", $last_line, $matches)) {
  file_put_contents($log_filename, "\n-", FILE_APPEND);
}