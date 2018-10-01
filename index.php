<?php
require 'helpers.php';
?>

<!DOCTYPE html>
<html lang='en'>
<head>

    <title>Monty Hall Game</title>
    <meta charset='utf-8'>

    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'
          rel='stylesheet'
          integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO'
          crossorigin='anonymous'>

</head>
<body>

<h1>Monty Hall Game</h1>

<p>
    Imagine you're at a game show.<br>
    You are given the choice of three doors, one of which has a prize behind it.<br>
    You have already chosen Door 1, but there's a twist.<br>
    The game show host tells you Door 3 does not have a prize behind it and gives you the option to change your choice.<br>
</p>

<form method='GET' action='process.php'>
    <fieldset class='radios'>
        <legend>Do you Change or do you Stay?</legend>
        <ul class='radios'>
            <li><label><input type='radio'
                              name='type'
                              value='change' <?php if (isset($type) and $type == 'change') echo 'checked' ?>>  Change</label>
            <li><label><input type='radio'
                              name='type'
                              value='stay' <?php if (isset($type) and $type == 'stay') echo 'checked' ?>>  Stay</label>
    </fieldset>

    <p>
        What if you made if you are given the same choice 50 or 100 times?<br>
        What percentage of the time do you think you'd make the same choice and choose the prize door?
    </p>

    <label>Choose how many times to repeat this same choice:</label><br>
    <select name='repetitions' id='repetitions'>
        <option value='choose'>Choose one...</option>
        <option value='5' <?php if (isset($repetions) and $repetitions == '5') echo 'selected' ?>>5</option>
        <option value='100' <?php if (isset($repetions) and $repetitions == '100') echo 'selected' ?>>100</option>
        <option value='500' <?php if (isset($repetions) and $repetitions == '500') echo 'selected' ?>>500</option>
        <option value='1000' <?php if (isset($repetions) and $repetitions == '1000') echo 'selected' ?>>1000</option>

    </select>
    <br><br>

    <label>Guess the percentage of times the same choice would be right:</label>
        <br>
        <input type='text' name='guess' value='<?php if(isset($guess)) echo $guess?>'>
    </label>
    <br><br>
    <input type='submit' value='Submit'>
</form>

</body>
</html>