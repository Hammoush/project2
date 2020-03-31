<?php
	include"database.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>wijzigen</title>
	
	</head>
	
	<body>
					
						<h3 > verwijderen function</h3><br>
						
		<?php
			if (isset($_POST['submit']))
{
				$idrol=$_POST['id'];
				$omschrijven=$_POST['om'];
				
				

					$sql="delete from rol  where idrol='$idrol'  ";
					$query=mysqli_query($con,$sql);
					if ($query) { echo "youhave done: ";}
					else{echo "you con not delete ";}
						
			
}
?>
					<form method="post">
					     <label> id function</label><br>
					     <input type="text" name="id" required class="input">
					     <br><br>
					     <label>omschrijving</label><br>
					     <input type="text" name="om" >
					     <br><br>
					     
					     <button type="submit" name="submit">verwijderen</button> 
					</form>
				
				
				</div>
				<br>
				
				
				
			</div>
	
	</body>
</html>