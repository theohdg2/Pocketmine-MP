<?php

namespace pmmp\assets\php\DocFile;


use assets\php\Manager\DocInterfaces;

class Packet extends DocInterfaces
{
    public function getDefaultContent(): string
    {
        return "ça va et toi bg ?";
    }
}