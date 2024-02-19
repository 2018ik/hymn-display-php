<?php
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
