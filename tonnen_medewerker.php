<?php
include('database.php');



?>


<!DOCTYPE html>
<html>
<head>
	<title>tonnen</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	
	
	<form>
		<table style="border: 1px solid black">
		<tr>	
			<td >foto</td>
			<td>voornaam</td>
			<td>tussnvoegsl</td>
			<td>achternaam</td>
			<td>email</td>
			<td>teleffon</td>
			<td>function</td>
			<td>wijzigen</td>
			<td>verwijderen</td>
            <td>Overzicht gewerkte</td>


		</tr>
		<?php
	$query=@mysqli_query($con,"select * from account");
	while ($row= @mysqli_fetch_array($query)) { ?>

		<tr>	
			<td ><img style="height: 50px" src="foto/<?php echo $row['foto']; ?>"></td>
			<td><?php echo $row['voornaam']; ?></td>
			<td><?php echo $row[2]; ?></td>
			<td><?php echo $row['achternaam']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['telefoon']; ?></td>
			<td>

		<?php
	$query2=@mysqli_query($con,"select * from account_has_rol where account_idaccount ='".$row['idaccount']."'");
	while ($row2= @mysqli_fetch_array($query2)) { 
$query3=@mysqli_query($con,"select * from rol where idrol  ='".$row2['rol_idrol']."'");
	$row3= @mysqli_fetch_array($query3);
echo $row3['oms']; echo "<br>";
		?>


<?php } ?>
 

			</td>
<td><a href="edit-registerAccount.php?id=<?php echo $row['idaccount']; ?>">wijzigen</a></td>
<td><a href="verwijderen-prifile.php?id=<?php echo $row['idaccount']; ?>">verwijderen</a></td>
<td><a href="Overzicht1.php?id=<?php echo $row['idaccount']; ?>">Overzicht gewerkte</a></td>




		</tr>


		<?php
	}



	?>	
		</table>
	</form>

</body>
</html>