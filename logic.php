<?php

/*
 * This is the logic file for index.php; it's job is to check the
 * SESSION for results, and if available, store the results in variables
 * to be displayed in index.php
 */


session_start();

$hasErrors = false;

# Get `results` data from session, if available
if (isset($_SESSION['results'])) {
    $results = $_SESSION['results'];

    extract($results);
}

session_unset();

