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
.busena{
	width:15%;
	margin-right:20px;
	border:2px solid ;
	border-radius:10px;
	padding:0px;
	text-align:center;
	
	
}
.vairuotojas{
	width:20%;
	margin-right:20px;
	border:2px solid ;
	border-radius:10px;
	display: inline-block;
	text-align:center;
	height:60px;
	font-size:40px;
	
	
}
.uzsakymas1{
	width:90%;
	height:60px;
	border-radius:10px;
	border:2px solid;
}
.uzsakymas2{
	width:90%;
	height:60px;
	border-radius:10px;
	border:2px solid;
}
.adresas{
	width:15%;
	margin-right:20px;
	border-radius:10px;
	border:2px solid;
	padding:20px;
	
}
.uz_sk{
	width:4%;
	margin-right:20px;
	border-radius:10px;
	border:2px solid;
	padding:6px;
	text-align:center;
	font-size:40px;
	background-color:#FF4949;
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
<script>
  function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
  }
  

  
	</script>
<body>

<?php

	$time= time();
	
	$result = $conn->query( "SELECT * FROM vairuotojai_uzim WHERE id = '7'") or die(mysql_error());
		
		echo "<div>";
		
		while($row=mysqli_fetch_array($result)){
		
			if($row['darbas']=='dirba'){
				echo "<div class='navas'>";
				echo "<div class='busena' style='background-color:#66FF7E;'><img  src='http://localhost:8888/varuotojai/dirba.png' height='60px'></div>";
				if($row['aktyvus']=='vair'){
					echo "<div class='vairuotojas' style='background-color:#FFEEB0;'>".$row['vairuotojas']."</div>";
				}else if($row['aktyvus']=='mech'){
					echo "<div class='vairuotojas' style='background-color:#82ADFF;'>".$row['vairuotojas']."</div>";
				}
				
				
				
				
					echo "<div ><iframe class='uzsakymas1' src='frame6.php' onload='resizeIframe(this)' scrolling='no' frameborder='no'  > </iframe></div>";
					echo "<div ><iframe class='uzsakymas2' src='frame6_2.php' onload='resizeIframe(this)' scrolling='no' frameborder='no'  > </iframe></div>";
	
	

				
				echo "<div class='adresas' style=''>".$row['adresas']."</div>";
				
				echo "<div class='uz_sk'>".$row['uzsakymu_sk_d']."</div>";
				
				echo "</div>";
			}
			
		

			
		}
	
	
		echo "</div>";
	
	echo("<meta http-equiv='refresh' content='10'>");
	
	?>


</body>