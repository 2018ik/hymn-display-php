<?php
require __DIR__ . '/util.php';
$log_filename = 'numbers.log';

$current_time = gmdate('Y-m-d H:i:s\Z');

if (throttle($log_filename, $current_time)) {
  // throttle
  http_response_code(400);
  echo 'You are submitting too quickly. Please try again after a few seconds.';
} else {
  $number = isset($_POST['number']) ? $_POST['number'] : '';
  $message = "\n$current_time: $number";
  file_put_contents($log_filename, $message, FILE_APPEND);
}
