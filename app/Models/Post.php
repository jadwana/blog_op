<?php

namespace App\Models;

use App\db\DatabaseConnection;
use Exception;

/**
 * Post class
 */
class Post
{
    /**
     * Post title
     *
     * @var string
     */

    private string $title;
    /**
     * Post date modification
     *
     * @var string
     */

    private string $frenchCreationDate;
    /**
     * Post content
     *
     * @var string
     */

    private string $content;
    /**
     * Post chapo
     *
     * @var string
     */

    private string $chapo;

    /**
     * Post indentifier
     *
     * @var string
     */

    private int $identifier;
    /**
     * User's nickname
     *
     * @var string
     */

    private string $username;

    

    //Connect to the database
    public DatabaseConnection $connection;

    /**
     * Method to retrieve data from a single article according to its id
     *
     * @param int $identifier
     *
     * @return Post
     */

    
    public function getPost(int $identifier): Post
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT users.username,posts.post_id, posts.title, posts.content, 
            posts.chapo, DATE_FORMAT(posts.creationDate, '%d-%m-%Y à %Hh%imin%ss')
             AS french_creation_date FROM posts INNER JOIN users ON 
             users.user_id=posts.user_id WHERE posts.post_id = ?"
        );

        $statement->execute([$identifier]);
        $row = $statement->fetch();
        $post = new Post();
        if ($post->getIdentifier = $row['post_id']){
            $post->getTitle = $row['title'];
            $post->getFrench_creation_date = $row['french_creation_date'];
            $post->getContent = $row['content'];
            $post->getIdentifier = $row['post_id'];
            $post->getChapo = $row['chapo'];
            $post->getUsername = $row['username'];
        return $post;
        } else {
            throw new Exception('Cette page n\'existe pas');
        }
            
    }


    /**
     * Method to retrieve data from  all articles
     *
     * @return array
     */


    public function getPosts(): array
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT users.username,posts.post_id,posts.title, posts.chapo, 
            DATE_FORMAT(posts.creationDate,'%d-%m-%Y à %Hh%imin%ss') 
            AS french_creation_date FROM users INNER JOIN posts ON 
            users.user_id=posts.user_id ORDER BY creationDate DESC;"
        );

        $posts = [];

        while (($row = $statement->fetch())) {
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


    /**
     * Method to add data of a new post
     *
     * @param string $title
     * @param string $content
     * @param string $chapo
     * @param int    $user_id
     *
     * @return boolean
     */


    public function addPost(string $title, string $content, string $chapo,
        int $user_id
    ) {
       
            $statement = $this->connection->getConnection()->prepare(
                'INSERT INTO posts( title, content, chapo, user_id, creationDate) 
                VALUES(?, ?, ?, ?, NOW())'
            );
            $affectedLines = $statement->execute(
                [$title, $content, $chapo,
                $user_id]
            );
    
            return($affectedLines > 0);
        
    }


    /**
     * Method to update data of a post
     *
     * @param int    $identifier
     * @param string $content
     * @param string $title
     * @param string $chapo
     * 
     * @return void
     */


    public function updatePost(int $identifier, string $content, string $title,
        string $chapo
    ) {
        $statement = $this->connection->getConnection()->prepare(
            'UPDATE posts SET  content=?, title=?, chapo=?, creationDate=NOW() 
            WHERE post_id=?'
        );
       
        $affectedLines = $statement->execute(
            [$content, $title, $chapo,
            $identifier]
        );
       
        return($affectedLines > 0);
        
    }


    /**
     * Method to delete data of a post
     *
     * @param int $identifier
     * 
     * @return void
     */


    public function deletePost(int $identifier)
    {
        $statement = $this->connection->getConnection()->prepare(
            'DELETE FROM posts WHERE post_id=?'
        );
        $affectedLines = $statement->execute([$identifier]);
        return($affectedLines > 0);
    }
    

    /**
     * Get post title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set post title
     *
     * @param string $title post title
     *
     * @return self
     */
    public function setTitle(string $title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get post date
     *
     * @return string
     */
    public function getFrenchCreationDate()
    {
        return $this->frenchCreationDate;
    }

    /**
     * Set post date
     *
     * @param string $frenchCreationDate post date
     *
     * @return self
     */ 
    public function setFrenchCreationDate(string $frenchCreationDate)
    {
        $this->frenchCreationDate = $frenchCreationDate;

        return $this;
    }

    /**
     * Get post content
     *
     * @return string
     */ 
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set post content
     *
     * @param string $content post content
     *
     * @return self
     */ 
    public function setContent(string $content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get post chapo
     *
     * @return string
     */ 
    public function getChapo()
    {
        return $this->chapo;
    }

    /**
     * Set post chapo
     *
     * @param string $chapo post chapo
     *
     * @return self
     */ 
    public function setChapo(string $chapo)
    {
        $this->chapo = $chapo;

        return $this;
    }

    /**
     * Get post id
     *
     * @return int
     */ 
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * Set post id
     *
     * @param int $identifier post id
     *
     * @return self
     */ 
    public function setIdentifier(string $identifier)
    {
        $this->identifier = $identifier;

        return $this;
    }

    /**
     * Get the value of firstname
     * 
     * @return string
     */ 
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Get user's nickname
     *
     * @return string
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set user's nickname
     *
     * @param string $username user's nickname
     *
     * @return self
     */ 
    public function setUsername(string $username)
    {
        $this->username = $username;

        return $this;
    }
}
