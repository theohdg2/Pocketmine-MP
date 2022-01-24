<?php

namespace pmmp\assets\php\DocFile;

use assets\php\Manager\DocInterfaces;

class player extends DocInterfaces
{
    public function getDefaultContent(): string
    {
        return "wsh";
    }
}