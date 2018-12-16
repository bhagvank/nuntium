<?php
  
    require_once("DataObject.php");
    require_once("TravelAdvisory.php");

   class TravelAdvisoryPDO extends DataObject
   {

     public function getMaxTravelAdvisoryId()
	 {
	 	$connection = parent::connect();
	 	$maxTravelAdvisoryIdSql = "SELECT MAX(TRAVELADVISORYID) AS MAXTRAVELADVISORYID FROM traveladvisory";
		 $rows = $connection->query($maxTravelAdvisoryIdSql);
		 
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
     public function  insertTravelAdvisory( $travelAdvisory)
      {
      	 $connection = parent::connect();
         $insertsql = "INSERT INTO traveladvisory (TRAVELADVISORYID,TRAVELADVISORYSOURCE,TRAVELADVISORYLINK,TRAVELADVISORYLINKTYPE) VALUES (:traveladvisoryid,:traveladvisorysourcename,:traveladvisorysourcelink,:traveladvisorysourcelinktype)";

         try
         {
         $statement = $connection->prepare($insertsql);
         $statement->bindValue(":traveladvisoryid",$this->getMaxTravelAdvisoryId()+1,PDO::PARAM_INT);
         $statement->bindValue(":traveladvisorysourcename",$travelAdvisory->getTravelAdvisorySourceName(),PDO::PARAM_STR);
         $statement->bindValue(":traveladvisorysourcelink",$travelAdvisory->getTravelAdvisorySourceLink(),PDO::PARAM_STR);
		 $statement->bindValue(":traveladvisorysourcelinktype",$travelAdvisory->getTravelAdvisorySourceLinkType(),PDO::PARAM_STR);

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

      public function updateTravelAdvisory($travelAdvisory)
       {
       	 $connection = parent::connect();
	     $updatesql = "UPDATE traveladvisory SET TRAVELADVISORYSOURCE=:traveladvisorysourcename, TRAVELADVISORYLINK=:traveladvisorysourcelink,TRAVELADVISORYLINKTYPE=:traveladvisorysourcelinktype  WHERE TRAVELADVISORYID=:traveladvisoryid";
	
	     try
	     { 
		   $statement = $connection->prepare($updatesql);
		   
           $statement->bindValue(":traveladvisorysourcename",$travelAdvisory->getTravelAdvisorySourceName(),PDO::PARAM_STR);
           $statement->bindValue(":traveladvisorysourcelink",$travelAdvisory->getTravelAdvisorySourceLink(),PDO::PARAM_STR);
		   $statement->bindValue(":traveladvisorysourcelinktype",$travelAdvisory->getTravelAdvisorySourceLinkType(),PDO::PARAM_STR);
		   $statement->bindValue(":traveladvisoryid",$travelAdvisory->getTravelAdvisoryId(),PDO::PARAM_INT);
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

        public function deleteTravelAdvisory($travelAdvisory)
        {
          $connection = parent::connect();	
	      $deletesql = "DELETE FROM traveladvisory WHERE TRAVELADVISORYID=:traveladvisoryid";
	
	      try
	       {
		     $statement = $connection->prepare($deletesql);
		     $statement->bindValue(":traveladvisoryid",$travelAdvisory->getTravelAdvisoryId(),PDO::PARAM_INT);
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

        public function getTravelAdvisory($travelAdvisoryId)
		{
			$connection = parent::connect();
	         $selectSQL = "SELECT * FROM traveladvisory WHERE TRAVELADVISORYID=:traveladvisoryid";
			 
			 $travelAdvisory = "";
			 try
			 {
			 $statement = $connection->prepare($selectSQL);
		     $statement->bindValue(":traveladvisoryid",$travelAdvisoryId,PDO::PARAM_INT);
		     
	         $statement->execute();
			 $row = $statement->fetch();
              $travelAdvisory = new TravelAdvisory();
	        
	           
	            $travelAdvisory->setTravelAdvisoryId($row[0]);
	            $travelAdvisory->setTravelAdvisorySourceName($row[1]);
	            $travelAdvisory->setTravelAdvisorySourceLink($row[2]);
				$travelAdvisory->setTravelAdvisorySourceLinkType($row[3]);
	
	         parent::disconnect($connection);
			 }
			catch(PDOException $exception)
	        {
		        echo "exception Message" . $exception->getMessage();
		        parent::disconnect($connection);
		        print_r($connection->errorInfo());
	        }
	         return $travelAdvisory;
			
			
		}
        public function getTravelAdvisories()
         {
         	 $connection = parent::connect();
	         $selectSQL = "SELECT * FROM traveladvisory";
	         $rows = $connection->query($selectSQL);
	         $traveladvisories = array();
	         foreach($rows as $row)
             {
	            $traveladvisory = new traveladvisory();
	        
	           
	            $traveladvisory->setTravelAdvisoryId($row[0]);
	            $traveladvisory->setTravelAdvisorySourceName($row[1]);
	            $traveladvisory->setTravelAdvisorySourceLink($row[2]);
				$traveladvisory->setTravelAdvisorySourceLinkType($row[3]);
	
	            $traveladvisories[] = $traveladvisory;
             }
	         parent::disconnect($connection);
	         return $traveladvisories;
         }
    }


?>