<?php

namespace P2;

class Calculate
{

    /*
     * Properties
     */

     private $type; # Whether to change or stay

     /*
      * Magic method
      */

    public function __construct($type)
    {
        $this->type = $type;
        dump($this->type);
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
            #echo " ";
            #echo "$choice, $other1, $other2, $correct";
            #echo " ";

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
                #echo "option 1";
                return 1;
            } else {
                #echo "option 2";
                return 0;
            }
        } else {
            if ($other1 == $correct || $other2 == $correct)
            {
                #echo "option 3";
                return 0;
            }
        }
        #echo "option 4";
        return 1;
    }

}

