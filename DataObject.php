<?php
    
    class DataObject
    {
    	private $_dsn="mysql:host=fdb13.awardspace.net;port=3306;dbname=2148821_iot";
        private $_username="2148821_iot";
        private $_password="saibaba1";
		
    	public function connect()
		{
			$connection = null;
			try
            {
              $connection = new PDO($this->_dsn,$this->_username,$this->_password);
              $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
              
			}
			catch(PDOException $exception)
			{
				echo "Connection Failed" .$exception->getMessage();
			}
			
			return $connection;
		}
		
		public function disconnect($connection)
		{
			$connection = "";
		}
    }
?>