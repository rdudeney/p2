<?php

namespace P2;

class Calculate
{

    /*
     * Properties
     */

     private $type; # Parameter confirms whether to change or stay
     private $TOTAL = 6; # Total constant of all door values

     /*
      * @param $type
      *
      * Magic Method constructs the class object, assigning type parameter
      */

    public function __construct($type)
    {
        $this->type = $type;
    }

    /**
     * @param $input
     * @return integer
     *
     * Method initiates the private processing function based on the user input of repetitions and
     * returns the number prize doors depending on choice of type, either change or stay.
     */

    public function calculate($input)
    {
        return $this->process($input);
    }

    /**
     * @param $guess
     * @param $num_correct
     * @return string
     *
     * Method compares the user guess to the results and assigns response to be passed to
     * user
     */
    public function respond($guess, $num_correct)
    {
        $difference = abs($num_correct - $guess);

        if ($difference < 10)
        {
            $response = "Great guess!";
            return $response;
        } elseif ($difference >= 10 and $difference < 50 ){
            $response = "Very close!";
            return $response;
        }

        $response = "You'll get it next time!";
        return $response;
    }

    /**
     * @param $input
     * @return integer
     *
     * Method initiates helper methods setDoor and match in order to calculate the number of
     * prize doors.
     */

    private function process($input)
    {
        $matching = 0;          // reset number of prize doors

        # Repeat door selection and confirm prize door
        for ($i=0; $i < $input; $i++) {
            $choice = rand(1, 3);       // assign door 1 value at random
            $other1 = $this->setDoor($choice);  // assign door 2 value at random
            $other2 = $this->TOTAL - ($choice + $other1);   // assign door 3 value
            $correct = rand(1, 3);  // set the prize door value at random

            # confirm if user choice to stay or change returns prize door.
            $matching += $this->match($correct, $other1, $other2);
        }

        # return number of prize doors
        return $matching;
    }

    /**
     * @param $choice
     * @return integer
     *
     * Method assigns number to door 2, ensuring different from door 1
     */
    private function setDoor($choice)
    {
        $other1 = 0;

        # repeat assignment until door 2 different from door 1
        while ($other1 == 0)
        {
            $other1 = rand(1, 3);
            if($other1 == $choice)
            {
                $other1 = 0;
            }
        }
        return $other1;
    }

    /**
     * @param $correct
     * @param $other1
     * @param $other2
     * @return integer
     *
     * Method confirms if type selection, either to stay or change, returns prize door or not. If
     * prize door, return integer value, otherwise return zero.
     */

    private function match($correct, $other1, $other2)
    {
        if ($this->type == 'change')
        {
            if ($other1 == $correct || $other2 == $correct)
            {
                return 1;
            } else {
                return 0;
            }
        } else {
            if ($other1 == $correct || $other2 == $correct)
            {
                return 0;
            }
        }
        return 1;
    }

}

