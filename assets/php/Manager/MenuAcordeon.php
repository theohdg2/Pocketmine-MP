<?php

namespace pmmp\assets\php\Manager;

use assets\php\Manager\DocInterfaces;

class MenuAcordeon extends DocInterfaces
{

    public function getDefaultContent(): string
    {
        return "yo c'est moi le menu de gauche";
    }
}