<?php
    
    //Database connection class
    
    //Getting the database credentials
    require_once('dbinfo.php');

    class dbconnection
    {     
      //properties
      
      public $connectdb;
      public $outputdb;

      /*
      *database connection method
      *@return true or false
      */
      public function connect()
      {
        //set connection to dbconnector property
        $this->connectdb = mysqli_connect(SERVER,USERNAME,PASSWORD,DBNAME);
        if(mysqli_connect_errno())
        {
          return false;
        }
          else {
            return true;
          }
        //$this->outputdb = dbresu
        }

      /*
      *database query method
      *@param sql to be executed
      *@return true or false
      */
      public function query($sql)
      {
        //check if the connection works
        if(!$this->connect())
        {
          return false;
        }

        //run the query
        else
        {
          $this->outputdb = mysqli_query($this->connectdb, $sql);

          //check if any record return
          if($this->outputdb == false)
            return false;

          else 
            return true;         
        } 
      }


      public function chkuserquery($sql)
      {
        //check if the connection works
        if(!$this->connect())
        {
          return false;
        }

        //run the query
        else
        {
          $this->outputdb = mysqli_query($this->connectdb, $sql);

          //
          if (mysqli_num_rows($this->outputdb))
            return true;

          else 
            return false; 
        }
      }


      /*
      *database fetch method
      *@return true or false
      */
      function fetch()
      {
       return mysqli_fetch_assoc($this->outputdb);
      }


      public function fetchResultObject()
      {
        // check if the results has some content
        if($this->outputdb == false){
          return null;
        }
        // return result
        return $this->outputdb;
      }


      /*
      *database get number of rows method
      *@return number of rows
      */
      public function getNumRows()
      {
        //check if the connection works
        if(!$this->connect())
        {
          return false;
        }

        else
          return mysqli_num_rows($this->outputdb);
      }

    }


?>
