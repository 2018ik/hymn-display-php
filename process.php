<?php
session_start();

// Check if $_POST['number'] is not empty
if (!empty($_POST['number'])) {
    $number = $_POST['number'];
    $rows = array_map('str_getcsv', file("./data.csv"));
    $row = $rows[$number];
    $_SESSION['picked_numbers'] = implode(',', $row);
    echo "Number submitted successfully!";
} elseif (!empty($_POST['language'])) { // Check if $_POST['language'] is not empty
    $_SESSION['language'] = $_POST['language'];
    echo "Language set successfully!";
} else {
    echo "No data submitted.";
}
