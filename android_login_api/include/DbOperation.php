<?php

  class DbOperation{
    private $con;

    function __construct(){
      require_once dirname(__FILE__).'/DbConnect.php';
      $db = new DbConnect();

      $this->con = $db->connect();
    }

    function createUser($username, $pass, $realname, $phone){
      $password = md5($pass);
      $stmt = $this ->con->prepare("INSERT INTO `民宿主帳號` (`id`, `username`, `password`, `realname`, `phone`) VALUES
      (NULL, ?, ?, ?, ?);");
      $stmt->bind_param("sss", $username, $password, $realname, $phone);

      if($stmt->execute()){
        return true;
      }else{
        return false;
      }

    }
  }
?>
