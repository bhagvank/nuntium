<?php
  
    require_once("DataObject.php");
    require_once("Sentiment.php");

   class SentimentPDO extends DataObject
   {

     public function getMaxSentimentId()
	 {
	 	$connection = parent::connect();
	 	$maxSentimentIdSql = "SELECT MAX(SENTIMENTID) AS MAXSENTIMENTID FROM sentiment";
		 $rows = $connection->query($maxSentimentIdSql);
		 
		 $maxsentimentid=0;
		 
		 if(count($rows) > 0)
		 {
		  foreach($rows as $row)
		   {
		     $maxsentimentid = $row[0];	
		   }
		 }
	
	     parent::disconnect($connection);	 
		 return $maxsentimentid;
	 }
     public function  insertSentiment( $sentiment)
      {
      	 $connection = parent::connect();
         $insertsql = "INSERT INTO sentiment (SENTIMENTID,SENTIMENTSOURCE,SENTIMENTSOURCELINK,SENTIMENTSOURCELINKTYPE) VALUES (:sentimentid,:sentimentsourcename,:sentimentsourcelink,:sentimentsourcelinktype)";

         try
         {
         $statement = $connection->prepare($insertsql);
         $statement->bindValue(":sentimentid",$this->getMaxSentimentId()+1,PDO::PARAM_INT);
         $statement->bindValue(":sentimentsourcename",$sentiment->getSentimentSourceName(),PDO::PARAM_STR);
         $statement->bindValue(":sentimentsourcelink",$sentiment->getSentimentSourceLink(),PDO::PARAM_STR);
		 $statement->bindValue(":sentimentsourcelinktype",$sentiment->getSentimentSourceLinkType(),PDO::PARAM_STR);

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

      public function updateSentiment($sentiment)
       {
       	 $connection = parent::connect();
	     $updatesql = "UPDATE sentiment SET SENTIMENTSOURCE=:sentimentsourcename, SENTIMENTSOURCELINK=:sentimentsourcelink,SENTIMENTSOURCELINKTYPE=:sentimentsourcelinktype  WHERE SENTIMENTID=:sentimentsourceid";
	
	     try
	     { 
		   $statement = $connection->prepare($updatesql);
		   $statement->bindValue(":sentimentsourceid",$sentiment->getSentimentId(), PDO::PARAM_INT);
		   $statement->bindValue(":sentimentsourcename",$sentiment->getSentimentSourceName(),PDO::PARAM_STR);
		   $statement->bindValue(":sentimentsourcelink",$sentiment->getSentimentSourceLink(),PDO::PARAM_STR);
		   $statement->bindValue(":sentimentsourcelinktype",$sentiment->getSentimentSourceLinkType(),PDO::PARAM_STR);
		
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

        public function deleteSentiment($sentiment)
        {
          $connection = parent::connect();	
	      $deletesql = "DELETE FROM sentiment WHERE SENTIMENTID=:sentimentid";
	
	      try
	       {
		     $statement = $connection->prepare($deletesql);
		     $statement->bindValue(":sentimentid",$sentiment->getSentimentId(),PDO::PARAM_INT);
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

        public function getSentiment($sentimentId)
		{
			$connection = parent::connect();
	         $selectSQL = "SELECT * FROM sentiment WHERE SENTIMENTID=:sentimentid";
			 
			 $sentiment = "";
			 try
			 {
			 $statement = $connection->prepare($selectSQL);
		     $statement->bindValue(":sentimentid",$sentimentId,PDO::PARAM_INT);
		     
	         $statement->execute();
			 $row = $statement->fetch();
              $sentiment = new Sentiment();
	        
	           
	            $sentiment->setSentimentId($row[0]);
	            $sentiment->setSentimentSourceName($row[1]);
	            $sentiment->setSentimentSourceLink($row[2]);
				$sentiment->setSentimentSourceLinkType($row[3]);
	
	         parent::disconnect($connection);
			 }
			catch(PDOException $exception)
	        {
		        echo "exception Message" . $exception->getMessage();
		        parent::disconnect($connection);
		        print_r($connection->errorInfo());
	        }
	         return $sentiment;
			
			
		}
        public function getSentiments()
         {
         	 $connection = parent::connect();
	         $selectSQL = "SELECT * FROM sentiment";
	         $rows = $connection->query($selectSQL);
	         $sentiments = array();
	         foreach($rows as $row)
             {
	            $sentiment = new Sentiment();
	        
	            $sentiment->setSentimentId($row[0]);
	            $sentiment->setSentimentSourceName($row[1]);
	            $sentiment->setSentimentSourceLink($row[2]);
				$sentiment->setSentimentSourceLinkType($row[3]);
	
	            $sentiments[] = $sentiment;
             }
	         parent::disconnect($connection);
	         return $sentiments;
         }
    }


?>