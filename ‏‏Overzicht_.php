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
			
				<table style="width: 80% ; margin: auto;" border="1" cellspacing="0" cellpadding="0">
				<tr>
					<td style="padding: 5px" valign="top"><?php echo $row['voornaam']; ?></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
	

<?php
$allrols=@mysqli_query($con," select * from presentie where account_idaccount ='".$_GET['id']."'");
while($allrolsrow=@mysqli_fetch_array($allrols)){
$selthisrolrow=@mysqli_fetch_array(mysqli_query($con," select * from evenement where idevenement  ='".$allrolsrow['evenement_idevenement']."'    "));

?>
			<tr>
	<td style="padding: 5px"><?php echo $allrolsrow['datum']; ?></td>
	<td style="padding: 5px"><?php echo $allrolsrow['begintijd']; ?> - <?php echo $allrolsrow['eindtijd']; ?></td>
<td style="padding: 5px">
	
<?php
$begintijd=strtotime($allrolsrow['begintijd']);
$eindtijd=strtotime($allrolsrow['eindtijd']);
$hour=abs(($eindtijd-$begintijd)/(3600*60/60));
mysqli_query($con," update  presentie set totaal='$hour' where begintijd ='".$allrolsrow['begintijd']."' and eindtijd ='".$allrolsrow['eindtijd']."' AND  account_idaccount ='".$_GET['id']."'   ");
echo $hour;

  ?>



</td>
					<td style="padding: 5px"><?php echo $selthisrolrow['omschrijving']; ?></td>
				</tr>


<?php } ?>


	<tr>
					<td style="padding: 5px" valign="top"></td>
					<td style="padding: 5px">Totaal aantal uur</td>
					<td style="padding: 5px">
						
<?php
$selhors=mysqli_query($con,"  select SUM(totaal) FROM presentie where account_idaccount  ='".$_GET['id']."'  ");
while($selhorsrow=mysqli_fetch_array($selhors)){
$selhorstotal=$selhorsrow['SUM(totaal)'];	
}


echo $selhorstotal;

?>


					</td>
					<td></td>
				</tr>



				</table>
		



		

</body>
</html>