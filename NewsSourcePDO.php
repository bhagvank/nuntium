<?php
  
    require_once("DataObject.php");
    require_once("NewsSource.php");

   class NewsSourcePDO extends DataObject
   {

     public function getMaxNewsSourceId()
	 {
	 	$connection = parent::connect();
	 	$maxNewsSourceIdSql = "SELECT MAX(NEWSSOURCEID) AS MAXNEWSSOURCEID FROM newssource";
		 $rows = $connection->query($maxNewsSourceIdSql);
		 
		 $maxnewssourceid=0;
		 
		 if(count($rows) > 0)
		 {
		  foreach($rows as $row)
		   {
		     $maxnewssourceid = $row[0];	
		   }
		 }
	
	     parent::disconnect($connection);	 
		 return $maxnewssourceid;
	 }
     public function  insertNewsSource( $newsSource)
      {
      	 $connection = parent::connect();
         $insertsql = "INSERT INTO newssource (NEWSSOURCEID,NEWSSOURCENAME,NEWSSOURCELINK,NEWSSOURCELINKTYPE) VALUES (:newssourceid,:newssourcename,:newssourcelink,:newssourcelinktype)";

         try
         {
         $statement = $connection->prepare($insertsql);
         $statement->bindValue(":newssourceid",$this->getMaxNewsSourceId()+1,PDO::PARAM_INT);
         $statement->bindValue(":newssourcename",$newsSource->getNewsSourceName(),PDO::PARAM_STR);
         $statement->bindValue(":newssourcelink",$newsSource->getNewsSourceLink(),PDO::PARAM_STR);
		 $statement->bindValue(":newssourcelinktype",$newsSource->getNewsSourceLinkType(),PDO::PARAM_STR);

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

      public function updateNewsSource($newsSource)
       {
       	 $connection = parent::connect();
	     $updatesql = "UPDATE newssource SET NEWSSOURCEID=:newssourceid, NEWSSOURCENAME=:newssourcename, NEWSSOURCELINK=:newssourcelink,NEWSSOURCELINKTYPE=:newssourcelinktype  WHERE NEWSSOURCEID=:newssourceid";
	
	     try
	     { 
		   $statement = $connection->prepare($updatesql);
		   $statement->bindValue(":newssourceid",$newsSource->getNewsSourceId(), PDO::PARAM_INT);
		   $statement->bindValue(":newssourcename",$newsSource->getNewsSourceName(),PDO::PARAM_STR);
		   $statement->bindValue(":newssourcelink",$newsSource->getNewsSourceLink(),PDO::PARAM_STR);
		   $statement->bindValue(":newssourcelinktype",$newsSource->getNewsSourceLinkType(),PDO::PARAM_STR);
		
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

        public function deleteNewsSource($newsSource)
        {
          $connection = parent::connect();	
	      $deletesql = "DELETE FROM newssource WHERE NEWSSOURCEID=:newssourceid";
	
	      try
	       {
		     $statement = $connection->prepare($deletesql);
		     $statement->bindValue(":newssourceid",$newsSource->getNewsSourceId(),PDO::PARAM_INT);
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

        public function getNewsSource($newsSourceId)
		{
			$connection = parent::connect();
	         $selectSQL = "SELECT * FROM newssource WHERE NEWSSOURCEID=:newssourceid";
			 
			 $newsSource = "";
			 try
			 {
			 $statement = $connection->prepare($selectSQL);
		     $statement->bindValue(":newssourceid",$newsSourceId,PDO::PARAM_INT);
		     
	         $statement->execute();
			 $row = $statement->fetch();
              $newsSource = new NewsSource();
	        
	           
	            $newsSource->setNewsSourceId($row[0]);
	            $newsSource->setNewsSourceName($row[1]);
	            $newsSource->setNewsSourceLink($row[2]);
				$newsSource->setNewsSourceLinkType($row[3]);
	
	         parent::disconnect($connection);
			 }
			catch(PDOException $exception)
	        {
		        echo "exception Message" . $exception->getMessage();
		        parent::disconnect($connection);
		        print_r($connection->errorInfo());
	        }
	         return $newsSource;
			
			
		}
        public function getNewsSources()
         {
         	 $connection = parent::connect();
	         $selectSQL = "SELECT * FROM newssource";
	         $rows = $connection->query($selectSQL);
	         $newssources = array();
	         foreach($rows as $row)
             {
	            $newsSource = new NewsSource();
	        
	           
	            $newsSource->setNewsSourceId($row[0]);
	            $newsSource->setNewsSourceName($row[1]);
	            $newsSource->setNewsSourceLink($row[2]);
				$newsSource->setNewsSourceLinkType($row[3]);
	
	            $newssources[] = $newsSource;
             }
	         parent::disconnect($connection);
	         return $newssources;
         }
    }


?>