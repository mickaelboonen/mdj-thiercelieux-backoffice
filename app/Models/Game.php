<?php

// For more comments, see the Card.php

namespace App\Models;

use App\Utils\Database;

use PDO;

class Game extends CoreModel {

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
    private $description;
    /**
     * @var string
     */
    private $hash;
    /**
     * @var string
     */
    private $icon;
    /**
     * @var string
     */
    private $specificity;

    /**
     * @param int $gameId ID du jeu
     * @return Game
     */
    public static function find($gameId)
    {
        $pdo = Database::getPDO();
        
        $sql = 'SELECT * FROM `games` WHERE `id` =' . $gameId;
        
        $pdoStatement = $pdo->query($sql);
        
        $game = $pdoStatement->fetchObject(self::class);
        
        return $game;
    }

    /**
     * @return Game
     */
    public static function findAll()
    {
        $pdo = Database::getPDO();

        $sql = 'SELECT * FROM `games`';

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
        
        $sql = "
            INSERT INTO `games` (name, hash, description, picture, icon, specificity)
            VALUES (:name, :hash, :description, :picture, :icon, :specificity)
        ";
        
        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindParam(':name', $this->name, PDO::PARAM_STR);
        $pdoStatement->bindParam(':hash', $this->hash, PDO::PARAM_STR);
        $pdoStatement->bindParam(':description', $this->description, PDO::PARAM_STR);
        $pdoStatement->bindParam(':picture', $this->picture, PDO::PARAM_STR);
        $pdoStatement->bindParam(':icon', $this->icon, PDO::PARAM_STR);
        $pdoStatement->bindParam(':specificity', $this->specificity, PDO::PARAM_STR);

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
        
        $sql = "UPDATE `games`
            SET 
                `name` = :name,
                `hash` = :hash,
                `description` = :description,
                `picture` = :picture,
                `icon` = :icon,
                `specificity` = :specificity,
                `updated_at` = NOW()
            WHERE id = :id
        ";

        $pdoStatement = $pdo->prepare($sql);
        
        $pdoStatement->bindParam(':name', $this->name, PDO::PARAM_STR);
        $pdoStatement->bindParam(':hash', $this->hash, PDO::PARAM_STR);
        $pdoStatement->bindParam(':description', $this->description, PDO::PARAM_STR);
        $pdoStatement->bindParam(':picture', $this->picture, PDO::PARAM_STR);
        $pdoStatement->bindParam(':icon', $this->icon, PDO::PARAM_STR);
        $pdoStatement->bindParam(':id', $this->id, PDO::PARAM_STR);
        $pdoStatement->bindParam(':specificity', $this->specificity, PDO::PARAM_STR);
        
        $result = $pdoStatement->execute();
        
        return $result;
    }

    public function delete()
    {
        $pdo = Database::getPDO();
        
        $sql = "DELETE FROM `games`
                WHERE id = :id";
        
        $pdoStatement = $pdo->prepare($sql);
        
        $pdoStatement->bindParam(':id', $this->id, PDO::PARAM_INT);
        
        $result = $pdoStatement->execute();

        return $result;
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
     */ 
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * Get the value of subtitle
     */ 
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * Set the value of subtitle
     */ 
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
    }

    /**
     * Get the value of picture
     */ 
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     */ 
    public function setPicture($picture)
    {
        $this->picture = $picture;
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
     * Get the value of icon
     *
     * @return  string
     */ 
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Set the value of icon
     *
     * @param  string  $icon
     *
     * @return  self
     */ 
    public function setIcon(string $icon)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Get the value of hash
     *
     * @return  string
     */ 
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * Set the value of hash
     *
     * @param  string  $hash
     *
     * @return  self
     */ 
    public function setHash(string $hash)
    {
        $this->hash = $hash;

        return $this;
    }

    /**
     * Get the value of specificity
     *
     * @return  string
     */ 
    public function getSpecificity()
    {
        return $this->specificity;
    }

    /**
     * Set the value of specificity
     *
     * @param  string  $specificity
     *
     * @return  self
     */ 
    public function setSpecificity(string $specificity)
    {
        $this->specificity = $specificity;

        return $this;
    }
}
