<?php

namespace assets\php\Manager;

use Closure;

abstract class DocInterfaces{
    
    protected string $content;

    public function __construct()
    {
        $this->setContent($this->getDefaultContent());
    }

    public function getContent():string{
        return $this->content;
    }
    public function setContent(string $content): self{
        $this->content = $content;
        return $this;
    }

    abstract public function getDefaultContent(): string;



    public static function getAutoLoader(): Closure{
        return function(string $classname)
        {
            if (file_exists('./'. (substr($classname,5)).'.php')) {
                require './'. substr($classname,5).'.php';
            }elseif(file_exists("./".$classname.".php")){
                require './'. $classname.'.php';
            }else {
                throw new \Exception("une erreur lors de la tentative d'auto load pour la class ". $classname);
            }
        };
    }


}