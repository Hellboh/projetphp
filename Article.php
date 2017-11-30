<?php
// for dali
require_once 'db.php';
//$db = DB::getDb();
  class Article{
    public $id;
    public $category_id;
    public $name;

    public function save() {
          //  $query = "INSERT INTO articles VALUES( '$this->category_id', '$this->name')";
           $query=" INSERT INTO articles (id, category_id, name) VALUES (NULL, '$this->category_id', '$this->name')";
            return DB::getDb()->exec($query);

    }



    public static function get($id) {
      
      $query = "SELECT * FROM articles WHERE id = $id";
      $result = DB::getDb()->query($query)->fetch();
      
      $article = new Article();
      $article->id = $result['id'];
      $article->category_id = $result['category_id'];
      $article->name = $result['name'];

      return $article;

    }


  }
?>
