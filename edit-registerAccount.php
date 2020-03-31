<?php
include('database.php');
if(isset($_GET['id'])){
$query=@mysqli_query($con,"select * from account where idaccount ='".$_GET['id']."'");
$row= @mysqli_fetch_array($query); 	
}else{
$query=@mysqli_query($con,"select * from account where idaccount ='1'");
$row= @mysqli_fetch_array($query); 	
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
					<td style="width:30%;height:90px;  " valign="top">Account</td>
					<td>
						<img style="height: 100px " src="foto/<?php echo $row['foto']; ?>"><br>
						<input type="file" name="file">

					</td>
				</tr>
				<tr>
					<td style="width:30%;height:35px;  " valign="top">voornaam</td>
					<td><input type="text" name="voornaam" value="<?php echo $row['voornaam']; ?>" required></td>
				</tr>
				<tr>
					<td style="width:30%;height:35px;  " valign="top">achternaam</td>
					<td><input type="text" name="achternaam" value="<?php echo $row['achternaam']; ?>" required></td>
				</tr>
				<tr>
					<td style="width:30%;height:35px;  " valign="top">Email</td>
					<td><input type="email" name="email" value="<?php echo $row['email']; ?>" required></td>
				</tr>
				<tr>
					<td style="width:30%;height:35px;  " valign="top">Telefoon</td>
					<td><input type="number" name="tele" value="<?php echo $row['telefoon']; ?>" required></td>
				</tr>
				<tr>
					<td style="width:30%;height:90px;  " valign="top">functies</td>
					<td>
<?php
$allrols=@mysqli_query($con," select * from rol");
while($allrolsrow=@mysqli_fetch_array($allrols)){
$selthisrolnum=@mysqli_num_rows(mysqli_query($con," select * from account_has_rol where rol_idrol ='".$allrolsrow['idrol']."'  and account_idaccount ='".$_GET['id']."'  "));

?>
<input type="checkbox" name="fun[]" value="<?php echo $allrolsrow['idrol'];?>" <?php  if($selthisrolnum!=0){echo'checked'; }    ?> ><?php echo $allrolsrow['oms']; ?><br>
<?php } ?>


					
					</td>	
				</tr>
				<tr>
					
					<td colspan="2">
						<input type="submit" name="submit">
						<input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
						if you have accont you can here <a href="login.php">login</a>
					</td>
				</tr>

				</table>
			</form>


<?php
if(isset($_POST['submit'])){
$id=$_POST['id'];
$dir='foto';
$fileName = $_FILES["file"]["name"]; // The file name
$fileTmpLoc = $_FILES["file"]["tmp_name"]; // File in the PHP tmp folder

$kaboom = explode(".", $fileName); // Split file name into an array using the dot
$fileExt = end($kaboom); // Now target the last array element to get the file extension
$file = basename($fileName,'.'.$fileExt.'');

$x=md5(time());
$moveResult = move_uploaded_file($fileTmpLoc, "$dir/$x.$fileExt");
$foto = "$x.$fileExt";


$voornaam=$_POST['voornaam'];
$achternaam=$_POST['achternaam'];
$email=$_POST['email'];
$tele=$_POST['tele'];

if($fileExt){
$insert=@mysqli_query($con," update  account set  
	voornaam='$voornaam',
	achternaam='$achternaam',
	email='$email',
	telefoon='$tele',
	foto='$foto' where idaccount ='$id'
	 ");	
}else{
	$insert=@mysqli_query($con," update  account set  
	voornaam='$voornaam',
	achternaam='$achternaam',
	email='$email',
	telefoon='$tele' where idaccount ='$id'
	 ");
}


if(isset($insert)){
$thisaccount=@mysqli_query($con,"  delete  from account_has_rol where account_idaccount='$id' ");


foreach ($_POST['fun'] as $fun ) {

@mysqli_query($con," insert into  account_has_rol   
	(account_idaccount,rol_idrol)  
	values
	 ('$id','$fun') ");

	
}

}
?>
<div>jij hebt gewijzegd</div>
<meta http-equiv="refresh" content="2;url=edit-registerAccount.php?id=<?php echo $_GET['id'];?>">


<?php

}

?>
		

</body>
</html>