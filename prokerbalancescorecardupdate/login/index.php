<!DOCTYPE html>
<html lang="en">
<head>
	
<meta charset="utf-8" />
	
<title>Balance Scorecard Universitas Airlangga</title>
	
<link rel="stylesheet" type="text/css" href="css/style.css" />
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
<style type="text/css">
<!--
.style1 {font-size: 36px}
-->
</style>
</head>


<body>
	

<div id="theme-login-wrapper">
		
<div class="grid_12">
			
<div class="theme-login-body">
				
<div class="theme-login-title">
  <table width="200" border="1">
    <tr>
      <td width="26%" height="22"><img src="file:///C|/Users/Andri/Pictures/unair.jpg" width="123" height="114"></td>
      <td width="74%"> <div align="center"><span class="style1">BALANCED SCORE CARD</span> </div></td>
    </tr>
  </table>
</div>
		
<div class="theme-login-form">
			
<form action="proseslogin.php" method="post">
						
<table height="207" border="0" cellpadding="0" cellspacing="0">
							

<tr>
								
<td width="110" align="right" valign="top"><p>NIP</p>  </td>
								
<td width="30" align="center" valign="top"><p>:</p>  </td>
								
<td><input name="NIP/NIK" type="text" id="NIP/NIK" onBlur="MM_validateForm('NIP/NIK','','NisNum');return document.MM_returnValue" size="25" required="required" /></tr>
						
<tr>
								
<td width="110" align="right" valign="top">Password</td>
								
<td width="30" align="center" valign="top">:</td>
								
<td><input name="password" type="password" id="password" size="25" required="required" /></tr>

<tr>
								
<td>&nbsp;</td>
								
<td>&nbsp;</td>
								
<td colspan="3">
   
     <div align="right">
       <p onfocus="MM_validateForm('NIP/NIK','','RisNum','password','','R');return document.MM_returnValue">
         <input type="submit" name="login" value="login" ; mm_validateform('nip/nik','','risnum','password','','r');return document.mm_returnvalue">
       </p>
       </div>
       </form>
     <form action="niplupapass.php" method="post">
       
       
     <div align="right">
         <input type="submit" name="Submit" value="Lupa Password ?">
         <td><a href=\"lupapass.php?id=".$_POST['NIP/NIK']."\"> </td>
		

         </div>
         </form>
     </label></td>
</tr>
</table>
				
</div>
			
</div>

</div>

</div>
</body>

</html>
