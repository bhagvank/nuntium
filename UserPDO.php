<?php

    require_once("DataObject.php");
    require_once("User.php");

   class UserPDO extends DataObject
   {

     public function getMaxUserId()
	 {
	 	$connection = parent::connect();
	 	$maxUserIdSql = "SELECT MAX(USERID) AS MAXUSERID FROM USER";
		 $rows = $connection->query($maxUserIdSql);
		 
		 $maxuserid=0;
		 
		 if(count($rows) > 0)
		 {
		  foreach($rows as $row)
		   {
		     $maxuserid = $row[0];	
		   }
		 }
	
	     parent::disconnect($connection);	 
		 return $maxuserid;
	 }
     public function  insertUser( $user)
      {
      	 $connection = parent::connect();
         $insertsql = "INSERT INTO USER (userid,username,password) VALUES (:userid,:username,:password)";

         try
         {
         $statement = $connection->prepare($insertsql);
         $statement->bindValue(":userid",$this->getMaxUserId()+1,PDO::PARAM_INT);
         $statement->bindValue(":username",$user->getUserName(),PDO::PARAM_STR);
         $statement->bindValue(":password",$user->getPassword(),PDO::PARAM_STR);

         $statement->execute();
		 parent::disconnect($connection);
         }
         catch(PDOException $exception)
          {
	        echo "exception Message" . $exception->getMessage();
	        parent::disconnect($connection); 
	        print_r($connection->errorInfo());
          }
        
      }

      public function updateUser($user)
       {
       	 $connection = parent::connect();
	     $updatesql = "UPDATE USER SET USERNAME=:username, PASSWORD=:password WHERE USERID=:userid";
	
	     try
	     { 
		   $statement = $connection->prepare($updatesql);
		   $statement->bindValue(":userid",$user->getUserId(), PDO::PARAM_INT);
		   $statement->bindValue(":username",$user->getUserName(),PDO::PARAM_STR);
		   $statement->bindValue(":password",$user->getPassword(),PDO::PARAM_STR);
		
		   $statement->execute(); 
		   parent::disconnect($connection);
		
		 }
		catch(PDOException $exception)
		{
			 echo "exception Message" . $exception->getMessage();
			 parent::disconnect($connection);
			 print_r($connection->errorInfo());
		}
	
       }

        public function deleteUser($user)
        {
          $connection = parent::connect();	
	      $deletesql = "DELETE FROM USER WHERE USERID=:userid";
	
	      try
	       {
		     $statement = $connection->prepare($deletesql);
		     $statement->bindValue(":userid",$user->getUserId(),PDO::PARAM_INT);
		     $statement->execute();
		     parent::disconnect($connection);
	       }
	       catch(PDOException $exception)
	        {
		        echo "exception Message" . $exception->getMessage();
		        parent::disconnect($connection);
		        print_r($connection->errorInfo());
	        }
	
        }
        
		public function checkUserExists($loggedInUser)
		{
	         $connection = parent::connect();
	         $selectSQL = "SELECT * FROM USER WHERE USERNAME=:username";
			 
			 $user = "";
			 try
			 {
			 $statement = $connection->prepare($selectSQL);
		     $statement->bindValue(":username",$loggedInUser->getUserName(),PDO::PARAM_INT);
		     
	         $statement->execute();
			 $row = $statement->fetch();
              $user = new User();
	        
	           
	            $user->setUserId($row[0]);
	            $user->setUserName($row[1]);
	            $user->setPassword($row[2]);
	
	         parent::disconnect($connection);
			 }
			catch(PDOException $exception)
	        {
		        echo "exception Message" . $exception->getMessage();
		        parent::disconnect($connection);
		        print_r($connection->errorInfo());
	        }
	        
	        $loggedIn = FALSE;
			
			if(strcmp($loggedInUser->getUserName(),$user->getUserName() ) == 0)
			{
				
				if(strcmp($loggedInUser->getPassword(),$user->getPassword()) == 0)
				 {
				 	
					$loggedIn = TRUE;
				 }
				
			}
	         return $loggedIn;
			
		}

        public function getUser($userid)
		{
			$connection = parent::connect();
	         $selectSQL = "SELECT * FROM USER WHERE USERID=:userid";
			 
			 $user = "";
			 try
			 {
			 $statement = $connection->prepare($selectSQL);
		     $statement->bindValue(":userid",$userid,PDO::PARAM_INT);
		     
	         $statement->execute();
			 $row = $statement->fetch();
              $user = new User();
	        
	           
	            $user->setUserId($row[0]);
	            $user->setUserName($row[1]);
	            $user->setPassword($row[2]);
	
	         parent::disconnect($connection);
			 }
			catch(PDOException $exception)
	        {
		        echo "exception Message" . $exception->getMessage();
		        parent::disconnect($connection);
		        print_r($connection->errorInfo());
	        }
	         return $user;
			
			
		}
        public function getUsers()
         {
         	 $connection = parent::connect();
	         $selectSQL = "SELECT * FROM USER";
	         $rows = $connection->query($selectSQL);
	         $users = array();
	         foreach($rows as $row)
             {
	            $user = new User();
	            $user->setUserId($row[0]);
	            $user->setUserName($row[1]);
	            $user->setPassword($row[2]);
	
	            $users[] = $user;
             }
	         parent::disconnect($connection);
	         return $users;
         }
    }


?>