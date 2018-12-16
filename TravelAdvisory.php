<?php

 class TravelAdvisory
{
  private $_traveladvisoryId;
  private $_traveladvisorysourceName;
  private $_traveladvisorysourceLink;
  private $_traveladvisorysourceLinkType;

  public function getTravelAdvisoryId()
   {
      return $this->_traveladvisoryId;
   }

  public function setTravelAdvisoryId($traveladvisoryId)
   {
      $this->_traveladvisoryId = $traveladvisoryId;
   }
   
  public function getTravelAdvisorySourceName()
   {
      return $this->_traveladvisorysourceName;
   }

  public function setTravelAdvisorySourceName($traveladvisorySourceName)
  {
      $this->_traveladvisorysourceName = $traveladvisorySourceName;
  }

   public function getTravelAdvisorySourceLink()
   {
      return $this->_traveladvisorysourceLink;
   }

   public function setTravelAdvisorySourceLink($traveladvisorySourceLink)
   {
      $this->_traveladvisorysourceLink = $traveladvisorySourceLink;
   }
   
  public function getTravelAdvisorySourceLinkType()
   {
      return $this->_traveladvisorysourceLinkType;
   }

   public function setTravelAdvisorySourceLinkType($traveladvisorySourceLinkType)
   {
      $this->_traveladvisorysourceLinkType = $traveladvisorySourceLinkType;
   }


}
?>