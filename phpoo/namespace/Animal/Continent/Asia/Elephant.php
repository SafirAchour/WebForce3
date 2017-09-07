<?php

namespace Animal\Continent\Asia;
use Animal\Elephant as abstractElephant;

class Elephant extends AbstractElephant
{
    public function getEarsSize(){
        return 'small';
    }
    public function beseen() {
        $tourist = new \tourist();
        $tourist->watchElephant('asia');
    }
            
}
