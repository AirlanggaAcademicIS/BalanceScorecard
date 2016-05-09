
<?php
    include "koneksi.php";
	
	$tujuan = $_GET['tujuan'];
    $proker = mysql_query("select DISTINCT p.id_proker, p.nama_proker from tujuan t, menunjang m, proker p, indikator_tujuan i 
			where i.id_tujuan = $tujuan and i.id_indikator_tujuan = m.id_indikator_tujuan and m.id_proker = p.id_proker and 
			t.tujuan_organisasi like 'makan' ");
	echo "<option>-- Pilih Proker --</option>";
			while($p=mysql_fetch_array($proker)){
			echo "<option value=\"".$p['id_proker']."\">".$p['nama_proker']."</option>\n";
				}
   			
   
    ?>
	
  
