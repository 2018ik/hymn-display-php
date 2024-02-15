<?php
// Retrieve the current number (stored in session)
session_start();
$number = isset($_SESSION['picked_numbers']) ? $_SESSION['picked_numbers'] : "null";
echo $number;
