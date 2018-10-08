<?php
session_start();

$hasErrors = false;

if (isset($_SESSION['results'])) {
    $results = $_SESSION['results'];

    $type = $results['type'];
    $repetitions = $results['repetitions'];
    $guess = $results['guess'];
    $percentage = $results['percentage'];
    $num_correct = $results['num_correct'];
    $response = $results['response'];

    $errors = $results['errors'];
    $hasErrors = $results['hasErrors'];
}

session_unset();

