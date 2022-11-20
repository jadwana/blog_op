<?php

namespace App\Models;

use App\db\DatabaseConnection;
require 'vendor/autoload.php';
class Post
{
    /**
     * post title
     *
     * @var string
     */
    private string $title;
    /**
     * post date modification
     *
     * @var string
     */
    private string $frenchCreationDate;
    /**
     * post content
     *
     * @var string
     */
    private string $content;
    /**
     * post chapo
     *
     * @var string
     */
    private string $chapo;
    
    /**
     * post indentifier
     *
     * @var string
     */
    private string $identifier;
    /**
     * user's nickname
     *
     * @var string
     */
    private string $username;
    
    

    //connect to the database
    public DatabaseConnection $connection;

    //method to retrieve data from a single article according to its id
    public function getPost(string $identifier): Post 
    {
        $statement= $this->connection->getConnection()->prepare(
            "SELECT users.username,posts.post_id, posts.title, posts.content, posts.chapo, 
            DATE_FORMAT(posts.creationDate, '%d%m%Y à %Hh%imin%ss') AS french_creation_date FROM posts 
            INNER JOIN users ON users.user_id=posts.user_id WHERE posts.post_id = ?");

        $statement->execute([$identifier]);

        $row = $statement->fetch();
        $post = new Post();
            $post->getTitle = $row['title'];
            $post->getFrench_creation_date = $row['french_creation_date'];
            $post->getContent = $row['content'];
            $post->getIdentifier = $row['post_id'];
            $post->getChapo = $row['chapo'];
            $post->getUsername = $row['username'];
            
            
        return $post;
    }

    //method to retrieve data from  all articles
    public function getPosts(): array
    {
        $statement= $this->connection->getConnection()->query(
        "SELECT users.username,posts.post_id,posts.title, posts.chapo, 
        DATE_FORMAT(posts.creationDate,'%d%m%Y à %Hh%imin%ss') AS french_creation_date 
        FROM users INNER JOIN posts ON users.user_id=posts.user_id ORDER BY creationDate DESC;");

        

        $posts = [];

        while (($row = $statement->fetch())){
        $post = new Post();
            $post->getTitle = $row['title'];
            $post->getFrench_creation_date = $row['french_creation_date'];
            $post->getIdentifier = $row['post_id'];
            $post->getChapo = $row['chapo'];
            $post->getUsername = $row['username'];

            $posts[] = $post;
        }
        return $posts;
    }

    //method to add data of a new post
    public function addPost(string $title,  string $content, string $chapo, string $user_id)
    {
       
            $statement = $this->connection->getConnection()->prepare(
                'INSERT INTO posts( title, content, chapo, user_id, creationDate) VALUES(?, ?, ?, ?, NOW())'
            );
            $affectedLines = $statement->execute([$title, $content, $chapo, $user_id]);
    
            return($affectedLines > 0);
        
    }

    //method to edit a post
    public function updatePost(string $post_id, string $content, string $title, string $chapo ): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            'UPDATE content, title, chapo, creationDate SET  content=?, title=?, chapo=? creationDate=NOW WHERE post_id=?'
        );
        $affectedLines = $statement->execute([$content, $title, $chapo, $post_id ]);

        return($affectedLines > 0);
    }

    //method to delete a post
    public function deletePost(string $identifier)
    {
        $statement = $this->connection->getConnection()->prepare(
            'DELETE FROM posts WHERE post_id=?'
        );
        $affectedLines = $statement->execute([$identifier]);
        return($affectedLines >0);
    }
    


    /**
     * Get post title
     *
     * @return  string
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set post title
     *
     * @param  string  $title  post title
     *
     * @return  self
     */ 
    public function setTitle(string $title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get post date
     *
     * @return  string
     */ 
    public function getFrenchCreationDate()
    {
        return $this->frenchCreationDate;
    }

    /**
     * Set post date
     *
     * @param  string  $frenchCreationDate  post date
     *
     * @return  self
     */ 
    public function setFrenchCreationDate(string $frenchCreationDate)
    {
        $this->frenchCreationDate = $frenchCreationDate;

        return $this;
    }

    /**
     * Get post content
     *
     * @return  string
     */ 
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set post content
     *
     * @param  string  $content  post content
     *
     * @return  self
     */ 
    public function setContent(string $content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get post chapo
     *
     * @return  string
     */ 
    public function getChapo()
    {
        return $this->chapo;
    }

    /**
     * Set post chapo
     *
     * @param  string  $chapo  post chapo
     *
     * @return  self
     */ 
    public function setChapo(string $chapo)
    {
        $this->chapo = $chapo;

        return $this;
    }

    /**
     * Get post id
     *
     * @return  string
     */ 
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * Set post id
     *
     * @param  string  $identifier  post id
     *
     * @return  self
     */ 
    public function setIdentifier(string $identifier)
    {
        $this->identifier = $identifier;

        return $this;
    }

    /**
     * Get the value of firstname
     */ 
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Get user's nickname
     *
     * @return  string
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set user's nickname
     *
     * @param  string  $username  user's nickname
     *
     * @return  self
     */ 
    public function setUsername(string $username)
    {
        $this->username = $username;

        return $this;
    }
}