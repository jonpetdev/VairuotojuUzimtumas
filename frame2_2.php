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

.uzsakymas2{
	padding:0px;
	text-align:center;

}


</style> 

<body>

<?php

	$time= time();
	
	$result = $conn->query( "SELECT * FROM vairuotojai_uzim WHERE id = '1'") or die(mysqli_error());
		
		echo "<div>";
		
		while($row=mysqli_fetch_array($result)){
		
			if($row['darbas']=='dirba'){
			
				
				?>
				<script>
   
    var countDownDate = <?php echo $row['laikas2'] ?> * 1000;
    var now = <?php echo time ()?> *1000;
	

    var x = setInterval(function() {

        now = now + 1000;

        var distance = countDownDate - now;

        var days = Math.floor(distance /  (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("demo2").innerHTML =hours+ "h "+ minutes + "m " + seconds + "s ";

        if (distance < 0) {
            clearInterval(x);
			document.getElementById("demo2").innerHTML="baigta";
			//var res = "baigta";
			//var button = document.getElementById('uzs1b');
			//button.form.submit();
			
			
        }
    }, 1000);
    </script>
				
		<?php
				$countas2= $row['countas2'];	
		
			if($row['laikas2'] < $time and $countas2=='1'){
				$vienas=$conn->query("UPDATE vairuotojai_uzim SET laikas2 = '' WHERE id='1'");
				$du=$conn->query("UPDATE vairuotojai_uzim SET uzsakymas2 = 'free' WHERE id='1'");
				$trys=$conn->query("UPDATE vairuotojai_uzim SET countas2 = '3' WHERE id='1'");
				$keturi=$conn->query("UPDATE vairuotojai_uzim SET uzsk_statusas2 = 'Pradeti vykdyti' WHERE id='$_POST[id]'")or die(mysql_error());
				echo "<meta http-equiv='refresh' content='0'>";
				
			}else if(row['laikas2'] > $time){				
				
			}
				
				if($row['uzsakymas2']=='free'){
					echo "<div class='uzsakymas2' style='background-color:#66FF7E;'><img src='http://localhost:8888/varuotojai/free.png' height='60px'></div>";
				}else if($row['uzsakymas2']=='busy'){
					if($row['uzsk_statusas2']=='Pradeti vykdyti'){
						echo "<div class='uzsakymas2' style='background-color:#FF4949;'><img src='http://localhost:8888/varuotojai/busy.png' height='60px'><p style='display:inline;font-size:30px' id='demo2'>.</p>";
						echo "</div>";
					}else if($row['uzsk_statusas2']=='Uzsakymas vykdomas'){
						echo "<div class='uzsakymas2' style='background-color:#FFCF0A;'><img src='http://localhost:8888/varuotojai/busy.png' height='60px'><p style='display:inline;font-size:30px' id='demo2'>.</p>";
						echo "</div>";
					}
				}
			}
		}
	
	
		echo "</div>";
	
	echo("<meta http-equiv='refresh' content='10'>");
	
	?>


</body>