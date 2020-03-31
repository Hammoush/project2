<?php
	include"database.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>wijzigen</title>
	
	</head>
	
	<body>
					
						<h3 > wijzigen function</h3><br>
						
		<?php
			if (isset($_POST['submit']))
{
				$idrol=$_POST['id'];
				$omschrijven=$_POST['om'];
				
				

					$qyery="UPDATE  rol  set oms='$omschrijven' where idrol ='$idrol'";
					if (mysqli_query($con,$qyery)) { echo "your update is success";}
					else{ echo "your update is not  success";}
						
			
}
?>
					<form method="post">
					     <label> id function</label><br>
					     <input type="text" name="id" required class="input">
					     <br><br>
					     <label>omschrijving</label><br>
					     <input type="text" name="om" >
					     <br><br>
					     
					     <button type="submit" name="submit">wijzigen</button> 
					</form>
				
				
				</div>
				<br>
				
				
				
			</div>
	
	</body>
</html>