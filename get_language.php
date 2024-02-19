<?php
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
