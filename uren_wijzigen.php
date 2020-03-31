<?php
include('database.php');

?>


<!DOCTYPE html>
<html>
<head>
	<title>home page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="continer">
		<div class="menu">
			<ul>
				<li><a href="#">home</a></li>
				<li><a href="register.php">accounts</a></li>
				<li><a href="#">evenementen</a></li>
				<li><a href="#">contact</a></li>
			</ul>
		</div>
		<div style="width:98%;height: 480px; margin: auto; margin-bottom:5px;  ">
			
				<table style="width: 80% ; margin: auto;" border="1" cellspacing="0" cellpadding="0">
				<tr>
					
					<td>account_idaccount</td>
					<td> evenement_idevenement</td>
					<td>datum </td>
					<td>begintijd</td>
					<td>eindtijd</td>

				</tr>

				<?php
					$r= mysqli_query($con, "SELECT * from presentie");


					 while ($row= mysqli_fetch_array($r)) {
                   		echo "<tr>";
		                      echo "<td>. $row[0]</td>";
		                      echo "<td >. $row[1]</td>";
		                      echo "<td >. $row[2]</td>";
		                       echo "<td>. $row[3]</td>";
		                      echo "<td >. $row[4]</td>";
		                     
                      	echo "<tr>";

                   
                 } 





				?>

		</div>



				<?php
if(isset($_POST["submit"])){
//$id=$_POST['id'];
//$id1=$_POST['id1'];
$datum=$_POST['datum'];
$begintijd=$_POST['begintijd'];
$eindtijd=$_POST['eindtijd'];



				$qyery="UPDATE  presentie  set begintijd='$begintijd',eindtijd='$eindtijd' where datum='$datum'";
					if (mysqli_query($con,$qyery)) { echo "your update is success";}
					else{ echo "your update is not  success";}
						}
			
						
?>		
					
						<h3 > wijzigen verbinden met datum</h3>
				

					<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					    
					     <label>datum</label><br><br>
					     <input type="text" name="datum" required class="input"><br>
					     <label>begintijd</label><br><br>
					     <input type="time" name="begintijd" required class="input">
					     <br><br>
					     <label>eindtijd</label><br><br>
					     <input type="time" name="eindtijd" required class="input">
					     <br><br>
					     <button type="submit"  name="submit">wijzigen uren</button>
					</form>
				
				
				</div>
				<br>
				
				
				
			</div>





















</body>
</html>