<?php
require('dbconnect.php');
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content ="width=device-width,initial-scale=1,user-scalable=yes" />
<link rel="stylesheet" href="pagr.css"> 
<title>Vairuotojas 7</title>
</head>     
<style>
body{
	max-width:400px;
	min-width:200px;
	height:300px;
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
</style> 

<body>
<div><button style="width:100%;height:50px;position:relative"  onClick="window.location.reload();" >Perkrauti</button></div>
<?php

	
	$btnSpalva="#FFCF0A";
	
	
	$result = $conn->query( "SELECT * FROM vairuotojai_uzim WHERE id='7'") or die(mysql_error());
		
		echo "<div style='min-width:200px;max-width:400px;;height:300px'>";
		
		while($row=mysqli_fetch_array($result)){
			
			$laikas = time()+ $row['laikas_start'];
		
			if(isset($_POST['darbT'])){	
					$resul=$conn->query("UPDATE vairuotojai_uzim SET darbas = 'dirba' WHERE id='$_POST[id]'")or die(mysql_error());
					echo "<meta http-equiv='refresh' content='0'>";
				}
			if(isset($_POST['darbN'])){	
					$resul=$conn->query("UPDATE vairuotojai_uzim SET darbas = 'nedirba' WHERE id='$_POST[id]' ")or die(mysql_error());
					echo "<meta http-equiv='refresh' content='0'>";
			}
			
			if($row['aktyvus']=='vair'){
					echo "<p style='background-color:#FFEEB0;height:30px;text-align:center;vertical-align: middle;'>".$row['vairuotojas']."</p>";
				}else if($row['aktyvus']=='mech'){
					echo "<p style='background-color:#82ADFF;height:30px;text-align:center;vertical-align: middle;'>".$row['vairuotojas']."</p>";
				}
			
			if($row['darbas']=='dirba'){
				echo "<p><form method='post'><input type='hidden' name='id' value=".$row['id']." ><input style='background-color:#66FF7E;height:30px;border:none;margin-top:15px;width:100%;' type='submit' name='darbN' value='Dirba' Onclick='return ConfirmDarbas();'></form></p>";
				
				//Pirmas uzsakumas starts
				if(isset($_POST['uz1bl'])){	
					
					$laikas1=$conn->query("UPDATE vairuotojai_uzim SET laikas = '$laikas' WHERE id='$_POST[id]'")or die(mysql_error());
					$conn->query("UPDATE vairuotojai_uzim SET countas = '1' WHERE id='$_POST[id]'")or die(mysql_error());
					$btnSpalva="#66FF7E";
					$conn->query("UPDATE vairuotojai_uzim SET uzsk_statusas = 'Uzsakymas vykdomas' WHERE id='$_POST[id]'")or die(mysql_error());
					echo "<meta http-equiv='refresh' content='0'>";
				}
				if(isset($_POST['uz1fl'])){	
					$resul=$conn->query("UPDATE vairuotojai_uzim SET uzsakymas1 = 'busy' WHERE id='$_POST[id]' ")or die(mysql_error());
					echo "<meta http-equiv='refresh' content='0'>";
				}
				
				echo "<hr>";
				echo "<p>Užsakymas 1:</p>";
				if($row['uzsakymas1']=='free'){
					echo "<p style='background-color:#66FF7E;'><form method='post'><input type='hidden' name='id' value=".$row['id']." ><input style='background-color:#66FF7E;height:30px;border:none;margin-top:15px;width:100%' type='submit' name='uz1fl' value='Laisvas' Onclick='return ConfirmLaisvas();'></form></p>";
					
				}else if($row['uzsakymas1']=='busy'){
					echo "<p style='background-color:#FFCF0A;'><form method='post'><input type='hidden' name='id' value=".$row['id']." ><input style='background-color:".$btnSpalva.";height:30px;border:none;margin-top:15px;width:100%'  type='submit' name='uz1bl' value='".$row['uzsk_statusas']."' Onclick='return ConfirmPriemimas();'></form></p>";
				}
				
				if(isset($_POST['uz1b'])){	
					
					$conn->query("UPDATE vairuotojai_uzim SET uzsakymas1 = 'free' WHERE id='$_POST[id]'")or die(mysql_error());
					$conn->query("UPDATE vairuotojai_uzim SET laikas = '' WHERE id='$_POST[id]'")or die(mysql_error());
					$conn->query("UPDATE vairuotojai_uzim SET countas = '1' WHERE id='$_POST[id]'")or die(mysql_error());
					echo "<meta http-equiv='refresh' content='0'>";
				}
				if(isset($_POST['uz1f'])){	
					$resul=$conn->query("UPDATE vairuotojai_uzim SET uzsakymas1 = 'busy' WHERE id='$_POST[id]' ")or die(mysql_error());
					echo "<meta http-equiv='refresh' content='0'>";
				}
				
				if($row['uzsakymas1']=='free'){
					
				}else if($row['uzsakymas1']=='busy'){
					
					echo "<p style='background-color:#FF4949;'><form method='post'><input type='hidden' name='id' value=".$row['id']." ><input style='background-color:#FF4949;height:30px;border:none;margin-top:15px;width:100%'  type='submit' name='uz1b' value='Užsakymas baigtas' Onclick='return ConfirmUzsakymasBaigtas();' ></form></p>";
				}
				//Pirmas uzsakymas ends
				
				$laikasuzsk2=time()+ $row['laikas_start2'];
				//Antras uzsakymas starts
				if(isset($_POST['uz2bl'])){	
					$laikas2=$conn->query("UPDATE vairuotojai_uzim SET laikas2 = '$laikasuzsk2' WHERE id='$_POST[id]'")or die(mysql_error());
					$conn->query("UPDATE vairuotojai_uzim SET countas2 = '1' WHERE id='$_POST[id]'")or die(mysql_error());
					$btnSpalva="#66FF7E";
					$conn->query("UPDATE vairuotojai_uzim SET uzsk_statusas2 = 'Uzsakymas vykdomas' WHERE id='$_POST[id]'")or die(mysql_error());
					echo "<meta http-equiv='refresh' content='0'>";
				}
				if(isset($_POST['uz2fl'])){	
					$resul=$conn->query("UPDATE vairuotojai_uzim SET uzsakymas2 = 'busy' WHERE id='$_POST[id]' ")or die(mysql_error());
					echo "<meta http-equiv='refresh' content='0'>";
				}
				
				echo "<hr>";
				echo "<p>Užsakymas ant viršaus:</p>";
				if($row['uzsakymas2']=='free'){
					echo "<p style='background-color:#66FF7E;'><form method='post'><input type='hidden' name='id' value=".$row['id']." ><input style='background-color:#66FF7E;height:30px;border:none;margin-top:15px;width:100%' type='submit' name='uz2fl' value='Laisvas' Onclick='return ConfirmLaisvas();'></form></p>";
				}else if($row['uzsakymas2']=='busy'){
					echo "<p style='background-color:#FFCF0A;'><form method='post'><input type='hidden' name='id' value=".$row['id']." ><input style='background-color:".$btnSpalva.";height:30px;border:none;margin-top:15px;width:100%' type='submit' name='uz2bl' value='".$row['uzsk_statusas2']."' Onclick='return ConfirmPriemimas();'></form></p>";
				}
				
				if(isset($_POST['uz2b'])){	
					$conn->query("UPDATE vairuotojai_uzim SET uzsakymas2 = 'free' WHERE id='$_POST[id]'")or die(mysql_error());
					$conn->query("UPDATE vairuotojai_uzim SET laikas2 = '' WHERE id='$_POST[id]'")or die(mysql_error());
					$conn->query("UPDATE vairuotojai_uzim SET countas2 = '1' WHERE id='$_POST[id]'")or die(mysql_error());
					echo "<meta http-equiv='refresh' content='0'>";
				}
				if(isset($_POST['uz2f'])){	
					$resul=$conn->query("UPDATE vairuotojai_uzim SET uzsakymas2 = 'busy' WHERE id='$_POST[id]' ")or die(mysql_error());
					echo "<meta http-equiv='refresh' content='0'>";
				}
				
				
				if($row['uzsakymas2']=='free'){
					
				}else if($row['uzsakymas2']=='busy'){
					echo "<p style='background-color:#FF4949;'><form method='post'><input type='hidden' name='id' value=".$row['id']." ><input style='background-color:#FF4949;height:30px;border:none;margin-top:15px;width:100%' type='submit' name='uz2b' value='Užsakymas baigtas '  Onclick='return ConfirmUzsakymasBaigtas();'></form></p>";
				}
				//Antras uzsakymas ends
				
				if(isset($_POST['adresas1'])){	
					$resulta=$conn->query("UPDATE vairuotojai_uzim SET adresas = '$_POST[adresasT]' WHERE id='$_POST[id]'")or die(mysql_error());
					echo "<meta http-equiv='refresh' content='0'>";
				}
				if(isset($_POST['adresas2'])){	
					$resulta=$conn->query("UPDATE vairuotojai_uzim SET adresas = '' WHERE id='$_POST[id]'")or die(mysql_error());
					echo "<meta http-equiv='refresh' content='0'>";
				} 
				
				echo "<hr>";
				echo "<p>Paskutinio užsakymo galutinis adresas / komentaras:</p>";
				echo "<p><form method='post'><input type='hidden' name='id' value=".$row['id']." ><input style='width:100%;height:40px;' placeholder='įrašyti adresą / komentarą' type='text' name='adresasT' value='".$row['adresas']."'><br><br><input style='width:100%;height:60px' type='submit' name='adresas1' value='Įrašyti'><br><br><input style='width:100%;height:60px' type='submit' name='adresas2' value='Trinti'></form></p>";
				
				
			}else if($row['darbas']=='nedirba'){
				echo "<p><form method='post'><input type='hidden' name='id' value=".$row['id']." ><input style='height:30px;border:none;margin-top:15px;width:100%;' type='submit' name='darbT' value='Nedirba' Onclick='return ConfirmDarbas();'></form></p>";
			}

		}
		
		echo "</div>";
	
	echo("<meta http-equiv='refresh' content='20'>");
	
	?>

<script>
    function ConfirmUzsakymasBaigtas()
    {
      var x = confirm("Ar tikrai norite užbaigti užsakymą?");
      if (x)
          return true;
      else
        return false;
    }
	</script>
	<script>
	function ConfirmPriemimas()
    {
      var a = confirm("Ar tikrai norite pradėti vykdyti užsakymą?");
      if (a)
          return true;
      else
        return false;
    }
</script> 
<script>
	function ConfirmDarbas()
    {
      var a = confirm("Ar tikrai norite koreguoti Darbo statusą?");
      if (a)
          return true;
      else
        return false;
    }
</script> 
 <script>
	function ConfirmLaisvas()
    {
      var a = confirm("Ar tikrai norite koreguoti Užsakymo būseną?");
      if (a)
          return true;
      else
        return false;
    }
</script> 

</body>
</html>