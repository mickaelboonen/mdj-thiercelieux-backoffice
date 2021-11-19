<?php

namespace App\Models;

use App\Utils\Database;
use PDO;

class Card extends CoreModel
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
    private $description;

    /**
     * @var string
     */
    private $phase;

    /**
     * Method to get a New Moon Card given its id
     *
     * @param int $cardId 
     * @return Card
     */
    public static function find($cardId)
    {
        // pdo object that represents the connection to the DB
        $pdo = Database::getPDO();

        // SQL request
        $sql = 'SELECT * FROM `new_moon` WHERE `id` =' . $cardId;

        // Preparing and executing the request (query to read)
        $pdoStatement = $pdo->query($sql);

        // We get the result and instantiate a new object of the current Class
        $card = $pdoStatement->fetchObject(self::class);

        // We return the object
        return $card;
    }

    /**
     * Method to get all New Moon Cards
     *
     * @return Card[]
     */
    public static function findAll()
    {
        // pdo object that represents the connection to the DB
        $pdo = Database::getPDO();
        // SQL request
        $sql = 'SELECT * FROM `new_moon`';
        // Preparing and executing the request (query to read)
        $pdoStatement = $pdo->query($sql);
        // We get the result and instantiate a new object of the current Class
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        // We return the object
        return $results;
    }


    /**
     * Method to add a new entry in the DB
     * In order to work, the current object needs to have all properties set. 
     * One property = One db column
     *
     * @return bool
     */
    public function insert()
    {
        // pdo object that represents the connection to the DB
        $pdo = Database::getPDO();

        // SQL request
        // We use tokens instead of values from the form in this request to protect ourselves from SQL injunctions
        $sql = "
            INSERT INTO `new_moon` (name, picture, description, phase)
            VALUES (:name, :picture, :description, :phase)
        ";

        // We prepare the request so as pdo can read it after when we execute it
        $pdoStatement = $pdo->prepare($sql);

        // We use bindParam() to bing the values to the tokens in the request
        // We add more security by forcing the values type
        // https://www.php.net/manual/fr/pdostatement.bindparam.php
        $pdoStatement->bindParam(':name', $this->name, PDO::PARAM_STR);
        $pdoStatement->bindParam(':picture', $this->picture, PDO::PARAM_STR);
        $pdoStatement->bindParam(':description', $this->description, PDO::PARAM_STR);
        $pdoStatement->bindParam(':phase', $this->phase, PDO::PARAM_STR);

        /**
         * Once the request is prepared, we execute it.
         * @return bool
         */
        $result = $pdoStatement->execute();


        // If the request worked, 
        if ($result) {
            // We get the auto-incremented ID
            $this->id = $pdo->lastInsertId();
            // Then return true
            return true;
        }
        // If it didn't, we return false
        return false;
    }


    /**
     * Method to update an entry of the Card table 
     *
     * @return bool
     */
    public function update()
    {
        // pdo object that represents the connection to the DB
        $pdo = Database::getPDO();
        
        // SQL request
        // We use tokens instead of values from the form in this request to protect ourselves from SQL injunctions
        $sql = "UPDATE `new_moon`
            SET 
                `name` = :name,
                `picture` = :picture,
                `description` = :description,
                `phase` = :phase,
                `updated_at` = NOW()
            WHERE id = :id
        ";

        // We prepare the request so as pdo can read it after when we execute it
        $pdoStatement = $pdo->prepare($sql);

        // We use bindParam() to bing the values to the tokens in the request
        // We add more security by forcing the values type
        // https://www.php.net/manual/fr/pdostatement.bindparam.php
        $pdoStatement->bindParam(':name', $this->name, PDO::PARAM_STR);
        $pdoStatement->bindParam(':picture', $this->picture, PDO::PARAM_STR);
        $pdoStatement->bindParam(':description', $this->description, PDO::PARAM_STR);
        $pdoStatement->bindParam(':phase', $this->phase, PDO::PARAM_STR);
        $pdoStatement->bindParam(':id', $this->id, PDO::PARAM_STR);


        /**
         * Once the request is prepared, we execute it.
         * @return bool
         */
        $result = $pdoStatement->execute();

        // $result if either true if the request worked or false if it didn't
        return $result;
    }

    /**
     * Method to delete an entry in the Card table
     *
     * @return bool
     */
    public function delete()
    {
        // pdo object that represents the connection to the DB
        $pdo = Database::getPDO();

        // SQL request
        // We use tokens instead of values from the form in this request to protect ourselves from SQL injunctions
        $sql = "DELETE FROM `new_moon`
                WHERE id = :id";

        // We prepare the request so as pdo can read it after when we execute it
        $pdoStatement = $pdo->prepare($sql);

        // We use bindParam() to bing the values to the tokens in the request
        // We add more security by forcing the values type
        // https://www.php.net/manual/fr/pdostatement.bindparam.php
        $pdoStatement->bindParam(':id', $this->id, PDO::PARAM_INT);

        /**
         * Once the request is prepared, we execute it.
         * @return bool
         */
        $result = $pdoStatement->execute();
        
        // $result if either true if the request worked or false if it didn't
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
     * Get the value of phase
     */ 
    public function getPhase()
    {
        return $this->phase;
    }

    /**
     * Set the value of phase
     *
     * @return  self
     */ 
    public function setPhase($phase)
    {
        $this->phase = $phase;

        return $this;
    }
}