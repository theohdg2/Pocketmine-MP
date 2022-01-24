<?php

namespace pmmp\assets\php\Manager;

use assets\php\Manager\DocInterfaces;
use pmmp\assets\php\Manager\MenuAcordeon;
use pmmp\assets\php\Chunk;
use pmmp\assets\php\Commands;
use pmmp\assets\php\DataBase_Configuration;
use pmmp\assets\php\DocFile\Entity;
use pmmp\assets\php\DocFile\Events;
use pmmp\assets\php\DocFile\NBT;
use pmmp\assets\php\DocFile\Packet;
use pmmp\assets\php\DocFile\player;
use pmmp\assets\php\DocFile\serveur;
use pmmp\assets\php\DocFile\Skin;
use pmmp\assets\php\DocFile\structure;
use pmmp\assets\php\DocFile\Task;
use pmmp\assets\php\DocFile\Worlds;

class DocFileFactory
{
    private static DocFileFactory $instance;
    private array $allFileRegister = [];
    private bool $isRegister = false;

    public function __construct()
    {
        self::$instance = $this;
        $this->register("Chunk",Chunk::class);
        $this->register("Commands",Commands::class);
        $this->register("DB",DataBase_Configuration::class);
        $this->register("Entity",Entity::class);
        $this->register("Events",Events::class);
        $this->register("NBT",NBT::class);
        $this->register("Packets",Packet::class);
        $this->register("player",player::class);
        $this->register("serveur",serveur::class);
        $this->register("Skin",Skin::class);
        $this->register("structure",structure::class);
        $this->register("Task",Task::class);
        $this->register("Worlds",Worlds::class);

        $this->register("Menu",MenuAcordeon::class);
    }

    /**
     * @return DocFileFactory
     */
    public static function getInstance(): DocFileFactory
    {
        return self::$instance;
    }

    private function register(string $className,string $path){
        $className = ucfirst($className);
        $paths = substr($path,5);
        if(isset($this->allFileRegister[$className])) return;
        if(!file_exists("./".$paths.".php")) return;
        $this->allFileRegister[$className] = $path;
    }

    /**
     * @return array
     */
    public function getAllFileRegister(): array
    {
        return $this->allFileRegister;
    }

    public function getPathDocFile(string $className): string{
        return $this->allFileRegister[$className] ?? throw new \Exception("undefined class ".$className);
    }
    public function getNewInstanceDocFile(string $className): DocInterfaces{
        return new $this->allFileRegister[$className]() ?? throw new \Exception("undefined class ".$className);
    }

}