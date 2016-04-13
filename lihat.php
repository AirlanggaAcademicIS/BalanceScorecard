<?php
session_start();
if(empty($_SESSION['session_tiket_user']) && empty($_SESSION['session_tiket_pass'])){
	echo "Anda Harus Login. Login <a href=\"index.php\">Di Sini</a>";
}
else{
	if(access!="yes"){ 
		echo "Denied."; 
	} 
	else {
?>

<div class="theme-content-title">Balance Score Card</div>
<div class="theme-content-area">
	<div class="theme-content-menu">
		<div class="xleft">
			<form action="admin.php?page=tiket&action=cari_redirect" method="post">
				<input type="text" name="q" placeholder="cari.." />
			</form>
		</div>
		<div class="xright">
			<a href="admin.php?page=tiket&action=tambah">+ Tambah Data</a>
		</div>
		<div class="clearfix"></div>
	</div>
<?php
$user_name = "root";
$password = "";
$database = "pengembangansi";
$host_name = "localhost";
 
$connect_db=mysql_connect($host_name, $user_name, $password);
 
$find_db=mysql_select_db($database);
$query = mysql_query("SELECT t.perspektif, t.tujuan_organisasi, i.nama_indikator_tujuan FROM tujuan t, indikator_tujuan i", $connect_db);
$jumlah = mysql_num_rows($query);
 
echo "Jumlah record : $jumlah";
echo "<br /><br />";

echo "<table border='1'>
<tr><th>Perspektif</th><th>Tujuan Organisasi</th><th>Indikator</th></tr>";
while($baris=mysql_fetch_array($query)){
 
  echo "<tr><td>";
  echo $baris["perspektif"];
  echo "</td><td>";
  echo $baris["tujuan_organisasi"];
  echo "</td><td>";
  echo $baris["nama_indikator_tujuan"];
  echo "</td><tr>";
}
 
echo "</table>";
?>
		
		<?php
			$p       = new Paging;
			$batas   = 10;
			$posisi  = $p->cariPosisi($batas);
			$no      = 1;
			$query = mysql_query("SELECT * FROM program_kerja INNER JOIN tiket_order ON program_kerja.id_angkot=tiket_order.id_angkot ORDER BY tiket_order.id_order DESC LIMIT $posisi,$batas");
			while($data=mysql_fetch_assoc($query)){
		?>
		<tr>
			<td align="center"><?php echo $data['id_order']; ?></td>
			<td align="center"><?php echo $data['nama']; ?></td>
			<td align="center"><?php echo $data['kode_angkot']; ?></td>
			<td align="center"><?php echo $data['jumlah_beli']; ?></td>
			<td align="center">Rp.<?php echo $data['total']; ?></td>
			<td align="center">
				<a href="admin.php?page=indikator">Detail</a> | 
				<a href="admin.php?page=tiket&action=ubah&id=<?php echo $data['id_order']; ?>">Ubah</a> | 
				<a href="admin.php?page=tiket&action=hapus&id=<?php echo $data['id_order']; ?>" onClick="return warning();">Hapus</a>
			</td>
		</tr>
		<?php } ?>
	</table>
	<?php
		/* Buat Tombol Pagging */
		$jmldata     = mysql_num_rows(mysql_query("SELECT * FROM program_kerja INNER JOIN tiket_order ON program_kerja.id_angkot=tiket_order.id_angkot"));
		$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
		$linkHalaman = $p->navHalaman($_GET["hal"], $jmlhalaman);
		echo "<div id=\"result-pagging\">$linkHalaman</div>";
	?>
</div>

<?php
	}
}
?>