<?php
class Connexion{

    private static $USER = 'root';
    private static $DSN = 'mysql:host=localhost;dbname=sae';
    private static $PASS = '';
    public static $database;

    public function __construct(){
        self::connect();
    }

    public static function connect(){
        try{
            self::$database = new PDO(self::$DSN, self::$USER, self::$PASS);
        } catch(PDOException $error){
            print_r("Error : ".$error->getMessage());
        }
    }
}
?>