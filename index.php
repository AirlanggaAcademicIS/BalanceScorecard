<?php  
//membuat koneksi ke database  
$host = 'localhost';  
  $user = 'root';        
  $password = '';        
  $database = 'crebas';    
      
  $konek_db = mysql_connect($host, $user, $password);      
  $find_db = mysql_select_db($database) ;  
?> 

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Laporan Pertanggung Jawaban</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">	
        <link rel="stylesheet" href="css/dataTables.bootstrap.css">
</head>
<body>
<div class="container">
            <h2 class="text-center">Laporan Pertanggungjawaban</h2>
            <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id LPJ</th>
                            <th>Id Proker</th>
                            <th>Evaluasi</th>
                            <th>Keberlanjutan</th>
                        </tr>
                    </thead>
 <?php    
// Perintah untuk menampilkan data  
$queri="Select * From laporan_pertanggung_jawaban" ;  //menampikan SEMUA data dari tabel siswa  
  
$hasil=MySQL_query ($queri);    //fungsi untuk SQL  
  
// perintah untuk membaca dan mengambil data dalam bentuk array  
while ($data = mysql_fetch_array ($hasil)){  
$id = $data['id'];  
 echo "      
        <tr>  
        <td>".$data['ID_LPJ']."</td>  
        <td>".$data['ID_PROKER']."</td>  
        <td>".$data['EVALUASI']."</td>  
        <td>".$data['KEBERLANJUTAN']."</td>  
          
        </tr>   
        ";            
}    
?>  
</table>
            </div><!-- /.box-body -->
        </div>	
        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/dataTables.bootstrap.js"></script>	
        <script type="text/javascript">
            $(function() {
                $('#example1').dataTable();
            });
        </script>
</body>
</html>