<?php include "koneksi.php";
session_start();
$_SESSION['NIP']=$_GET['NIP'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form name="form2" method="post" action="lupapass.php?NIP=<?php echo $_SESSION['NIP'];?>">
<div class="form-group">
      		<label class="control-label col-sm-2">Input tanggal lahir :</label>
      <div class="col-sm-10">
      
      	<input type='date'  class='form-control' name='tanggallahir'/>
        <input type="submit" name="cek" value="Cek" class="btn btn-primary"/>
      
       <?php
	   if(isset ($_POST['cek'])){
	   
	   $queri="Select * From karyawan where NIP='".$_SESSION['NIP']."'";  //menampikan SEMUA data dari tabel siswa  
	  		$hasil=MySQL_query ($queri);
			
			
			while ($data = mysql_fetch_array ($hasil)){
				if($_POST['tanggallahir']==$data['TANGGAL_LAHIR']){
				

				echo "<input type='text'  class='form-control' name='resetpass'>";
				echo "<input type='submit' name='reset' value='Reset' class='btn btn-primary'/>";
				
			}
			}

}
		
			
				?>   
                </form>
                <?php
				if(isset ($_POST['reset'])){
				 	mysql_query("UPDATE `karyawan` SET `PASSWORD`='".$_POST['resetpass']."' WHERE NIP =".$_REQUEST['NIP']);
					}
				?>
      </div>
		</div>

</body>
</html>
