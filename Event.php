<?php

 class Event
{
  private $_eventId;
  private $_eventSourceName;
  private $_eventSourceLink;
  private $_eventSourceLinkType;
  private $_eventType;
  
  public function getEventId()
   {
      return $this->_eventId;
   }

  public function setEventId($eventId)
   {
      $this->_eventId = $eventId;
   }
   
  public function getEventSourceName()
   {
      return $this->_eventSourceName;
   }

  public function setEventSourceName($eventSourceName)
  {
      $this->_eventSourceName = $eventSourceName;
  }

   public function getEventSourceLink()
   {
      return $this->_eventSourceLink;
   }

   public function setEventSourceLink($eventSourceLink)
   {
      $this->_eventSourceLink = $eventSourceLink;
   }

   public function getEventSourceLinkType()
   {
      return $this->_eventSourceLinkType;
   }

   public function setEventSourceLinkType($eventSourceLinkType)
   {
      $this->_eventSourceLinkType = $eventSourceLinkType;
   }

   public function getEventType()
   {
      return $this->_eventType;
   }

   public function setEventType($eventType)
   {
      $this->_eventType = $eventType;
   }

}

?>