<?php

namespace assets\php;

use Closure;

abstract class DocInterfaces{
    
    protected string $content;
    
    abstract public function getContent():string;
    abstract public function setContent(string $content): self;
    public static function getAutoLoader(): Closure{
        return function(string $classname)
        {
            if (file_exists('./'. $classname.'.php')) {
                require './'. $classname.'.php';
            }else{
                throw new \Exception("une erreur lors de la tentative d'auto load pour la class ". $classname);
            }
        };
    }

}