<?php
require_once 'models/PostComment.php';
require_once 'dao/UserDaoMysql.php';

class PostCommentDaoMysql implements PostCommentDAO {
    private $pdo;

    public function __construct(PDO $driver) {
        $this->pdo = $driver;
    }

    public function getComments($id_post) {
        $array = [];

        $sql = "SELECT * FROM postcomments WHERE id_post = :id_post";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue('id_post', $id_post);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);

            $userDao = new UserDaoMysql($this->pdo);

            foreach($data as $item) {
                $commentItem = new PostComment();
                $commentItem->id = $item['id'];
                $commentItem->id_post = $item['id_post'];
                $commentItem->id_user = $item['id_user'];
                $commentItem->created_at = $item['created_at'];
                $commentItem->body = $item['body'];
                $commentItem->user = $userDao->findById($item['id_user']);

                $array[] = $commentItem;
            }
        } 

        return $array;
    }
    
    public function addComment(PostComment $pc) {
        $sql = "INSERT INTO postcomments 
        (id_post, id_user, body, created_at) VALUES
        (:id_post, :id_user, :body, :created_at)";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue('id_post', $pc->id_post);
        $sql->bindValue('id_user', $pc->id_user);
        $sql->bindValue('body', $pc->body);
        $sql->bindValue('created_at', $pc->created_at);
        $sql->execute();
    }
    
    public function deleteFromPost($id_post) {
        $sql = "DELETE FROM postcomments WHERE id_post = :id_post";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id_post', $id_post);
        $sql->execute();
    }
}




