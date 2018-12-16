<?php
  
    require_once("DataObject.php");
    require_once("EventPDO.php");

   class EventPDO extends DataObject
   {

     public function getMaxEventId()
	 {
	 	$connection = parent::connect();
	 	$maxEventIdSql = "SELECT MAX(EVENTID) AS EVENTID FROM event";
		 $rows = $connection->query($maxEventIdSql);
		 
		 $maxeventid=0;
		 
		 if(count($rows) > 0)
		 {
		  foreach($rows as $row)
		   {
		     $maxeventid = $row[0];	
		   }
		 }
	
	     parent::disconnect($connection);	 
		 return $maxeventid;
	 }
     public function  insertEvent( $event)
      {
      	 $connection = parent::connect();
         $insertsql = "INSERT INTO event (EVENTID,EVENTTYPE,EVENTSOURCENAME,EVENTSOURCELINK,EVENTSOURCELINKTYPE) VALUES (:eventid,:eventtype,:eventsourcename,:eventsourcelink,:eventsourcelinktype)";

         try
         {
         $statement = $connection->prepare($insertsql);
         $statement->bindValue(":eventid",$this->getMaxEventId()+1,PDO::PARAM_INT);
		 $statement->bindValue(":eventtype",$event->getEventType(),PDO::PARAM_STR);
         $statement->bindValue(":eventsourcename",$event->getEventSourceName(),PDO::PARAM_STR);
         $statement->bindValue(":eventsourcelink",$event->getEventSourceLink(),PDO::PARAM_STR);
		 $statement->bindValue(":eventsourcelinktype",$event->getEventSourceLinkType(),PDO::PARAM_STR);

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

      public function updateEvent($event)
       {
       	 $connection = parent::connect();
	     $updatesql = "UPDATE event SET EVENTTYPE=:eventtype,EVENTSOURCENAME=:eventsourcename, EVENTSOURCELINK=:eventsourcelink,EVENTSOURCELINKTYPE=:eventsourcelinktype  WHERE EVENTID=:eventid";
	
	     try
	     { 
		   $statement = $connection->prepare($updatesql);
		   $statement->bindValue(":eventtype",$event->getEventType(),PDO::PARAM_STR);
		   $statement->bindValue(":eventsourcename",$event->getEventSourceName(),PDO::PARAM_STR);
		   $statement->bindValue(":eventsourcelink",$event->getEventSourceLink(),PDO::PARAM_STR);
		   $statement->bindValue(":eventsourcelinktype",$event->getEventSourceLinkType(),PDO::PARAM_STR);
		   $statement->bindValue(":eventid",$event->getEventId(), PDO::PARAM_INT);
		   
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

        public function deleteEvent($event)
        {
          $connection = parent::connect();	
	      $deletesql = "DELETE FROM event WHERE EVENTID=:eventid";
	
	      try
	       {
		     $statement = $connection->prepare($deletesql);
		     $statement->bindValue(":eventid",$event->getEventId(),PDO::PARAM_INT);
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

        public function getEvent($eventId)
		{
			$connection = parent::connect();
	         $selectSQL = "SELECT * FROM event WHERE EVENTID=:eventid";
			 
			 $event = "";
			 try
			 {
			 $statement = $connection->prepare($selectSQL);
		     $statement->bindValue(":eventid",$eventId,PDO::PARAM_INT);
		     
	         $statement->execute();
			 $row = $statement->fetch();
              $event = new Event();
	        
	           
	            $event->setEventId($row[0]);
				$event->setEventType($row[1]);
	            $event->setEventSourceName($row[2]);
	            $event->setEventSourceLink($row[3]);
				$event->setEventSourceLinkType($row[4]);
	
	         parent::disconnect($connection);
			 }
			catch(PDOException $exception)
	        {
		        echo "exception Message" . $exception->getMessage();
		        parent::disconnect($connection);
		        print_r($connection->errorInfo());
	        }
	         return $event;
			
			
		}
        public function getEvents()
         {
         	 $connection = parent::connect();
	         $selectSQL = "SELECT * FROM event";
	         $rows = $connection->query($selectSQL);
	         $events = array();
	         foreach($rows as $row)
             {
	          $event = new Event();
	        
	           
	            $event->setEventId($row[0]);
				$event->setEventType($row[1]);
	            $event->setEventSourceName($row[2]);
	            $event->setEventSourceLink($row[3]);
				$event->setEventSourceLinkType($row[4]);
				
				$events[] = $event;
             }
	         parent::disconnect($connection);
	         return $events;
         }
    }


?>