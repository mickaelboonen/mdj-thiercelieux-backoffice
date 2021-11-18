<?php 

// For more comments on CRUD functions, see the Card.php

namespace App\Models;

use App\Utils\Database;
use PDO;

class User extends CoreModel {

    /**
     * @var string
     */
    private $email;
    /**
     * @var string
     */
    private $password;
    /**
     * @var string
     */
    private $pseudo;
    /**
     * @var string
     */
    private $avatar;
    /**
     * @var string
     */
    private $role;
    /**
     * @var int
     */
    private $status;

    /**
     * @param int $id
     * @return self
     */
    public static function find($id)
    {
        $pdo = Database::getPDO();
        
        $sql = 'SELECT * FROM `users` WHERE `id` =' . $id;
        
        $pdoStatement = $pdo->query($sql);
        
        $game = $pdoStatement->fetchObject(self::class);
        
        return $game;
    }

    public static function findAll()
    {
        $pdo = Database::getPDO();

        $sql = 'SELECT * FROM `users`';

        $pdoStatement = $pdo->query($sql);

        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        
        return $results;
    }

    /**
     * Method to find an user thanks to their email
     *
     * @param string $email
     * @return self
     */
    public static function findByEmail($email)
    {
        $pdo = Database::getPDO();
        
        $sql = "SELECT * FROM `users`
                WHERE `email` = :email";
                
        $pdoStatement = $pdo->prepare($sql);
        
        $pdoStatement->bindValue(':email', $email);
        
        $pdoStatement->execute();

        // Asking pdoStatement to return the request result as an object from the current class
        $user = $pdoStatement->fetchObject(self::class);

        return $user;
    }

    /**
     * Method to find all users with the given email or pseudo
     *
     * @param string $value
     * @param string $type : name of the column
     * @return array
     */
    public static function findAllByPseudoOrEmail($value, $type)
    {
        $pdo = Database::getPDO();
        
        $sql = "SELECT * FROM `users`
                WHERE $type = :value";
                
        $pdoStatement = $pdo->prepare($sql);
        
        $pdoStatement->bindValue(':value', $value);
        
        $pdoStatement->execute();

        // Asking pdoStatement to return the request result as an array with objects from the current class
        $users = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        return $users;
    }



    /**
     * Method to find an user thanks to their pseudo
     *
     * @param string $pseudo
     * @return self
     */
    public static function findByPseudo($pseudo)
    {
        $pdo = Database::getPDO();
        
        $sql = "SELECT * FROM `users`
                WHERE `pseudo` = :pseudo";
                
        $pdoStatement = $pdo->prepare($sql);
        
        $pdoStatement->bindValue(':pseudo', $pseudo);
        
        $pdoStatement->execute();

        // Asking pdoStatement to return the request result as an object from the current class
        $user = $pdoStatement->fetchObject(self::class);

        return $user;
    }

    /**
     * @return bool
     */
    public function insert()
    {
        $pdo = Database::getPDO();

        $sql = "INSERT INTO `users` (`pseudo`, `email`, `password`,`avatar`, `role`, `status`)
                VALUES (:pseudo, :email, :password, :avatar, :role, :status)
        ";
        
        $pdoStatement = $pdo->prepare($sql);
        
        $pdoStatement->bindParam(':pseudo', $this->pseudo);
        $pdoStatement->bindParam(':email', $this->email);
        $pdoStatement->bindParam(':password', $this->password);
        $pdoStatement->bindParam(':avatar', $this->avatar);
        $pdoStatement->bindParam(':role', $this->role);
        $pdoStatement->bindParam(':status', $this->status, PDO::PARAM_INT);

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
        
        $sql = "UPDATE `users`
            SET 
                `pseudo` = :pseudo,
                `email` = :email,
                `password` = :password,
                `avatar` = :avatar,
                `role` = :role,
                `status` = :status,
                `id` = :id,
                `updated_at` = NOW()
            WHERE id = :id
        ";
        
        $pdoStatement = $pdo->prepare($sql);
        
        $pdoStatement->bindParam(':pseudo', $this->pseudo);
        $pdoStatement->bindParam(':email', $this->email);
        $pdoStatement->bindParam(':password', $this->password);
        $pdoStatement->bindParam(':avatar', $this->avatar);
        $pdoStatement->bindParam(':role', $this->role);
        $pdoStatement->bindParam(':status', $this->status, PDO::PARAM_INT);
        $pdoStatement->bindParam(':id', $this->id, PDO::PARAM_STR);
        
        $result = $pdoStatement->execute();
        
        return $result;
    }

    public function delete()
    {
        $pdo = Database::getPDO();
        
        $sql = "DELETE FROM `users`
                WHERE id = :id";
                
        $pdoStatement = $pdo->prepare($sql);
        
        $pdoStatement->bindParam(':id', $this->id, PDO::PARAM_INT);
        
        $result = $pdoStatement->execute();

        return $result;
    }


    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @param string $email
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

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
     * Set the value of firstname
     *
     * @return  self
     */ 
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of lastname
     */ 
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */ 
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */ 
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of pseudo
     */ 
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set the value of pseudo
     *
     * @return  self
     */ 
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get the value of avatar
     */ 
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set the value of avatar
     *
     * @return  self
     */ 
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }
}