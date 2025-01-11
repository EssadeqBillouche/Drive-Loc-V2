<?php

namespace Model;
//require '../BlogClass/dbConnectionBlog.php';
//require '../BlogClass/Tag.php';

use Classes\Tag;
use Classes\Autoloader;
use Classes\dbConnectionBlog;


use PDO;
use PDOException;

class TagModel
{
    private $db;

    public function __construct()
    {
        $this->db = dbConnectionBlog::getConnection();
    }

    public function checkIfTagExists(Tag $tagObject): bool
    {
        $name = strtolower($tagObject->getName()); // Ensure case-insensitivity
        $stmt = $this->db->prepare('SELECT * FROM tags WHERE LOWER(name) = :TagName');
        $stmt->bindParam(':TagName', $name);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    public function addTag(Tag $obj): bool
    {
        if (!$this->checkIfTagExists($obj)) {
            try {
                $name = $obj->getName();
                $stmt = $this->db->prepare('INSERT INTO tags (name) VALUES (:name)');
                $stmt->bindParam(':name', $name);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo "Eroor in add tag - " . $e->getMessage();
                return false;
            }
        }

        return false;
    }
}
$newTag = new Tag('taha');
$addTagModel = new TagModel();
if ($addTagModel->addTag($newTag)) {
    echo "Tag added ";
} else {
    echo "Tag  exists.";
}