<?php

namespace Classes;

class Comment
{
    private $id;
    private $content;
    private $userId;
    private $articleId;

    public function __construct($id = null, $content, $userId, $articleId)
    {
        $this->id = $id;
        $this->articleId = $articleId;
        $this->content = $content;
        $this->userId = $userId;
    }


    public function __set($property)
    {
        $this->$property = $property;
    }
    public function __get($property)
    {
        return $this->$property;
    }
}