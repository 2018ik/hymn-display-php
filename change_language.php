<?php
$log_filename = 'language.log';
$language = isset($_POST['language']) ? $_POST['language'] : '';
file_put_contents($log_filename, $language);
