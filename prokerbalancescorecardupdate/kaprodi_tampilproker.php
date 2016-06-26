<?php
    include "koneksi.php";
	
	$tujuan = $_GET['tujuan'];
    $proker = mysqli_query($konek_db,"select DISTINCT p.ID_PROKER, p.NAMA_PROKER from TUJUAN t, MENUNJANG m, PROKER p, INDIKATOR_TUJUAN i 
			where i.ID_TUJUAN = '".$tujuan."' and i.ID_INDIKATOR_TUJUAN = m.ID_INDIKATOR_TUJUAN and m.ID_PROKER = p.ID_PROKER and 
			t.ID_TUJUAN='".$tujuan."' ORDER BY NAMA_PROKER");
	echo "<option>-- Pilih Proker --</option>";
			while($p=mysqli_fetch_array($proker)){
			echo "<option value=\"".$p['ID_PROKER']."\">".$p['NAMA_PROKER']."</option>\n";
				}
   			
?>
	