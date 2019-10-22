<?php
   $hostname = 'localhost';
   $username = 'root';
   $password = '';
   $dbname = 'practice';
   try{
       //create a data source name 
       $dsn = "mysql:host=".$hostname.";dbname=".$dbname;
       $connection = new PDO($dsn,$username,$password);
       $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
       $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $connection->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);

   }catch(PDOException $e){
          echo 'Connection error'.$e->getMessage();
   }
?>