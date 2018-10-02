<?php
session_start();

if(isset($_SESSION['results']))
{
    $results = $_SESSION['results'];
    $type = $results['type'];
    $repetitions = $results['repetitions'];
    $guess = $results['guess'];
    $percentage = $results['percentage'];
}

session_unset();

