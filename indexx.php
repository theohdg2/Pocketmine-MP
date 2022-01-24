<?php

namespace pmmp;

use pmmp\assets\php\Manager\DocFileFactory;
use assets\php\Manager\DocInterfaces;

require_once "./assets/php/Manager/DocInterfaces.php";
spl_autoload_register(DocInterfaces::getAutoLoader());
(new DocFileFactory());

DocFileFactory::getInstance()->getNewInstanceDocFile("Menu");
echo DocFileFactory::getInstance()->getNewInstanceDocFile("Player")->getContent();

?>

