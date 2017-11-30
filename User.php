<?php

  require_once 'db.php'; 

  class User {

    // User states
    const ACTIVE = 0;
    const PENDING = 1;
    const BLOCKED = 2;    

    // User types
    const TYPE_ADMIN = 0;
    const TYPE_MERCHANT = 1;

    public $id;
    public $name;
    public $email;
    public $password;
    public $state;
    public $type;
    public $magazine;
    
    public function save() {

      // hash password
      $this->password = password_hash($this->password, PASSWORD_BCRYPT, ['cost' => 12]);

      // force default state
      $this->state = self::PENDING;
      
      $query = "INSERT INTO users VALUES(NULL, '$this->name', '$this->email', '$this->password', '$this->type', '$this->magazine', '$this->state')";

      return DB::getDb()->exec($query);

    }

    public static function find() {

    }

    public static function get($id) {
      
      $query = "SELECT * FROM users WHERE id = $id";
      $result = DB::getDb()->query($query)->fetch();
      
      $user = new User();
      $user->id = $result['id'];
      $user->name = $result['name'];
      $user->email = $result['email'];
      $user->state = $result['state'];
      $user->magazine = $result['magazine'];
      $user->type = $result['type'];

      return $user;

    }

    public function update() {
      
      if ($this->magazine == "") $this->magazine = NULL;
      
      $query = "UPDATE users SET `name` = '$this->name', `email` = '$this->email', `state` = '$this->state', `magazine` = '$this->magazine', `type` = '$this->type'  WHERE id = $this->id";
      return DB::getDb()->exec($query);

    }

    public static function login($email, $password) {
      
    }

    public static function logout() {

    }

    public function isMerchant() {
      return $profile->type == 1;      
    }

    public function isAdmin() {
      return $profile->type == 2;
    }
    
    public function isState($state) {
      return $profile->state = $state;
    }

  }

?>