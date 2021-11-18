<?php

// For more comments, see the Card.php

namespace App\Models;

use App\Utils\Database;

use PDO;

class Rule extends CoreModel
{

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $hash;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $specificity_id;

    /**
     * @param int $ruleId ID du jeu
     * @return Rule
     */
    public static function find($ruleId)
    {
        $pdo = Database::getPDO();
        
        $sql = 'SELECT * FROM `rules` WHERE `id` =' . $ruleId;
        
        $pdoStatement = $pdo->query($sql);
        
        $rule = $pdoStatement->fetchObject(self::class);
        
        return $rule;
    }

    /**
     * @return Specificity[]
     */
    public static function findAll()
    {
        $pdo = Database::getPDO();

        $sql = 'SELECT * FROM `rules`';

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
            INSERT INTO `rules` (name, hash, description, specificity_id)
            VALUES (:name, :hash, :description, :specificity_id)
        ";
        
        $pdoStatement = $pdo->prepare($sql);
        
        $pdoStatement->bindParam(':name', $this->name, PDO::PARAM_STR);
        $pdoStatement->bindParam(':hash', $this->hash, PDO::PARAM_STR);
        $pdoStatement->bindParam(':description', $this->description, PDO::PARAM_STR);
        $pdoStatement->bindParam(':specificity_id', $this->specificity_id, PDO::PARAM_STR);
        
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
        
        $sql = "UPDATE `rules`
            SET 
                `name` = :name,
                `hash` = :hash,
                `description` = :description,
                `specificity_id` = :specificity_id,
                `updated_at` = NOW()
            WHERE id = :id
        ";
        
        $pdoStatement = $pdo->prepare($sql);
        
        $pdoStatement->bindParam(':name', $this->name, PDO::PARAM_STR);
        $pdoStatement->bindParam(':hash', $this->hash, PDO::PARAM_STR);
        $pdoStatement->bindParam(':description', $this->description, PDO::PARAM_STR);
        $pdoStatement->bindParam(':specificity_id', $this->specificity_id, PDO::PARAM_STR);
        $pdoStatement->bindParam(':id', $this->id, PDO::PARAM_STR);
        
        $result = $pdoStatement->execute();
        
        return $result;
    }

    public function delete()
    {
        $pdo = Database::getPDO();
        
        $sql = "DELETE FROM `rules`
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
     *
     * @return  self
     */
    public function setName(string $name)
    {
        $this->name = $name;

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
     * Get the value of specificity_id
     *
     * @return  string
     */ 
    public function getSpecificityId()
    {
        return $this->specificity_id;
    }

    /**
     * Set the value of specificity_id
     *
     * @param  string  $specificity_id
     *
     * @return  self
     */ 
    public function setSpecificityId(string $specificity_id)
    {
        $this->specificity_id = $specificity_id;

        return $this;
    }
}