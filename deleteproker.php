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
-->
</style>
</head>

<body>
<table width="287" height="264" border="1" bordercolor="#FFFFFF" bgcolor="#0033CC">
  <tr>
    <td width="78" height="58" bgcolor="#0033CC"><img src="file:///C|/xamp1/htdocs/bsc/img/unair.jpg" width="88" height="76" /></td>
    <td width="193" colspan="3" bgcolor="#0033CC"><div align="center" class="style1">BALANCED SCORECARD </div></td>
  </tr>
  <tr>
    <td height="198" colspan="4" bgcolor="#FFFFFF"><table width="280" height="99" border="1" bgcolor="#FFFFFF">
      <tr>
        <td>Perspektif : </td>
        <td><form id="form1" name="form1" method="post" action="">
          <label>
          <select name="select">
          </select>
		  font-family:Garamond; font-size:24px; margin-left:10px;">
                        <?php
						include 'proker.php';
						$q2 = mysql_query("select * from nama_proker");
						while ($row2 = mysql_fetch_array($q2)){
							echo "<option value=$row2[id_proker]>$row2[nama_proker]</option>";
						}
						?>
          </label>
        </form>        </td>
        </tr>
      <tr>
        <td>Tujuan : </td>
        <td><form id="form2" name="form2" method="post" action="">
          <label>
            <select name="select2">
            </select>
            </label>
        </form>        </td>
        </tr>
      <tr>
        <td height="26">Nama Proker : </td>
        <td><form id="form3" name="form3" method="post" action="">
          <label>
            <select name="select3">
            </select>
            </label>
        </form>        </td>
        </tr>
    </table>
      <form id="form4" name="form4" method="post" action="">
        <label>
        <div align="right">
          <input type="submit" name="Submit" value="Hapus" />
        </div>
        </label>
    </form>      <p align="right">&nbsp;</p></td>
	
  </tr>
</table>

</body>


</html>
