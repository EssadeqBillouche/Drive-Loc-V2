<?php
namespace Classes;

class Article
{
    private $id;
    private $title;
    private $content;
    private $userFk;
    private $themeId;
    private $status;


    public function __construct($title, $content, $userFk, $themeId, $id = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->userFk = $userFk;
        $this->themeId = $themeId;

    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title): void
    {
        $this->title = $title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content): void
    {
        $this->content = $content;
    }

    public function getUserFk()
    {
        return $this->userFk;
    }

    public function setUserFk($userFk): void
    {
        $this->userFk = $userFk;
    }

    public function getThemeId()
    {
        return $this->themeId;
    }

    public function setThemeId($themeId): void
    {
        $this->themeId = $themeId;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status): void
    {
        $this->status = $status;
    }


}









?>