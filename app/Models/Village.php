<?php

// For more comments, see the Card.php

namespace App\Models;

use App\Utils\Database;
use PDO;

class Village extends CoreModel
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
    private $token_name;
    /**
     * @var string
     */
    private $token_picture;
    /**
     * @var string
     */
    private $description;
    /**
     * @var string
     */
    private $has_building;
    /**
     * @var int
     */
    private $quantity;
    /**
     * @var int
     */
    private $is_permanent;
    /**
     * @var int
     */

    /**
     * @param int $villageId ID du villageois
     * @return Village
     */
    public static function find($villagerId)
    {
        $pdo = Database::getPDO();
        
        $sql = 'SELECT * FROM `village` WHERE `id` =' . $villagerId;
        
        $pdoStatement = $pdo->query($sql);
        
        $role = $pdoStatement->fetchObject(self::class);
        
        return $role;
    }

    /**
     * @return Village[]
     */
    public static function findAll()
    {
        $pdo = Database::getPDO();

        $sql = 'SELECT * FROM `village`';

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
            INSERT INTO `village` (name, token_name, token_picture, picture, description, has_building, quantity, is_permanent)
            VALUES (:name, :token_name, :token_picture, :picture, :description, :has_building, :quantity, :is_permanent)
        ";
        
        $pdoStatement = $pdo->prepare($sql);
        
        $pdoStatement->bindParam(':name', $this->name, PDO::PARAM_STR);
        $pdoStatement->bindParam(':picture', $this->picture, PDO::PARAM_STR);
        $pdoStatement->bindParam(':token_name', $this->token_name, PDO::PARAM_STR);
        $pdoStatement->bindParam(':token_picture', $this->token_picture, PDO::PARAM_STR);
        $pdoStatement->bindParam(':quantity', $this->quantity, PDO::PARAM_STR);
        $pdoStatement->bindParam(':description', $this->description, PDO::PARAM_STR);
        $pdoStatement->bindParam(':has_building', $this->has_building, PDO::PARAM_STR);
        $pdoStatement->bindParam(':is_permanent', $this->is_permanent, PDO::PARAM_STR);
        
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
        
        $sql = "UPDATE `village`
            SET 
                `name` = :name,
                `picture` = :picture,
                `token_name` = :token_name,
                `token_picture` = :token_picture,
                `description` = :description,
                `has_building` = :has_building,
                `is_permanent` = :is_permanent,
                `quantity` = :quantity,
                `updated_at` = NOW()
            WHERE id = :id
        ";
        
        $pdoStatement = $pdo->prepare($sql);
        
        $pdoStatement->bindParam(':name', $this->name, PDO::PARAM_STR);
        $pdoStatement->bindParam(':picture', $this->picture, PDO::PARAM_STR);
        $pdoStatement->bindParam(':token_name', $this->token_name, PDO::PARAM_STR);
        $pdoStatement->bindParam(':token_picture', $this->token_picture, PDO::PARAM_STR);
        $pdoStatement->bindParam(':quantity', $this->quantity, PDO::PARAM_INT);
        $pdoStatement->bindParam(':description', $this->description, PDO::PARAM_STR);
        $pdoStatement->bindParam(':has_building', $this->has_building, PDO::PARAM_INT);
        $pdoStatement->bindParam(':is_permanent', $this->is_permanent, PDO::PARAM_INT);
        $pdoStatement->bindParam(':id', $this->id, PDO::PARAM_INT);
        
        $result = $pdoStatement->execute();
        
        return $result;
    }

    public function delete()
    {
        $pdo = Database::getPDO();
        
        $sql = "DELETE FROM `village`
                WHERE id = :id";
        
        $pdoStatement = $pdo->prepare($sql);
        
        $pdoStatement->bindParam(':id', $this->id, PDO::PARAM_INT);
        
        $result = $pdoStatement->execute();

        return $result;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
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
     *
     * @return  self
     */ 
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of has_building
     */ 
    public function getHasBuilding()
    {
        return $this->has_building;
    }

    /**
     * Set the value of has_building
     *
     * @return  self
     */ 
    public function setHasBuilding($has_building)
    {
        $this->has_building = $has_building;

        return $this;
    }

    /**
     * Get the value of quantity
     */ 
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set the value of quantity
     *
     * @return  self
     */ 
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get the value of is_permanent
     */ 
    public function getIspermanent()
    {
        return $this->is_permanent;
    }

    /**
     * Set the value of is_permanent
     *
     * @return  self
     */ 
    public function setIsPermanent($is_permanent)
    {
        $this->is_permanent = $is_permanent;

        return $this;
    }

    /**
     * Get the value of token_name
     */ 
    public function getTokenName()
    {
        return $this->token_name;
    }

    /**
     * Set the value of token_name
     *
     * @return  self
     */ 
    public function setTokenName($token_name)
    {
        $this->token_name = $token_name;

        return $this;
    }

    /**
     * Get the value of token_picture
     */ 
    public function getTokenPicture()
    {
        return $this->token_picture;
    }

    /**
     * Set the value of token_picture
     *
     * @return  self
     */ 
    public function setTokenPicture($token_picture)
    {
        $this->token_picture = $token_picture;

        return $this;
    }
}