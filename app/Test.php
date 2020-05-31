<?php

namespace App;

class Test 
{
    public $data = "Something is happening right now";

    public function __contract($data)
    {
        $this->data = $data;
    }
}