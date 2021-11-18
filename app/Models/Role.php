<?php

// For more comments, see the Card.php

namespace App\Models;

use App\Utils\Database;

use PDO;

class Role extends CoreModel
{

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $picture;

    /**
     * @var string
     */
    private $excerpt;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $side;
    /**
     * @var string
     */
    private $game_id;

    /**
     * @var string
     */
    private $first_night;

    /**
     * @param int $roleId ID du jeu
     * @return Role
     */
    public static function find($roleId)
    {
        $pdo = Database::getPDO();
        
        $sql = 'SELECT * FROM `roles` WHERE `id` =' . $roleId;
        
        $pdoStatement = $pdo->query($sql);
        
        $role = $pdoStatement->fetchObject(self::class);
        
        return $role;
    }

    /**
     * @return Role[]
     */
    public static function findAll()
    {
        $pdo = Database::getPDO();

        $sql = 'SELECT * FROM `roles`';

        $pdoStatement = $pdo->query($sql);

        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        
        return $results;
    }

    /**
     * @return bool
     */
    public function insert()
    {
        $pdo = Database::getPDO();

        $sql = "INSERT INTO `roles` (name, picture, excerpt, description, side, game_id, first_night)
                VALUES (:name, :picture, :excerpt, :description, :side, :game_id, :first_night)
        ";
        
        $pdoStatement = $pdo->prepare($sql);
        
        $pdoStatement->bindParam(':name', $this->name, PDO::PARAM_STR);
        $pdoStatement->bindParam(':picture', $this->picture, PDO::PARAM_STR);
        $pdoStatement->bindParam(':excerpt', $this->excerpt, PDO::PARAM_STR);
        $pdoStatement->bindParam(':description', $this->description, PDO::PARAM_STR);
        $pdoStatement->bindParam(':side', $this->side, PDO::PARAM_STR);
        $pdoStatement->bindParam(':game_id', $this->game_id, PDO::PARAM_STR);
        $pdoStatement->bindParam(':first_night', $this->first_night, PDO::PARAM_STR);
        
        $result = $pdoStatement->execute();
        
        if ($result) {

            $this->id = $pdo->lastInsertId();

            return true;
        }

        return false;
    }

    /**
     * @return bool
     */
    public function update()
    {
        $pdo = Database::getPDO();

        $sql = "UPDATE `roles`
            SET 
                `name` = :name,
                `picture` = :picture,
                `excerpt` = :excerpt,
                `description` = :description,
                `side` = :side,
                `game_id` = :game_id,
                `first_night` = :first_night,
                `updated_at` = NOW()
            WHERE id = :id
        ";

        $pdoStatement = $pdo->prepare($sql);
        
        $pdoStatement->bindParam(':name', $this->name, PDO::PARAM_STR);
        $pdoStatement->bindParam(':picture', $this->picture, PDO::PARAM_STR);
        $pdoStatement->bindParam(':excerpt', $this->excerpt, PDO::PARAM_STR);
        $pdoStatement->bindParam(':description', $this->description, PDO::PARAM_STR);
        $pdoStatement->bindParam(':side', $this->side, PDO::PARAM_STR);
        $pdoStatement->bindParam(':game_id', $this->game_id, PDO::PARAM_STR);
        $pdoStatement->bindParam(':first_night', $this->first_night, PDO::PARAM_STR);
        $pdoStatement->bindParam(':id', $this->id, PDO::PARAM_STR);
        
        $result = $pdoStatement->execute();
        
        return $result;
    }

    public function delete()
    {
        $pdo = Database::getPDO();
        
        $sql = "DELETE FROM `roles`
                WHERE id = :id";

        $pdoStatement = $pdo->prepare($sql);
        
        $pdoStatement->bindParam(':id', $this->id, PDO::PARAM_INT);
        
        $result = $pdoStatement->execute();

        return $result;
    }

    /**
     * Get the value of picture
     *
     * @return  string
     */ 
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     *
     * @param  string  $picture
     *
     * @return  self
     */ 
    public function setPicture(string $picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get the value of excerpt
     *
     * @return  string
     */ 
    public function getExcerpt()
    {
        return $this->excerpt;
    }

    /**
     * Set the value of excerpt
     *
     * @param  string  $excerpt
     *
     * @return  self
     */ 
    public function setExcerpt(string $excerpt)
    {
        $this->excerpt = $excerpt;

        return $this;
    }

    /**
     * Get the value of side
     *
     * @return  string
     */ 
    public function getSide()
    {
        return $this->side;
    }

    /**
     * Set the value of side
     *
     * @param  string  $side
     *
     * @return  self
     */ 
    public function setSide(string $side)
    {
        $this->side = $side;

        return $this;
    }

    /**
     * Get the value of first_night
     *
     * @return  string
     */ 
    public function getFirstNight()
    {
        return $this->first_night;
    }

    /**
     * Set the value of first_night
     *
     * @param  string  $first_night
     *
     * @return  self
     */ 
    public function setFirstNight(string $first_night)
    {
        $this->first_night = $first_night;

        return $this;
    }

    
    /**
     * Get the value of name
     *
     * @return  string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param  string  $name
     *
     * @return  self
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }


    /**
     * Get the value of description
     *
     * @return  string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @param  string  $description
     *
     * @return  self
     */
    public function setDescription(string $description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of game_id
     *
     * @return  string
     */ 
    public function getGameId()
    {
        return $this->game_id;
    }

    /**
     * Set the value of game_id
     *
     * @param  string  $game_id
     *
     * @return  self
     */ 
    public function setGameId(string $game_id)
    {
        $this->game_id = $game_id;

        return $this;
    }
}