<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {
	font-family: arial;
	color: #fff;
	font-weight: bold;
}
.style3 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<table width="701" height="328" border="1" bordercolor="#FFFFFF" bgcolor="#0033CC">
  <tr>
    <td width="89" height="58" bgcolor="#0033CC"><img src="file:///C|/xamp1/htdocs/bsc/img/unair.jpg" width="88" height="76" /></td>
    <td width="596" colspan="3" bgcolor="#0033CC"><div align="center" class="style1">BALANCED SCORECARD </div></td>
  </tr>
  <tr>
    <td height="240" colspan="4" bgcolor="#FFFFFF"><table width="680" height="94" border="1" bgcolor="#FFFFFF">
      <tr>
					<td width="670"><p><span class="style3">Tujuan</span> <strong>:</strong>
					    <select name="transmisi" style="width:300px; height:35px; border:1px dotted #333333; border-radius:4px; -moz-border-radius:4px; font-family:Garamond; font-size:24px; margin-left:10px;">
					      <?php
						include 'koneksi.php';
						$tujuan = mysql_query("select * from tujuan");
						while ($row2 = mysql_fetch_array($tujuan)){
							echo "<option value=$row2[ID_TUJUAN]>$row2[TUJUAN_ORGANISASI]</option>";
						}
						?>
				        </select>
					</p>
		  <p class="style3">Nama Proker : 
		    <select name="select" style="width:300px; height:35px; border:1px dotted #333333; border-radius:4px; -moz-border-radius:4px; font-family:Garamond; font-size:24px; margin-left:10px;">
              <?php
					 $proker = mysql_query("select p.nama_proker from tujuan t, 
					 menunjang m, proker p, indikator_tujuan i where t.ID_TUJUAN = i.ID_TUJUAN and i.ID_INDIKATOR_TUJUAN = m.ID_INDIKATOR_TUJUAN 
					 and m.ID_PROKER = p.ID_PROKER and t.TUJUAN_ORGANISASI = "" );
					 while($p=mysql_fetch_array($proker)){
					 	echo "<option value=$row2[ID_PROKER]>$row2[NAMA_PROKER]</option>";
}
?>
            </select>
		  </p></td>
		</tr>
    </table>
      <form id="form1" name="form1" method="post" action="">
        <label>
        <div align="right">
          <input name="delete" type="submit" id="delete" value="delete" />
		  
        </div>
        </label>
      </form>
    </td>
  </tr>
</table>

</body>

</html>
