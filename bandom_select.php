<?php
require('dbconnect.php');
?>
      
<style>
body{
	
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

<div>Atsilaisvins už <span id="time">30:00</span> min.</div>
-->

    
<?php
	
	
	
	$result = $conn->query( "SELECT * FROM vairuotojai_uzim") or die(mysqli_error());
		
		echo "<div>";
		echo "<table>";
		echo "<tr style='background-color:#AEAEAE;'>";
			echo "<td>Būsena</td>";
			echo "<td>Vairuotojas</td>";
			echo "<td>Užsakymas 1</td>";
			echo "<td>Užsakymas 2</td>";
			echo "<td style='width:250px'>Paskutinio užsakymo galutinis adresas</td>";
			echo "</tr>";
		while($row=mysqli_fetch_array($result)){
		
			
			
			echo "<tr>";
			
			if(isset($_POST['darbT'])){	
					$resul=$conn->query("UPDATE vairuotojai_uzim SET darbas = 'dirba' WHERE id='$_POST[id]'")or die(mysqli_error());
					echo "<meta http-equiv='refresh' content='0'>";
				}
			if(isset($_POST['darbN'])){	
					$resul=$conn->query("UPDATE vairuotojai_uzim SET darbas = 'nedirba' WHERE id='$_POST[id]' ")or die(mysqli_error());
					echo "<meta http-equiv='refresh' content='0'>";
			}
	
			if($row['darbas']=='dirba'){
				echo "<td style='background-color:#66FF7E;'><form method='post'><input type='hidden' name='id' value=".$row['id']." ><input style='background-color:#66FF7E;width:100px;height:30px;border:none;margin-top:15px' type='submit' name='darbN' value='Dirba'></form></td>";
				if($row['aktyvus']=='vair'){
					echo "<td style='background-color:#FFEEB0;'>".$row['vairuotojas']."</td>";
				}else if($row['aktyvus']=='mech'){
					echo "<td style='background-color:#82ADFF;'>".$row['vairuotojas']."</td>";
				}
				
				if(isset($_POST['uz1b'])){	
					$resul=$conn->query("UPDATE vairuotojai_uzim SET uzsakymas1 = 'free' WHERE id='$_POST[id]'")or die(mysqli_error());

					echo "<meta http-equiv='refresh' content='0'>";
				}
				if(isset($_POST['uz1f'])){	
					$resul=$conn->query("UPDATE vairuotojai_uzim SET uzsakymas1 = 'busy' WHERE id='$_POST[id]' ")or die(mysqli_error());
					echo "<meta http-equiv='refresh' content='0'>";
				}
				
				if($row['uzsakymas1']=='free'){
					echo "<td style='background-color:#66FF7E;'><form method='post'><input type='hidden' name='id' value=".$row['id']." ><input style='background-color:#66FF7E;width:100px;height:30px;border:none;margin-top:15px' id='uzs1f' type='submit' name='uz1f' value='Laisvas'></form></td>";
				}else if($row['uzsakymas1']=='busy'){
					echo "<td style='background-color:#FF4949;'><form method='post'><input type='hidden' name='id' value=".$row['id']." ><input style='background-color:#FF4949;width:100px;height:30px;border:none;margin-top:15px' id='uzs1b' type='submit' name='uz1b' value='užimtas'></form>";
					
					echo "</td>";
				}
				
				if(isset($_POST['uz2b'])){	
					$resul=$conn->query("UPDATE vairuotojai_uzim SET uzsakymas2 = 'free' WHERE id='$_POST[id]'")or die(mysqli_error());
					echo "<meta http-equiv='refresh' content='0'>";
				}
				if(isset($_POST['uz2f'])){	
					$resul=$conn->query("UPDATE vairuotojai_uzim SET uzsakymas2 = 'busy' WHERE id='$_POST[id]' ")or die(mysqli_error());
					echo "<meta http-equiv='refresh' content='0'>";
				}
				
				if($row['uzsakymas2']=='free'){
					echo "<td style='background-color:#66FF7E;'><form method='post'><input type='hidden' name='id' value=".$row['id']." ><input style='background-color:#66FF7E;width:100px;height:30px;border:none;margin-top:15px' type='submit' name='uz2f' value='Laisvas'></form></td>";
				}else if($row['uzsakymas2']=='busy'){
					echo "<td style='background-color:#FF4949;'><form method='post'><input type='hidden' name='id' value=".$row['id']." ><input style='background-color:#FF4949;width:100px;height:30px;border:none;margin-top:15px' type='submit' name='uz2b' value='užimtas'></form></td>";
				}
				
				if(isset($_POST['adresas1'])){	
					$resulta=$conn->query("UPDATE vairuotojai_uzim SET adresas = '$_POST[adresasT]' WHERE id='$_POST[id]'")or die(mysqli_error());
					echo "<meta http-equiv='refresh' content='0'>";
				}
				if(isset($_POST['adresas2'])){	
					$resulta=$conn->query("UPDATE vairuotojai_uzim SET adresas = '' WHERE id='$_POST[id]'")or die(mysqli_error());
					echo "<meta http-equiv='refresh' content='0'>";
				}
				echo "<td><form method='post'><input type='hidden' name='id' value=".$row['id']." ><input  type='text' name='adresasT' value='".$row['adresas']."'><br><input style='width:50px' type='submit' name='adresas1' value='Įrašyti'><input style='width:50px' type='submit' name='adresas2' value='Trinti'></form></td>";
				?>
				
		
	
				<?php
			}else if($row['darbas']=='nedirba'){
				echo "<td><form method='post'><input type='hidden' name='id' value=".$row['id']." ><input style='width:100px;height:30px;border:none;margin-top:15px' type='submit' name='darbT' value='Nedirba'></form></td>";
				if($row['aktyvus']=='vair'){
					echo "<td style='background-color:#FFEEB0;'>".$row['vairuotojas']."</td>";
				}else if($row['aktyvus']=='mech'){
					echo "<td style='background-color:#82ADFF;'>".$row['vairuotojas']."</td>";
				}
			}
			
		

			echo "</tr>";
		}
	
		echo "</table>";
		echo "</div>";
	
	echo("<meta http-equiv='refresh' content='120'>");
	
	?>



</body>

    