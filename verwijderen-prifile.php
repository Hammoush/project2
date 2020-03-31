<?php
include('database.php');

if(isset($_GET['id'])){
$query=@mysqli_query($con,"select * from account where idaccount ='".$_GET['id']."'");
$row= @mysqli_fetch_array($query); 	
}else{ ?>
<meta http-equiv="refresh" content="0;url=tonnen_medewerker.php">

<?php
}

?>



<!DOCTYPE html>
<html>
<head>
	<title>home page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div style="width: 860px;" class="continer">
		<div style="width: 98%;" class="menu">
			<ul>
				<li><a href="#">home</a></li>
				<li><a href="#">accounts</a></li>
				<li><a href="#">evenementen</a></li>
				<li><a href="#">contact</a></li>
			</ul>
		</div>
		<div style="width:98%;height: 480px; margin: auto; margin-bottom:5px;  ">
			<form  action="" method="post" enctype="multipart/form-data">
				<table style="width: 80% ; margin: auto;">
				<tr>
					<td style="width:30%;height:90px;  ">Account</td>
					<td>
						<img style="height: 100px " src="foto/<?php echo $row['foto']; ?>"><br>
						

					</td>
				</tr>
				<tr>
					<td style="width:30%;height:35px;  ">voornaam</td>
					<td><?php echo $row['voornaam']; ?></td>
				</tr>
				<tr>
					<td style="width:30%;height:35px;  ">achternaam</td>
					<td><?php echo $row['achternaam']; ?></td>
				</tr>
				<tr>
					<td style="width:30%;height:35px;  ">Email</td>
					<td><?php echo $row['email']; ?></td>
				</tr>
				<tr>
					<td style="width:30%;height:35px;  ">Telefoon</td>
					<td><?php echo $row['telefoon']; ?></td>
				</tr>
				<tr>
					<td style="width:30%;height:90px;  ">functies</td>
					<td>
<?php
$allrols=@mysqli_query($con," select * from rol");
while($allrolsrow=@mysqli_fetch_array($allrols)){
$selthisrolnum=@mysqli_num_rows(mysqli_query($con," select * from account_has_rol where rol_idrol ='".$allrolsrow['idrol']."'  and account_idaccount ='".$_GET['id']."'  "));

?>
<?php echo $allrolsrow['oms']; ?><br>
<?php } ?>


					
					</td>	
				</tr>
				<tr>
					
					<td colspan="2">
						<input type="submit" name="submit" value="verwijderen">
						<input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
						if you have accont you can here <a href="login.php">login</a>
					</td>
				</tr>

				</table>
			</form>


<?php
if(isset($_POST['submit'])){
$id=$_POST['id'];
$thisaccount=@mysqli_query($con,"  delete  from account_has_rol where account_idaccount  ='$id' ");
$thisaccount=@mysqli_query($con,"  delete  from account where idaccount ='$id' ");
if(isset($thisaccount)){
?>
<div>jij heeft gewijwijrd</div>
<meta http-equiv="refresh" content="2;url=tonnen_medewerker.php">


<?php
}
}

?>
		

</body>
</html>