<?php

 class User
{
  private $_userId;
  private $_userName;
  private $_password;

  public function getUserId()
   {
      return $this->_userId;
   }

  public function setUserId($userId)
   {
      $this->_userId = $userId;
   }
   
  public function getUserName()
   {
      return $this->_userName;
   }

  public function setUserName($userName)
  {
      $this->_userName = $userName;
  }

   public function getPassword()
   {
      return $this->_password;
   }

   public function setPassword($password)
   {
      $this->_password = $password;
   }


}








?>