<?php  
//membuat koneksi ke database  
$host = 'localhost';  
  $user = 'root';        
  $password = '';        
  $database = 'pengembangansi';    
      
  $konek_db = mysql_connect($host, $user, $password);      
 if($konek_db){
	 $find_db = mysql_select_db($database) ;  
	}
	else{
		echo "<div class='alert alert-danger  alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
               	Database tidak terkoneksi
                </div>";
		}
?> 
