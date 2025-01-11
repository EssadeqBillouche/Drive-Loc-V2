<?php
namespace Model;
require_once __DIR__ . '/../../vendor/autoload.php';
use Classes\Tag;
use Model\TagModel;


$newTag = new Tag('khalid');

$addTagModel = new TagModel();

if ($addTagModel->addTag($newTag)) {
    echo "Tag added successfully!";
} else {
    echo "Tag already exists.";
}



?>