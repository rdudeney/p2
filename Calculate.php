<?php

namespace P2;

class Calculate
{

    /*
     * Properties
     */

     private $type; # Parameter confirms whether to change or stay

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

    private function process($input)
    {
        $matching = 0;

        for ($i=0; $i < $input; $i++) {
            $total = 6;
            $choice = rand(1, 3);
            $other1 = $this->setDoor($choice);
            $other2 = $total - ($choice + $other1);
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

