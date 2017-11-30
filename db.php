<?php 
  
  class DB {
    public static $db;

    public static function connect() {
      try {
        
        self::$db = new PDO( 'mysql:host=localhost;dbname=commerce', 'root', '' );
        self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        self::$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
      } catch(PDOException $e) {   
        
        die( $e->getMessage() );
    
      }
    }

    public static function getDb() {
      return self::$db;
    }
    
  }
   

  // initialize database connection
  DB::connect();

?>