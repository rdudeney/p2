<?php

namespace P2;

class Calculate
{

    /*
     * Properties
     */

     private $type; # Parameter confirms whether to change or stay
     private $TOTAL = 6; # Total of all door values

     /*
      * Magic method
      */

    public function __construct($type)
    {
        $this->type = $type;
    }

    public function calculate($input)
    {
        return $this->process($input);
    }

    /**
     * @param $guess
     * @param $repetitions
     * @return string
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

    private function process($input)
    {
        $matching = 0;

        for ($i=0; $i < $input; $i++) {
            $choice = rand(1, 3);
            $other1 = $this->setDoor($choice);
            $other2 = $this->TOTAL - ($choice + $other1);
            $correct = rand(1, 3);

            $matching += $this->match($correct, $other1, $other2);
        }

        return $matching;
    }

    private function setDoor($choice)
    {
        $other1 = 0;
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

