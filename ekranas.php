<?php
require('dbconnect.php');
?>
  <title>Uzimtumas</title> 
<meta http-equiv='refresh' content='10'>  
<style>
body{
	margin:0px;
}
table {
	border-collapse:collapse;
	margin:auto;	
}
tr {
	border:1px solid;
}
td {
	border:1px solid;
	width:100px;
	height:60px;
	text-align:center;

}
.busena{
	width:15%;
	margin-right:20px;
	border:2px solid ;
	border-radius:10px;
	padding:0px;
	text-align:center;
	
	
}
.vairuotojas{
	width:15%;
	margin-right:20px;
	border:2px solid ;
	border-radius:10px;
	display: inline-block;
	text-align:center;
	height:60px;
	font-size:40px;
	
	
}
.uzsakymas1{
	width:15%;
	margin-right:20px;
	border:2px solid;
	border-radius:10px;
	padding:0px;
	text-align:center;
	
}
.uzsakymas2{
	width:15%;
	margin-right:20px;
	border:2px solid;
	border-radius:10px;
	padding:0px;
	text-align:center;
	
}
.adresas{
	width:15%;
	margin-right:20px;
	border-radius:10px;
	border:2px solid;
	padding:20px;
	
}
.navas{
	margin:10px;
	padding: 10px;
	background-color:#E6E6E6;
	border:2px solid;
	border-radius:10px;
	display: flex;
    justify-content: center;
}
</style> 

<body>

<?php
	
	
	$result = $conn->query( "SELECT * FROM vairuotojai_uzim ") or die(mysqli_error());
	
	
		
		echo "<div>";
		
		
		while($row=mysqli_fetch_array($result)){

			
			if($row['darbas'] == 'dirba'){
				if($row['vairuotojas']=='Vairuotojas1'){
					echo "<iframe src='vairuotojas1Ekranas.php'  class='freimas' scrolling='no' frameborder='no' onload='resizeIframe(this)' style='margin:auto;height:130px;width:100%; border:none !important;'></iframe>";
				}else if($row['vairuotojas']=='Vairuotojas2'){
					echo "<iframe src='vairuotojas2Ekranas.php'  class='freimas' scrolling='no' frameborder='no' onload='resizeIframe(this)' style='margin:auto;height:130px;width:100%; border:none !important;'></iframe>";
				}else if($row['vairuotojas']=='Vairuotojas3'){
					echo "<iframe src='vairuotojas3Ekranas.php'  class='freimas' scrolling='no' frameborder='no' onload='resizeIframe(this)' style='margin:auto;height:130px;width:100%; border:none !important;'></iframe>";
				}else if($row['vairuotojas']=='Vairuotojas5'){
					echo "<iframe src='vairuotojas5Ekranas.php'  class='freimas' scrolling='no' frameborder='no' onload='resizeIframe(this)' style='margin:auto;height:130px;width:100%; border:none !important;'></iframe>";
				}else if($row['vairuotojas']=='Vairuotojas6'){
					echo "<iframe src='vairuotojas6Ekranas.php'  class='freimas' scrolling='no' frameborder='no' onload='resizeIframe(this)' style='margin:auto;height:130px;width:100%; border:none !important;'></iframe>";
				}else if($row['vairuotojas']=='Vairuotojas7'){
					echo "<iframe src='vairuotojas7Ekranas.php'  class='freimas' scrolling='no' frameborder='no' onload='resizeIframe(this)' style='margin:auto;height:130px;width:100%; border:none !important;'></iframe>";
				}
			}
		}
		echo "</div>";
		
	
	//echo("<meta http-equiv='refresh' content='10'>");
	
	?>

</body>