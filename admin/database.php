<?php

class Database{
    private static $dbHost = "sql112.infinityfree.com";
    private static $dbName = "if0_37468775_burger_code";
    private static $dbUser = "if0_37468775";
    private static $psw = "SWmHA0aDATCJO";
    private static $connection = null;
   
    public static function connect(){
        try{
            self::$connection = new PDO("mysql:host=". self::$dbHost .";dbname=".self::$dbName, self::$dbUser,self::$psw);
            // Définir le mode d'erreur PDO sur Exception
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        }
        catch(PDOException $e){
             // Enregistrez l'erreur dans un journal ou affichez un message convivial à l'utilisateur
             die("Erreur de connexion à la base de données: " . $e->getMessage());
        }
        return self::$connection;
    }

    public static function disconnect(){
        self::$connection = null;
    }
}
Database::connect();
   
?>