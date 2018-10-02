<?php
    require 'Calculate.php';
    require 'helpers.php';

    use P2\Calculate;

    session_start();

    if (!empty($_GET)) {
        #Get the data
        $type = $_GET['type'];
        $repetitions = $_GET['repetitions'];
        $guess = $_GET['guess'];

        #Instantiate new Calculate object

        $calc = new Calculate($type);

        $num_correct = $calc->calculate($repetitions);
        $percentage = ($num_correct/$repetitions) * 100;

        $_SESSION['results'] =
        [
            'type' => $type,
            'repetitions' => $repetitions,
            'guess' => $guess,
            'num_correct' => $num_correct,
            'percentage' => $percentage,
        ];

        dump($_SESSION['results']);
        die();

        header('Location: index.php');
    }


