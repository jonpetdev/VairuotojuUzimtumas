<?php
require('dbconnect.php');
?>
      
<style>
body{
	margin:0px;
	padding:0px;
	width:100%;
	height:60px;
}

.uzsakymas1{
	padding:0px;
	text-align:center;
}


</style> 

<body>

<?php

	$time= time();
	
	$result = $conn->query( "SELECT * FROM vairuotojai_uzim WHERE id = '6'") or die(mysql_error());
		
		echo "<div>";
		
		while($row=mysqli_fetch_array($result)){
		
			if($row['darbas']=='dirba'){
			
				
				?>
				<script>
   
    var countDownDate = <?php echo $row['laikas'] ?> * 1000;
    var now = <?php echo time ()?> *1000;
	

    var x = setInterval(function() {

        now = now + 1000;

        var distance = countDownDate - now;

        var days = Math.floor(distance /  (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("demo").innerHTML =hours+ "h "+ minutes + "m " + seconds + "s ";

        if (distance < 0) {
            clearInterval(x);
			document.getElementById("demo").innerHTML="baigta";
			//var res = "baigta";
			//var button = document.getElementById('uzs1b');
			//button.form.submit();
			
			
        }
    }, 1000);
    </script>
				
		<?php
				$countas= $row['countas'];	
		
			if($row['laikas'] < $time and $countas=='1'){
				$vienas=$conn->query("UPDATE vairuotojai_uzim SET laikas = '' WHERE id='6'");
				$du=$conn->query("UPDATE vairuotojai_uzim SET uzsakymas1 = 'free' WHERE id='6'");
				$trys=$conn->query("UPDATE vairuotojai_uzim SET countas = '3' WHERE id='6'");
				$keturi=$conn->query("UPDATE vairuotojai_uzim SET uzsk_statusas = 'Pradeti vykdyti' WHERE id='$_POST[id]'")or die(mysql_error());
				echo "<meta http-equiv='refresh' content='0'>";
				
			}else if(row['laikas'] > $time){				
				
			}
				
				if($row['uzsakymas1']=='free'){
					echo "<div class='uzsakymas1' style='background-color:#66FF7E;'><img src='http://localhost:8888/varuotojai/free.png' height='60px'></div>";
				}else if($row['uzsakymas1']=='busy'){
					if($row['uzsk_statusas']=='Pradeti vykdyti'){
						echo "<div class='uzsakymas1' style='background-color:#FF4949;'><img src='http://localhost:8888/varuotojai/busy.png' height='60px'><p style='display:inline;font-size:30px' id='demo'>.</p>";
						echo "</div>";
					}else if($row['uzsk_statusas']=='Uzsakymas vykdomas'){
						echo "<div class='uzsakymas1' style='background-color:#FFCF0A;'><img src='http://localhost:8888/varuotojai/busy.png' height='60px'><p style='display:inline;font-size:30px' id='demo'>.</p>";
						echo "</div>";
					}
				}
			}
		}
	
	
		echo "</div>";
	
	echo("<meta http-equiv='refresh' content='10'>");
	
	?>


</body>