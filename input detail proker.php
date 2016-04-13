<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style4 {
	color: #FFFFFF;
	font-weight: bold;
}
-->

</style>
<script type="text/JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
  } if (errors) alert('The following error(s) occurred:\n'+errors);
  document.MM_returnValue = (errors == '');
}
//-->
</script>
</head>

<body><table width="600" border="1">
  <tr>
    <td width="600" height="32" bordercolor="#FFFFFF" bgcolor="#1E90FF"><p align="center" class="style4">BALANCE SCORECARD</p>    </td>
  </tr>
</table>

<table width="600" height="620" border="2">
  <tr>
    <td width="153" valign="top" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
        <label>
        <div align="right">Program Kerja &nbsp; :</div>
        </label>
        <br />
        <label>
        <div align="right">Latar Belakang &nbsp; :</div>
        </label>
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <label>
        <div align="right">Tujuan &nbsp; :</div>
        </label>
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <label>
        <div align="right">Deskripsi Proker &nbsp; :</div>
        </label>
        <br />
        <br />
        <br />
        <br />
        <br />
        <label>
        <div align="right">Waktu Pelaksanaan &nbsp; :</div>
        </label>
		<br />
        <label>
        <div align="right">Anggaran Dana &nbsp; :</div>
        </label>
        <br />
        <label>
        <div align="right">Koordinator &nbsp; :</div>
        </label>
        <br />
        <label>
        <div align="right">Status &nbsp; :</div>
        </label>
            </td>
    <td width="329" valign="top">
    <label>
      <div align="left"> &nbsp; &nbsp; Menjalin Kerjasama dengan Stakeholder</div>
        </label>
        <br />
        &nbsp; &nbsp; <textarea name="latar belakang" cols="35" rows="6,5"></textarea>
        <br />
        <br />
        &nbsp; &nbsp; <textarea name="tujuan" cols="35" rows="6,5"></textarea>
        <br />
        <br />
        &nbsp; &nbsp; <textarea name="deskripsi proker" cols="35" rows="6,5"></textarea>
        <br />
        <br />
        &nbsp; &nbsp; <input type="date" name="tanggal_lahir"/> sampai <input type="date" name="tanggal_lahir"/>
        <br />
        <br />
        &nbsp; &nbsp; <input name="anggaran" type="text" size="33" maxlength="15" />
        <br />
        <br />
        &nbsp; &nbsp; <label>Putratama Geza</label>
        <br />
        <br />
        &nbsp; &nbsp; <input name="terlaksana" type="checkbox" disabled value="" /> &nbsp; <label>terlaksana</label> &nbsp; &nbsp; <input name="tidak terlaksana" type="checkbox" disabled value=""/> <label>tidak terlaksana</label>
        <br />
        <br />
        &nbsp; &nbsp; <input name="simpan dan kirim" type="button" value="Simpan dan Kirim" style="background:#FF3366;border:5;"/>
    </td>
  </tr>
</table>


</body>
</html>