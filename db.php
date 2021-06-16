<?php
   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('databaseUsers.db');
      }
   }
   $db = new MyDB();
   if(!$db){
	   $filename = 'databaseUsers.db';

      echo $db->lastErrorMsg();
   } else {
      //echo "basarili\n";
   }  
   $sqlAdmin =<<<EOF
      CREATE TABLE IF NOT EXISTS ADMIN
      (ID INTEGER PRIMARY KEY AUTOINCREMENT,
      USERNAME           TEXT    NOT NULL,
	  EMAIL          TEXT    NOT NULL,
      PASSWORD		 TEXT);
EOF;
$ret1 = $db->exec($sqlAdmin);
   if(!$ret1){
      echo $db->lastErrorMsg();
   } else {
      //echo "tablo oluştu\n";
   }
$sqlAdminIn =<<<EOF
      INSERT INTO ADMIN (USERNAME, EMAIL,PASSWORD)
		VALUES ('admin', 'admin@gmail.com','admin@123')
EOF;
   
		
   
	$ret2 = $db->exec($sqlAdminIn);
   if(!$ret2){
      echo $db->lastErrorMsg();
   } else {
      //echo "Table created successfully\n";
   }
   
   
   
   $db->close();
?>