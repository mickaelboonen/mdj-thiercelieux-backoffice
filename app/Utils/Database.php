<?php

namespace App\Utils;

use PDO;

class Database {
    
    /**
     * Objet PDO object that represents the connection to the db
     * @var PDO
     */
    private $dbh;

    /**
     * Propriété statique (liée à la classe) stockant l'unique instance objet
     * @var Database
     */
    private static $_instance;

    /**
     * Private constructor of the class
     */
    private function __construct() {

        /**
         * Parses the config.ini file
         * @return array 
         */ 
        $configData = parse_ini_file(__DIR__.'/../config.ini');
        
        try {
            $this->dbh = new PDO(
                "mysql:host={$configData['DB_HOST']};dbname={$configData['DB_NAME']};charset=utf8",
                $configData['DB_USERNAME'],
                $configData['DB_PASSWORD'],
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING) // Affiche les erreurs SQL à l'écran
            );
        }
        // Catches the error if the "try" fails
        catch(\Exception $exception) {
            echo 'Erreur de connexion...<br>';
            echo $exception->getMessage().'<br>';
            echo '<pre>';
            echo $exception->getTraceAsString();
            echo '</pre>';
            exit;
        }
    }

    /**
     * @return PDO
     */
    public static function getPDO() {
        // Si on n'a pas encore créé la seule instance de la classe
        // If the class instance is empty, meaning not created
        if (empty(self::$_instance)) {
            // Then we create it and store it in the $_instance attribute
            self::$_instance = new Database();
        }
        // if it's already been created, we do nothing

        // And then we return it
        return self::$_instance->dbh;
    }
}
