<?php
require_once 'models/PostLike.php';

class PostLikeDaoMysql implements PostLikeDAO {
    private $pdo;

    public function __construct(PDO $driver) {
        $this->pdo = $driver;
    }


    public function getLikeCount($id_post) {
        $sql = "SELECT COUNT(*) as c FROM postlikes WHERE id_post = :id_post";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue('id_post', $id_post);
        $sql->execute();

        $data = $sql->fetch();
        return $data['c'];
    }

    public function isLiked($id_post, $id_user) {
        $sql = "SELECT * FROM postlikes WHERE id_post = :id_post AND id_user = :id_user";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue('id_post', $id_post);
        $sql->bindValue('id_user', $id_user);
        $sql->execute();

        if($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function likeToggle($id_post, $id_user) {
        if($this->isLiked($id_post, $id_user)) {
            // delete
            $sql = "DELETE FROM postlikes WHERE id_post = :id_post AND id_user = :id_user";
            $sql = $this->pdo->prepare($sql);
        } else {
            // insere
            $sql = "INSERT INTO postlikes (id_post, id_user, created_at) VALUES (:id_post, :id_user, NOW())";
            $sql = $this->pdo->prepare($sql);
        }
        
        $sql->bindValue('id_post', $id_post);
        $sql->bindValue('id_user', $id_user);
        $sql->execute();
    }
}




