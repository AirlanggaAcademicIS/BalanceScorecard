<!DOCTYPE html>
<html lang="en">
<head>
	
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>	
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
.style2 {
	font-size: 17px;
	color: #FFFFFF;
}
.style4 {font-size: 21px}
-->
</style>
</head>


<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar"> </div>
  </div>
  <br>
    <div align="center" class="style2">Balanced ScoreCard</div>
</nav>
<div id="theme-login-wrapper">
		
<div class="container-fluid">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
  </div>
  <div class="collapse navbar-collapse" id="div"> </div>
</div>
<h2 class="text-center style4">Silahkan Login </h2>
<div class="grid_12">
			
<div class="theme-login-body">
				
<div class="theme-login-title"></div>
		
<div class="theme-login-form">
			
<form action="proseslogin.php" method="post">
						
<table width="866" height="200" border="0" cellpadding="0" cellspacing="0">
							

<tr>
								
<td width="521" height="72" align="right" valign="top">&nbsp;</td>
								
<td width="358"><p>
  <input name="NIP/NIK" type="text" id="NIP/NIK" class="form-control" placeholder="NIP atau NIK" onBlur="MM_validateForm('NIP/NIK','','NisNum');return document.MM_returnValue" size="25" required="required" />
  </p>
  </tr>
						
<tr>
								
  <td height="42" align="right" valign="top">&nbsp;</td>
  <td><p>
  <input name="password" type="password" id="password" size="25" class="form-control" placeholder="password" required="required" />
  </p>
    <p>&nbsp;</p>
  </tr>

<tr>
								
<td>&nbsp;</td>
								
<td colspan="3">
   
     <div align="right">
       <p onfocus="MM_validateForm('NIP/NIK','','RisNum','password','','R');return document.MM_returnValue">
         <input type="submit" name="login" value="Login" class="btn btn-primary" ; mm_validateform('nip/nik','','risnum','password','','r');return document.mm_returnvalue">
       </p>
       </div> 
       </form>
       <form action="niplupapass.php" method="post">
       
     <div align="right">
         <input type="submit" name="Submit" value="Lupa Password ?" class="btn btn-primary">
         </td>
         </div>
         </form>
     </label></td>
</tr>
</table>
					
				
</div>
  </div>	 
</div>
<div class="navbar navbar-inverse navbar-fixed-bottom">
<footer class="container-fluid text-center">
  <p>Sistem Informasi Universitas Airlangga</p>
</div>  
</footer>

</body>

</html>
