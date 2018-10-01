<?php
    require 'Calculate.php';
    require 'helpers.php';

    use P2\Calculate;

    session_start();

    if (!empty($_GET)) {
        #Get the data
        $repetitions = $_GET['repetitions'];
        $type = $_GET['type'];
        $guess = $_GET['guess'];

        #Instantiate new Calculate object

        $calc = new Calculate($type);

        echo ($calc->calculate($repetitions));
        die();

        $percentage = ($calc->calculate($repetitions))/$repetitions;

        $_SESSION['results'] =
        [
            'percentage' => $percentage,
            'type' => $type,
            'repetitions' => $repetitions,
            'guess' => $guess
        ];

        header('Location: answerpage.php');
    }


