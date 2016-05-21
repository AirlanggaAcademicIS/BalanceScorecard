<?php  
//membuat koneksi ke database  
$host = 'localhost';  
  $user = 'root';        
  $password = '';        
  $database = 'pengembangansi';    
      
  $konek_db = mysql_connect($host, $user, $password);      
  $find_db = mysql_select_db($database) ;  
?> 