<?php
    include "koneksi.php";
	
	$tujuan = $_GET['tujuan'];
    $proker = mysql_query("select DISTINCT p.ID_PROKER, p.NAMA_PROKER from tujuan t, menunjang m, proker p, indikator_tujuan i 
			where i.ID_TUJUAN = '".$tujuan."' and i.ID_INDIKATOR_TUJUAN = m.ID_INDIKATOR_TUJUAN and m.ID_PROKER = p.ID_PROKER and 
			t.ID_TUJUAN='".$tujuan."' ORDER BY NAMA_PROKER");
	echo "<option>-- Pilih Proker --</option>";
			while($p=mysql_fetch_array($proker)){
			echo "<option value=\"".$p['ID_PROKER']."\">".$p['NAMA_PROKER']."</option>\n";
				}
   			
?>
	