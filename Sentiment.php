<?php

 class Sentiment
{
  private $_sentimentId;
  private $_sentimentsourceName;
  private $_sentimentsourceLink;
  private $_sentimentsourceLinkType;

  public function getSentimentId()
   {
      return $this->_sentimentId;
   }

  public function setSentimentId($sentimentId)
   {
      $this->_sentimentId = $sentimentId;
   }
   
  public function getSentimentSourceName()
   {
      return $this->_sentimentsourceName;
   }

  public function setSentimentSourceName($sentimentSourceName)
  {
      $this->_sentimentsourceName = $sentimentSourceName;
  }

   public function getSentimentSourceLink()
   {
      return $this->_sentimentsourceLink;
   }

   public function setSentimentSourceLink($sentimentSourceLink)
   {
      $this->_sentimentsourceLink = $sentimentSourceLink;
   }
   
  public function getSentimentSourceLinkType()
   {
      return $this->_sentimentsourceLinkType;
   }

   public function setSentimentSourceLinkType($sentimentSourceLinkType)
   {
      $this->_sentimentsourceLinkType = $sentimentSourceLinkType;
   }


}
?>