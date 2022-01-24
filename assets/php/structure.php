<?php

namespace assets\php;

spl_autoload_register(DocInterfaces::getAutoLoader());

class structure extends DocInterfaces{
    
    public function getContent(): string
    {
        return $this->content;
    }
    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }

}