<?php
namespace Model;

use Classes\Article;
use Classes\dbConnectionBlog;
use PDO;
use PDOException;

class ArticleModle {

    private $db;

    public function __construct() {
        $this->db = dbConnection::getConnection();
    }
    public function CreatArticle(Article $objectArticle) {
        try {
            $title = $objectArticle->getTitle();
            $content = $objectArticle->getContent();
            $userId = $objectArticle->getUserFk();
            $themeId = $objectArticle->getThemeId();
            $statuts = $objectArticle->getStatus();

            $stmt = $this->db->prepare("INSERT INTO articles (title, content, user_id, theme_id, status)
                                                VALUES (:title, :content, :userId, :themeId, :status)");
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':content',$content);
            $stmt->bindParam(':userID',$userId);
            $stmt->bindParam(':themeId',$themeId);
            $stmt->bindParam(':statuts',$statuts);
            $stmt->execute();
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            echo "Error: problems in the creat article function inside the class ArticleModle " . $e->getMessage();
            return false;
        }
    }
}


