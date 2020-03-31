<?php
include('database.php');

$thisaccount=mysqli_num_rows(@mysqli_query($con,"  select * from evenement where omschrijving=''"));
if($thisaccount==0){
$insert=@mysqli_query($con," insert into evenement   
	(omschrijving,adres)  
	values
	 ('$naam','$adres') ");	
}



$thisaccount=@mysqli_query($con,"  select * from evenement where omschrijving=''");
$thisaccountrow=@mysqli_fetch_array($thisaccount);
$idevenement =	$thisaccountrow['idevenement'];








?>


<!DOCTYPE html>
<html>
<head>
	<title>home page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript">
		
		$(function(){

	$('.aantal').on('keyup',function(){
var rol_idrol=$(this).data('id');
var tttt=$("#tttt"+rol_idrol).val();
var idevenement ='<?php echo $idevenement; ?>';
$.post('insert.php',{rol_idrol:rol_idrol,tttt:tttt,idevenement:idevenement},function(mydata){
	
});


	})		
		})
	</script>






</head>
<body>
	<div style="width: 860px; height: 780px;" class="continer">
		<div style="width: 98%;" class="menu">
			<ul>
				<li><a href="#">home</a></li>
				<li><a href="#">accounts</a></li>
				<li><a href="#">evenementen</a></li>
				<li><a href="#">contact</a></li>
			</ul>
		</div>
		<div style="width:98%;height: 480px; margin: auto; margin-bottom:5px;  ">
			<form method="post">
				<table style="width: 80% ; margin: auto; ">
				<tr>
					<td colspan="2" style="width:30%;height:40px;  ">Evenement toevoegen / wijzigen
					
					</td>
				</tr>
				<tr>
					<td style="width:30%;height:35px;  ">Datum:</td>
					<td><input type="text" name="datum" required></td>
				</tr>
				<tr>
					<td style="width:30%;height:35px;  ">Naam evenement:</td>
					<td><input type="text" name="naam" required></td>
				</tr>
				<tr>
					<td style="width:30%;height:35px;  ">Locatie</td>
					<td><input type="text" name="adres" required></td>
				</tr>
				
				<tr>
					<td style="width:30%;height:90px;  ">functies</td>
										<td>
											<table  cellpadding="0" cellspacing="0" >
										


											
				<?php
				$allrols=@mysqli_query($con," select * from rol");
				while($allrolsrow=@mysqli_fetch_array($allrols)){

				?>
						<tr>
			<td style="padding: 5px; min-width: 100px;border: 0 !important" >

<?php echo $allrolsrow['oms']; ?>
				
					



				</td>
             <td style="border: 0 !important;" > 

      <input data-id="<?php echo $allrolsrow['idrol']; ?>" id="tttt<?php echo $allrolsrow['idrol']; ?>"   type="number"  class='aantal' style="width: 80px; text-align: center">
         </td>
			</tr>
				 
				<?php } ?>

</table>
					
					</td>	
					</tr>

					
					</td>	
				</tr>
					
				</tr>
				<tr>
					
					<td colspan="2"><input type="submit" name="submit">
						<input type="hidden" name="id" value="<?php echo $idevenement;?>">
						
					</td>
				</tr>

				</table>
			</form>


<?php
if(isset($_POST['submit'])){



$datumw=$_POST['datum'];
$naam=$_POST['naam'];
$adres=$_POST['adres'];
$id=$_POST['id'];


$insert=@mysqli_query($con," update  evenement   set
	omschrijving='$naam',
	adres ='$adres' where idevenement ='$id'
	");	

@mysqli_query($con," insert into  presentie   
	(evenement_idevenement,datum,account_idaccount,begintijd)  
	values
	 ('$id','$datumw','1','12:12:10') ");	


?>
<meta http-equiv="refresh" content="1;url=Evenement_toevoegen_wijzigen.php">
<?php
}

?>
	




</body>
</html>