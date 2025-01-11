<?php
namespace Classes;

class Tag
{
    private $tagId;
    private $Name;

    public function __construct($tagName, $tagId = null)
    {
        $this->tagId = $tagId;
        $this->Name = $tagName;
    }
    public function set($tagName){
        $this->Name = $tagName;
    }
    public function getName(){
        return $this->Name;
    }

}
