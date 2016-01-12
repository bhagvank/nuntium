<?php

 class NewsSource
{
  private $_newssourceId;
  private $_newssourceName;
  private $_newssourceLink;
  private $_newssourceLinkType;

  public function getNewsSourceId()
   {
      return $this->_newssourceId;
   }

  public function setNewsSourceId($newsSourceId)
   {
      $this->_newssourceId = $newsSourceId;
   }
   
  public function getNewsSourceName()
   {
      return $this->_newssourceName;
   }

  public function setNewsSourceName($newsSourceName)
  {
      $this->_newssourceName = $newsSourceName;
  }

   public function getNewsSourceLink()
   {
      return $this->_newssourceLink;
   }

   public function setNewsSourceLink($newsSourceLink)
   {
      $this->_newssourceLink = $newsSourceLink;
   }
   
  public function getNewsSourceLinkType()
   {
      return $this->_newssourceLinkType;
   }

   public function setNewsSourceLinkType($newsSourceLinkType)
   {
      $this->_newssourceLinkType = $newsSourceLinkType;
   }


}
?>