<?php

class User {
     private $name;
     private $password;
     private $user_id;

     protected function getUser($name) {
          $sql = "SELECT * FROM users WHERE name = '$this->name'";
          $stmt = AppCore::getDB()->query($sql);
          $stmt->execute([$name]);
  
          $results = $stmt->fetchAll();
          return $results;
      }
  
      protected function setUser($name, $password) {
          $sql = "INSERT INTO users(name, password) VALUES(?, ?)";
          $stmt = AppCore::getDB()->prepare($sql);
          $stmt->execute([$name, $password]);
  
      }

      protected function getUserId() {
          $sql="SELECT * FROM users WHERE name='$this->name' AND password='$this->password'";
          $result=AppCore::getDB()->sendQuery($sql);
          if(mysqli_num_rows($result) == 1)
          {
              while($row = $result->fetch_assoc())
              {
                    $this->user_id = $row['user_id'];
              }
          }
      }

}