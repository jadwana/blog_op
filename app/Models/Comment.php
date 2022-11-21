<?php

namespace App\Models;

use App\db\DatabaseConnection;
require 'vendor/autoload.php';

class Comment
{
    /**
     * username of the editor of the comment
     *
     * @var string
     */
    private string $username;
    /**
     * comment date modification
     *
     * @var string
     */
    private string $frenchCreationDate;
    /**
     * detail of the comment
     *
     * @var string
     */
    private string $comment;
    /**
     * comment id
     *
     * @var string
     */
    private string $identifier;
    /**
     * post id
     *
     * @var string
     */
    private string $post;

    //connect to the data base
    public DatabaseConnection $connection;

    //method to retrieve comments associated with post id
    public function getComments(string $post): array
    {
    
        $statement= $this->connection->getConnection()->prepare(
            "SELECT comments.comment_id, comments.comment, DATE_FORMAT(comments.commentDate, '%d%m%Y à %Hh%imin%ss') AS 
        french_creation_date, comments.post_id, users.username FROM comments INNER JOIN users ON comments.user_id = users.user_id 
        WHERE post_id = ? AND comments.validation = 'y' ORDER BY comments.commentDate DESC");

        $statement->execute([$post]);

        $comments = [];
        while (($row = $statement->fetch())){
            $comment = new Comment();
            $comment->getUsername = $row['username'];
            $comment->getFrenchCreationDate = $row['french_creation_date'];
            $comment->getComment = $row['comment'];
            $comment->getIdentifier = $row['comment_id'];
            $comment->getPost =$row['post_id'];

            $comments[] = $comment;
    }
    
    return $comments;
    } 

    //method to retrieve a single comment based on its id
    public function getOneComment(string $identifier): ?Comment
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT comments.comment_id, comments.comment, DATE_FORMAT(comments.commentDate, '%d%m%Y à %Hh%imin%ss') AS 
            french_creation_date, comments.post_id, users.username FROM comments INNER JOIN users ON comments.user_id = users.user_id
             WHERE comments.comment_id = ?"
        );
        $statement->execute([$identifier]);

        $row = $statement->fetch();
        if ($row === false) {
            return null;
        }

        $comment = new Comment();
        $comment->getIdentifier = $row['comment_id'];
        $comment->getUsername = $row['username'];
        $comment->getFrenchCreationDate = $row['french_creation_date'];
        $comment->getComment = $row['comment'];
        $comment->getPost = $row['post_id'];

        return $comment;
    }

    //method to add a new comment
    public function createComment(string $post, string $user_id, string $comment): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            'INSERT INTO comments(post_id, user_id, comment, commentDate) VALUES(?, ?, ?, NOW())'
        );
        $affectedLines = $statement->execute([$post, $user_id, $comment]);

        return($affectedLines > 0);
    }

    //method to update a comment
    public function updateComment(string $identifier, string $comment): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            'UPDATE comments SET  comment=?  WHERE comment_id=?'
        );
        $affectedLines = $statement->execute([$comment, $identifier]);

        return($affectedLines > 0);
    }



    /**
     * Get the value of frenchCreationDate
     */ 
    public function getFrenchCreationDate()
    {
        return $this->frenchCreationDate;
    }

    /**
     * Set the value of frenchCreationDate
     *
     * @return  self
     */ 
    public function setFrenchCreationDate($frenchCreationDate)
    {
        $this->frenchCreationDate = $frenchCreationDate;

        return $this;
    }

    /**
     * Get the value of comment
     */ 
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set the value of comment
     *
     * @return  self
     */ 
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get the value of identifier
     */ 
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * Set the value of identifier
     *
     * @return  self
     */ 
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;

        return $this;
    }

    /**
     * Get the value of post
     */ 
    public function getPost()
    {
        return $this->post;
    }

    /**
     * Set the value of post
     *
     * @return  self
     */ 
    public function setPost($post)
    {
        $this->post = $post;

        return $this;
    }

    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }
}
