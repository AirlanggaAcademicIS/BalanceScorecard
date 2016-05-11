<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Balance Scorecard Universitas Airlangga</title>

<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
var htmlobjek;
$(document).ready(function(){

  $("#tujuan").change(function(){
    var tujuan = $("#tujuan").val();
    $.ajax({
        url: "tampilproker.php",
        data: "tujuan="+tujuan,
        cache: false,
        success: function(msg){
		
            $("#proker").html(msg);
        }
    });
  });
});

</script>

<style type="text/css">
<!--
.style2 {
	color: #FFFFFF;
	font-size: 37px;
	font-family: Arial, Helvetica, sans-serif;
}
.style4 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<table width="459" height="325" border="1" bordercolor="#000000" bgcolor="#000000">
  <tr>
    <td width="62" height="75"><img src="file:///C|/xamp1/htdocs/bsc1/images/f.gif" width="78" height="71" /></td>
    <td width="285"><div align="center"><span class="style2"><strong>Delete Proker</strong> </span></div></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF">
	
	<p><span class="style4">Tujuan : </span>	  </p>
	<p>
	  <select name="tujuan" id="tujuan" style="width:300px; height:35px; border:1px dotted #333333; border-radius:4px; -moz-border-radius:4px; font-family:Garamond; font-size:24px; margin-left:10px;">
	  <option>--Pilih Tujuan--</option>
	    <?php
						include 'koneksi.php';
						$tujuan = mysql_query("select t.tujuan_organisasi, t.id_tujuan from tujuan t ");
						while ($t = mysql_fetch_array($tujuan)){
								echo "<option value=\"$t[id_tujuan]\">$t[tujuan_organisasi]</option>\n"; 
								}
		?>
	    </select>
	  </p>
	<p><span class="style4">Nama Proker :</span>	    </p>
	<p>
	  <select name="proker" id="proker" style="width:300px; height:35px; border:1px dotted #333333; border-radius:4px; -moz-border-radius:4px; font-family:Garamond; font-size:24px; margin-left:10px;">
	  <option>--Pilih Proker--</option>
	  
	   
	  
	    </select>
	  </p>
	<p align="right">
	  <input name="Delete" type="submit" id="Delete" value="Hapus" />
	  
	
	  
	  </form>
	</p></td>
  </tr>
</table>
</body>

</html>
