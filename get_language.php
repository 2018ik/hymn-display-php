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

// Retrieve the current number (stored in session)
require __DIR__ . '/util.php';
// Retrieve latest number in log
$log_filename = 'language.log';
$last_line = read_file($log_filename,1)[0];
if ($last_line != "") {
    echo $last_line;
} else {
    echo "all";
}
