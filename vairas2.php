<?php
require('dbconnect.php');
?>
      
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
</style> 

<body>

    
<?php
	
	
	$result = $conn->query( "SELECT * FROM vairuotojai_uzim Where id='1'") or die(mysql_error());
	
		
		
		echo "<div>";
		echo "<table>";
		
		while($row=mysqli_fetch_array($result)){
			
			$pirmoUzsakymoLaikoMatomumas='visible';
			$antroUzsakymoLaikoMatomumas='visible';
		
			$time= time();
			$uzsakymu_sk_d = $row['uzsakymu_sk_d'];
			
			echo "<tr>";
			
			if(isset($_POST['darbT'])){	
					$resul=$conn->query("UPDATE vairuotojai_uzim SET darbas = 'dirba' WHERE id='1'")or die(mysql_error());
					echo "<meta http-equiv='refresh' content='0'>";
				}
			if(isset($_POST['darbN'])){	
					$resul=$conn->query("UPDATE vairuotojai_uzim SET darbas = 'nedirba' WHERE id='1' ")or die(mysql_error());
					echo "<meta http-equiv='refresh' content='0'>";
			}
	
			if($row['darbas']=='dirba'){
				echo "<td style='background-color:#66FF7E;'><form method='post'><input type='hidden' name='id' value='1' ><input style='background-color:#66FF7E;width:100px;height:30px;border:none;margin-top:15px' type='submit' name='darbN' value='Dirba'></form></td>";
				if($row['aktyvus']=='vair'){
					echo "<td style='background-color:#FFEEB0;'>".$row['vairuotojas']."</td>";
				}else if($row['aktyvus']=='mech'){
					echo "<td style='background-color:#82ADFF;'>".$row['vairuotojas']."</td>";
				}
			//Pirmas uzsakymas start
			$countas= $row['countas'];
				
			if($row['laikas'] < $time and $countas=='1'){
				$conn->query("UPDATE vairuotojai_uzim SET laikas = '' WHERE id='1'");
				$conn->query("UPDATE vairuotojai_uzim SET uzsakymas1 = 'free' WHERE id='1'");
				$conn->query("UPDATE vairuotojai_uzim SET countas = '3' WHERE id='1'");
				$conn->query("UPDATE vairuotojai_uzim SET uzsk_statusas = 'Pradeti vykdyti' WHERE id='$_POST[id]'")or die(mysql_error());
				echo "<meta http-equiv='refresh' content='0'>";
				
			}else if(row['laikas'] > $time){				
				
			}
				
				if(isset($_POST['uz1b'])){
					$laikas1=$conn->query("UPDATE vairuotojai_uzim SET laikas = '' WHERE id='1'")or die(mysql_error());
					$resul=$conn->query("UPDATE vairuotojai_uzim SET uzsakymas1 = 'free' WHERE id='1'")or die(mysql_error());
					$conn->query("UPDATE vairuotojai_uzim SET uzsk_statusas = 'Pradeti vykdyti' WHERE id='$_POST[id]'")or die(mysql_error());
					echo "<meta http-equiv='refresh' content='0'>";
				}
				if(isset($_POST['uz1f'])){	
					$resul=$conn->query("UPDATE vairuotojai_uzim SET uzsakymas1 = 'busy' WHERE id='1' ")or die(mysql_error());
					$conn->query("UPDATE vairuotojai_uzim SET countas = '2' WHERE id='1' ");
					$uzsakymu_sk_d++;
					$conn->query("UPDATE vairuotojai_uzim SET uzsakymu_sk_d = '$uzsakymu_sk_d' WHERE id='1' ");
					$conn->query("UPDATE vairuotojai_uzim SET uzsk_statusas = 'Pradeti vykdyti' WHERE id='$_POST[id]'")or die(mysql_error());
					echo "<meta http-equiv='refresh' content='0'>";
				}
				
				if($row['uzsakymas1']=='free'){
					echo "<td style='background-color:#66FF7E;'><form method='post'><input type='hidden' name='id' value='1' ><input style='background-color:#66FF7E;width:100px;height:30px;border:none;margin-top:15px' id='uzs1f' type='submit' name='uz1f' value='Laisvas' Onclick='return ConfirmPerduoti();'></form></td>";
				}else if($row['uzsakymas1']=='busy'){
					if($row['uzsk_statusas']=='Pradeti vykdyti'){
						echo "<td style='background-color:#FF4949;'><form method='post'><input type='hidden' name='id' value='1' ><input style='background-color:#FF4949;width:100px;height:30px;border:none;margin-top:15px' id='uzs1b' type='submit' name='uz1b' value='užimtas' Onclick='return ConfirmAtsaukti();'></form>";
						if($row['laikas'] != ''){
							
						
						}
						echo "</td>";
					}else if($row['uzsk_statusas']=='Uzsakymas vykdomas'){
						echo "<td style='background-color:#FFCF0A;'><form method='post'><input type='hidden' name='id' value='1' ><input style='background-color:#FFCF0A;width:100px;height:30px;border:none;margin-top:15px' id='uzs1b' type='submit' name='uz1b' value='Priimtas' Onclick='return ConfirmAtsaukti();'></form>";
						if($row['laikas'] != ''){
							
						
						}
						echo "</td>";
					}
				}
				//Pirmas uzsakymas end

				//Antras uzsakymas start
				$countas2= $row['countas2'];
				
			if($row['laikas2'] < $time and $countas2=='1'){
				$conn->query("UPDATE vairuotojai_uzim SET laikas2 = '' WHERE id='1'");
				$conn->query("UPDATE vairuotojai_uzim SET uzsakymas2 = 'free' WHERE id='1'");
				$conn->query("UPDATE vairuotojai_uzim SET countas2 = '3' WHERE id='1'");
				$conn->query("UPDATE vairuotojai_uzim SET uzsk_statusas2 = 'Pradeti vykdyti' WHERE id='$_POST[id]'")or die(mysql_error());
				echo "<meta http-equiv='refresh' content='0'>";
				
			}else if(row['laikas2'] > $time){				
				
			}
				
				if(isset($_POST['uz2b'])){
					$laikas2=$conn->query("UPDATE vairuotojai_uzim SET laikas2 = '' WHERE id='1'")or die(mysql_error());					
					$resul=$conn->query("UPDATE vairuotojai_uzim SET uzsakymas2 = 'free' WHERE id='1'")or die(mysql_error());
					$conn->query("UPDATE vairuotojai_uzim SET uzsk_statusas2 = 'Pradeti vykdyti' WHERE id='$_POST[id]'")or die(mysql_error());
					echo "<meta http-equiv='refresh' content='0'>";
				}
				if(isset($_POST['uz2f'])){	
					$resul=$conn->query("UPDATE vairuotojai_uzim SET uzsakymas2 = 'busy' WHERE id='1' ")or die(mysql_error());
					$conn->query("UPDATE vairuotojai_uzim SET countas2 = '2' WHERE id='1' ");
					$uzsakymu_sk_d++;
					$conn->query("UPDATE vairuotojai_uzim SET uzsakymu_sk_d = '$uzsakymu_sk_d' WHERE id='1' ");
					$conn->query("UPDATE vairuotojai_uzim SET uzsk_statusas2 = 'Pradeti vykdyti' WHERE id='$_POST[id]'")or die(mysql_error());
					echo "<meta http-equiv='refresh' content='0'>";
				}
				
				if($row['uzsakymas2']=='free'){
					echo "<td style='background-color:#66FF7E;'><form method='post'><input type='hidden' name='id' value='1' ><input style='background-color:#66FF7E;width:100px;height:30px;border:none;margin-top:15px' type='submit' name='uz2f' value='Laisvas' Onclick='return ConfirmPerduoti();'></form></td>";
				}else if($row['uzsakymas2']=='busy'){
					if($row['uzsk_statusas2']=='Pradeti vykdyti'){
						echo "<td style='background-color:#FF4949;'><form method='post'><input type='hidden' name='id' value='1' ><input style='background-color:#FF4949;width:100px;height:30px;border:none;margin-top:15px' id='uzs2b' type='submit' name='uz2b' value='užimtas' Onclick='return ConfirmAtsaukti();'></form>";
						if($row['laikas'] != ''){
							
						
						}
						echo "</td>";
					}else if($row['uzsk_statusas2']=='Uzsakymas vykdomas'){
						echo "<td style='background-color:#FFCF0A;'><form method='post'><input type='hidden' name='id' value='1' ><input style='background-color:#FFCF0A;width:100px;height:30px;border:none;margin-top:15px' id='uzs2b' type='submit' name='uz2b' value='Priimtas' Onclick='return ConfirmAtsaukti();'></form>";
						if($row['laikas'] != ''){
							
						
						}
						echo "</td>";
					}
				}
				//Pirmas uzsakymas ends
				
				if(isset($_POST['adresas1'])){	
					$resulta=$conn->query("UPDATE vairuotojai_uzim SET adresas = '$_POST[adresasT]' WHERE id='1'")or die(mysql_error());
					echo "<meta http-equiv='refresh' content='0'>";
				}
				if(isset($_POST['adresas2'])){	
					$resulta=$conn->query("UPDATE vairuotojai_uzim SET adresas = '' WHERE id='1'")or die(mysql_error());
					echo "<meta http-equiv='refresh' content='0'>";
				}
				echo "<td style='width:250px'><form method='post'><input type='hidden' name='id' value='1' ><input  type='text' name='adresasT' value='".$row['adresas']."'><br><input style='width:50px' type='submit' name='adresas1' value='Įrašyti'><input style='width:50px' type='submit' name='adresas2' value='Trinti'></form></td>";
		
		
				if(isset($_POST['skDel'])){
					if($uzsakymu_sk_d>0){
					$uzsakymu_sk_d--;
					}
					$skDel=$conn->query("UPDATE vairuotojai_uzim SET uzsakymu_sk_d = '$uzsakymu_sk_d' WHERE id='1'")or die(mysql_error());	
					echo "<meta http-equiv='refresh' content='0'>";
				}
				echo "<td style='width:80px'><form method='post' style='margin:0px;'><input type='hidden' name='id' value='1' ><input style='width:60px;height:60px' type='submit' name='skDel' value='X'></form></td>";
				echo "<td style='width:80px'>".$row['uzsakymu_sk_d']."</td>";


				
				if(isset($_POST['uzs1val'])){
					$laikasVal = 3600;
					$laik1val=$conn->query("UPDATE vairuotojai_uzim SET laikas_start = '$laikasVal' WHERE id='1'")or die(mysql_error());
					echo "<meta http-equiv='refresh' content='0'>";
				}
				if(isset($_POST['uzs1val2'])){
					$laikasVal = 7200;
					$laik1val=$conn->query("UPDATE vairuotojai_uzim SET laikas_start = '$laikasVal' WHERE id='1'")or die(mysql_error());
					echo "<meta http-equiv='refresh' content='0'>";
				}
				if(isset($_POST['uzs1val3'])){
					$laikasVal = 10800;
					$laik1val=$conn->query("UPDATE vairuotojai_uzim SET laikas_start = '$laikasVal' WHERE id='1'")or die(mysql_error());
					echo "<meta http-equiv='refresh' content='0'>";
				}
				
				
				
				$UzsakymoLaikoSpalva1='#F5F5F5';
				$UzsakymoLaikoSpalva2='#F5F5F5';
				$UzsakymoLaikoSpalva3='#F5F5F5';
				
				switch($row['laikas_start']){
					case 3600:
					$UzsakymoLaikoSpalva1='#FF7210';
					break;
					case 7200:
					$UzsakymoLaikoSpalva2='#FF7210';
					break;
					case 10800:
					$UzsakymoLaikoSpalva3='#FF7210';
					break;
				}
				$pirmoUzsakymoLaikoPasirinkimoStat;
				$pirmoUzsakymoLaikoPasirinkimoSpalva;
				$pirmoUzsakymoLaikoEkranas;
				if($row['uzsakymas1']=='busy'){
					$pirmoUzsakymoLaikoMatomumas='hidden';
					switch($row['laikas_start']){
						case 3600:
						$pirmoUzsakymoLaikoPasirinkimoStat='<h>Miestas</h>';
						$pirmoUzsakymoLaikoPasirinkimoSpalva='#FF7210';
						$pirmoUzsakymoLaikoEkranas = "<iframe style='height:60px;' src='frame2.php' onload='resizeIframe(this)' scrolling='no' frameborder='no'  ></iframe>";
						break;
						case 7200:
						$pirmoUzsakymoLaikoPasirinkimoStat='<h>Užmiestis ~2 val.</h>';
						$pirmoUzsakymoLaikoPasirinkimoSpalva='#FF7210';
						$pirmoUzsakymoLaikoEkranas = "<iframe style='height:60px;' src='frame2.php' onload='resizeIframe(this)' scrolling='no' frameborder='no'  ></iframe>";
						break;
						case 10800:
						$pirmoUzsakymoLaikoPasirinkimoStat='<h>Užmiestis ~3 val.</h>';
						$pirmoUzsakymoLaikoPasirinkimoSpalva='#FF7210';
						$pirmoUzsakymoLaikoEkranas = "<iframe style='height:60px;' src='frame2.php' onload='resizeIframe(this)' scrolling='no' frameborder='no'  ></iframe>";
						break;
					}
					
					
				}else if($row['uzsakymas1']=='free'){
					$pirmoUzsakymoLaikoMatomumas='visible';
					$pirmoUzsakymoLaikai="<form method='post' style='margin:2px'><input type='hidden' name='id' value='1' ><input  style='width:120px;background-color:$UzsakymoLaikoSpalva1;visibility:$pirmoUzsakymoLaikoMatomumas' type='submit' name='uzs1val' value='Miestas'></form><form method='post' style='margin:2px'><input type='hidden' name='id' value='5' ><input  style='width:120px;background-color:$UzsakymoLaikoSpalva2;visibility:$pirmoUzsakymoLaikoMatomumas' type='submit' name='uzs1val2' value='Užmiestis ~2 val.'></form><form method='post' style='margin:2px'><input type='hidden' name='id' value='5' ><input  style='width:120px;background-color:$UzsakymoLaikoSpalva3;visibility:$pirmoUzsakymoLaikoMatomumas' type='submit' name='uzs1val3' value='Užmiestis ~3 val.'></form>";
					
				}
				
				
				echo "<td style='width:300px;background-color:$pirmoUzsakymoLaikoPasirinkimoSpalva'>";
				//echo $pirmoUzsakymoLaikoPasirinkimoStat;
				echo $pirmoUzsakymoLaikai;
				echo $pirmoUzsakymoLaikoEkranas;
				
				echo "</td>";
				
				if(isset($_POST['uzs2val'])){
					$laikas2Val = 3600;
					$laik1val=$conn->query("UPDATE vairuotojai_uzim SET laikas_start2 = '$laikas2Val' WHERE id='1'")or die(mysql_error());
					echo "<meta http-equiv='refresh' content='0'>";
				}
				if(isset($_POST['uzs2val2'])){
					$laikas2Val = 7200;
					$laik1val=$conn->query("UPDATE vairuotojai_uzim SET laikas_start2 = '$laikas2Val' WHERE id='1'")or die(mysql_error());
					echo "<meta http-equiv='refresh' content='0'>";
				}
				if(isset($_POST['uzs2val3'])){
					$laikas2Val = 10800;
					$laik1val=$conn->query("UPDATE vairuotojai_uzim SET laikas_start2 = '$laikas2Val' WHERE id='1'")or die(mysql_error());
					echo "<meta http-equiv='refresh' content='0'>";
				}
				
				$UzsakymoLaikoSpalva4='#F5F5F5';
				$UzsakymoLaikoSpalva5='#F5F5F5';
				$UzsakymoLaikoSpalva6='#F5F5F5';
				
				switch($row['laikas_start2']){
					case 3600:
					$UzsakymoLaikoSpalva4='#FF7210';
					break;
					case 7200:
					$UzsakymoLaikoSpalva5='#FF7210';
					break;
					case 10800:
					$UzsakymoLaikoSpalva6='#FF7210';
					break;
				}
				
				$antroUzsakymoLaikoPasirinkimoStat;
				$antroUzsakymoLaikoPasirinkimoSpalva;
				$antroUzsakymoLaikoEkranas;
				if($row['uzsakymas2']=='busy'){
					$pirmoUzsakymoLaikoMatomumas='hidden';
					switch($row['laikas_start2']){
						case 3600:
						$antroUzsakymoLaikoPasirinkimoStat='<h>Miestas</h>';
						$antroUzsakymoLaikoPasirinkimoSpalva='#FF7210';
						$antroUzsakymoLaikoEkranas = "<iframe style='height:60px;' src='frame2_2.php' onload='resizeIframe(this)' scrolling='no' frameborder='no'  ></iframe>";
						break;
						case 7200:
						$antroUzsakymoLaikoPasirinkimoStat='<h>Užmiestis ~2 val.</h>';
						$antroUzsakymoLaikoPasirinkimoSpalva='#FF7210';
						$antroUzsakymoLaikoEkranas = "<iframe  style='height:60px;' src='frame2_2.php' onload='resizeIframe(this)' scrolling='no' frameborder='no'  ></iframe>";
						break;
						case 10800:
						$antroUzsakymoLaikoPasirinkimoStat='<h>Užmiestis ~3 val.</h>';
						$antroUzsakymoLaikoPasirinkimoSpalva='#FF7210';
						$antroUzsakymoLaikoEkranas = "<iframe style='height:60px;' src='frame2_2.php' onload='resizeIframe(this)' scrolling='no' frameborder='no'  ></iframe>";
						break;
					}
					
					
				}else if($row['uzsakymas2']=='free'){
					$antroUzsakymoLaikoMatomumas='visible';
					$antroUzsakymoLaikai="<form method='post' style='margin:2px'><input type='hidden' name='id' value='1' ><input  style='width:120px;background-color:$UzsakymoLaikoSpalva4;visibility:$antroUzsakymoLaikoMatomumas' type='submit' name='uzs2val' value='Miestas'></form><form method='post' style='margin:2px'><input type='hidden' name='id' value='5' ><input  style='width:120px;background-color:$UzsakymoLaikoSpalva5;visibility:$antroUzsakymoLaikoMatomumas' type='submit' name='uzs2val2' value='Užmiestis ~2 val.'></form><form method='post' style='margin:2px'><input type='hidden' name='id' value='5' ><input  style='width:120px;background-color:$UzsakymoLaikoSpalva6;visibility:$antroUzsakymoLaikoMatomumas' type='submit' name='uzs2val3' value='Užmiestis ~3 val.'></form>";
                    
					
				}
				
				echo "<td style='width:300px;background-color:$antroUzsakymoLaikoPasirinkimoSpalva'>";
				//echo $antroUzsakymoLaikoPasirinkimoStat;
				echo $antroUzsakymoLaikai;
				
				echo $antroUzsakymoLaikoEkranas;
				echo "</td>";
		
		
		
		
		
		
				
				
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
		
	
	echo("<meta http-equiv='refresh' content='30'>");
	
	?>
	<script>
    function ConfirmAtsaukti()
    {
      var x = confirm("Ar tikrai norite ATŠAUKTI užsakymą?");
      if (x)
          return true;
      else
        return false;
    }
	</script>
	<script>
    function ConfirmPerduoti()
    {
      var x = confirm("Ar tikrai norite PERDUOTI užsakymą?");
      if (x)
          return true;
      else
        return false;
    }
	</script>



</body>