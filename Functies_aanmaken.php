<?php
include('database.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>toevoegen function</title>
	
	</head>
	
	<body>
		<?php
		if (isset($_POST['submit'])) 
		{
			$idrol=$_POST['idrol'];
			$oms=$_POST['oms'];
				
					$insert=@mysqli_query($con,"INSERT INTO   rol (idrol,oms) VALUES ('$idrol','$oms') ");
					if($insert){echo "<div >Insert Success..</div>";}
					else{echo "<div >Insert Failed..</div>";}
						
		}
				
			
						

		?>
			
						<h3 > Add Function</h3><br>
				

					<form method="post" >
					     <label>id function</label><br>
					     <input type="text" name="idrol"  >
					     <br><br>
					     <label>omschrijving</label><br>
					     <input type="text" name="oms"  >
					     <br><br>
					    
					     <input  type="submit"  name="submit" value="verzenden"></button>
					</form>
				
				
				</div>
				<br>
				
				
				
			</div>
	
	</body>
</html>