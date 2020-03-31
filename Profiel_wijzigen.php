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
	<div style="width: 860px; height: 750px" class="continer">
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
						<img style="height: 100px " src="dj1.png"><br>
						<input type="file" name="file">

					</td>
				</tr>
				<tr>
					<td style="width:30%;height:35px;  ">voornaam</td>
					<td><input type="text" name="voornaam" required></td>
				</tr>
				<tr>
					<td style="width:30%;height:35px;  ">achternaam</td>
					<td><input type="text" name="achternaam" required></td>
				</tr>
				<tr>
					<td style="width:30%;height:35px;  ">Email</td>
					<td><input type="email" name="email" required></td>
				</tr>
				<tr>
					<td style="width:30%;height:35px;  ">Telefoon</td>
					<td><input type="number" name="tele" required></td>
				</tr>
				<tr>
					<td style="width:30%;height:90px;  ">functies</td>
					<td>
<?php
$allrols=@mysqli_query($con," select * from rol");
while($allrolsrow=@mysqli_fetch_array($allrols)){

?>
<input type="checkbox" name="fun[]" value="<?php echo $allrolsrow['idrol'];?>"><?php echo $allrolsrow['oms']; ?><br>
<?php } ?>


					
					</td>	
				</tr>
				<tr>
					
					<td colspan="2"><input type="submit" name="submit">
						if you have accont you can here <a href="login.php">login</a>
					</td>
				</tr>

				</table>
			</form>


<?php
if(isset($_POST['submit'])){
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


$insert=@mysqli_query($con," insert into account   
	(voornaam,achternaam,email,telefoon,foto)  
	values
	 ('$voornaam','$achternaam','$email','$tele','$foto') ");

if(isset($insert)){
$thisaccount=@mysqli_query($con,"  select * from account where email='$email' and telefoon='$tele' order by idaccount DESC LIMIT 1 ");

$thisaccountrow=@mysqli_fetch_array($thisaccount);
$account_idaccount=	$thisaccountrow['idaccount'];


foreach ($_POST['fun'] as $fun ) {

@mysqli_query($con," insert into  account_has_rol   
	(account_idaccount,rol_idrol)  
	values
	 ('$account_idaccount','$fun') ");

	
}

}







}

?>
		

</body>
</html>