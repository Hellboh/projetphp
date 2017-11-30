<?php

  // for dimeth
  
    require_once 'db.php';
  
    // $db = DB::getDb();
    class UserArticle {
  
      public $id;
      public $user_id ; 
      public $article_id ;
      public $quantity;
      public $price;
      public $prix_prom;

      public function save() {
       // global $db;
       $query="INSERT INTO `users_articles` (`id`, `article_id`, `user_id`, `quantity`, `price`, `prix_prom`) VALUES (NULL, '$this->article_id', '$this->user_id', '$this->quantity', '$this->price', '$this->prix_prom'); ";

       return DB::$db->exec($query);
     
      }
  
      public static function find($user_id) {
        return DB::$db->query("SELECT * FROM users_articles WHERE `users_articles`.`id` = $user_id");
        
      }
      public static function get($id){
        $query = "SELECT * FROM users_articles WHERE id = $id";
        $result = DB::getDb()->query($query)->fetch();
        
        $user = new UserArticle();
        $user->id = $result['id'];
        $user->user_id = $result['user_id'];
        $user->article_id = $result['article_id'];
        $user->quantity = $result['quantity'];
        $user->price = $result['price'];
        $user->prix_prom = $result['prix_prom'];
  
        return $user;
      }
      public function update(){

        $sql = "UPDATE `users_articles` SET `article_id` = '$this->article_id', `user_id` = '$this->user_id', `quantity` = '$this->quantity', `price` = '$this->price', `prix_prom` = '$this->prix_prom' WHERE `users_articles`.`id` = $this->id ";
        DB::$db->exec($sql);        
      }
      public static function delete($id){
        $sql ="DELETE FROM `users_articles` WHERE `users_articles`.`id` = $id ";
        DB::$db->exec($sql);        
        echo "<script>alert('deleted');</script>";        

      }

    }
  

?>