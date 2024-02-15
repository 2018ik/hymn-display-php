<?php
// Retrieve the current number (stored in session)
session_start();
$language = isset($_SESSION['language']) ? $_SESSION['language'] : "null";
echo $language;
