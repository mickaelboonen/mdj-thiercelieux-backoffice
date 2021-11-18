<?php

namespace App\Models;

// Classe mère de tous les Models
// On centralise ici toutes les propriétés et méthodes utiles pour TOUS les Models

// CoreModel a pour unique but d'etre héritée par des classes enfant. On veut donc éviter de pouvoir l'instancier. On utilise le mot clé "abstract" pour rendre cette classe "abstraite" c'est à dire impossible à instancier.
abstract class CoreModel {
    /**
     * @var int
     */
    protected $id;
    /**
     * @var string
     */
    protected $created_at;
    /**
     * @var string
     */
    protected $updated_at;


    /**
     * Get the value of id
     *
     * @return  int
     */ 
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * Get the value of created_at
     *
     * @return  string
     */ 
    public function getCreatedAt() : string
    {
        return $this->created_at;
    }

    /**
     * Get the value of updated_at
     *
     * @return  string
     */ 
    public function getUpdatedAt() : string
    {
        return $this->updated_at;
    }


    public function save() {
        // If current object has an ID, then we update
        if($this->id > 0) {
            $this->update();
        } 
        // Else, it means it has no entry in the DB, so we create it
        else {
            $this->insert();
        }
    }

    // Abstract means mandatory
    // Those abstract functions below are to be found in CoreModel's children
    abstract public static function find($id);
    abstract public static function findAll();
    abstract public function insert();
    abstract public function update();
    abstract public function delete();


}
