<?php

include('database.php');


$rol_idrol=$_POST['rol_idrol'];	
$aantal=$_POST['tttt'];
$idevenement=$_POST['idevenement'];


$numu=@mysqli_num_rows(@mysqli_query($con," select * from  benodigd_personeel_evenement  where 
 rol_idrol='$rol_idrol' and evenement_idevenement ='$idevenement'"));
if($numu==0){
@mysqli_query($con," insert into  benodigd_personeel_evenement   
	(rol_idrol,aantal,evenement_idevenement)  
	values
	 ('$rol_idrol','$aantal','$idevenement') ");
}else{
@mysqli_query($con," update   benodigd_personeel_evenement set 
	aantal='$aantal' where  rol_idrol='$rol_idrol' and evenement_idevenement ='$idevenement'  
	 ");
}





?>