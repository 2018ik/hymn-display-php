<?php
// remove header
header_remove('ETag');
header_remove('Pragma');
header_remove('Cache-Control');
header_remove('Last-Modified');
header_remove('Expires');

// set header
header('Expires: Thu, 1 Jan 1970 00:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Cache-Control: post-check=0, pre-check=0',false);
header('Pragma: no-cache');

require __DIR__ . '/util.php';
// Retrieve latest number in log
$log_filename = 'numbers.log';
$last_line = read_file($log_filename,1)[0];
if (preg_match("/\d{4}-\d{2}-\d{2}\s\d{2}:\d{2}:\d{2}Z: (\d+)/", $last_line, $matches)) {
    // Extracted number will be in the first capturing group ($matches[1])
    $number = $matches[1];
    $rows = array_map('str_getcsv', file("./data.csv"));
    $row = $rows[$number];
    echo implode(',', $row);
} else {
    echo "null";
}
