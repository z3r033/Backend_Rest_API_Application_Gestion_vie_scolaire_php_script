<?php
 
 //verifier si la connection est passer avec la Base de donner 
   require_once('ConnectionToData.php');
   
//prendre id dans Android.
   $id = $_GET['id_etu'];
   
   //requite pour supprumer.
   $requite = "DELETE FROM etudiant WHERE id_etu = $id";
   
   // verifier s'il existe erreur ou pas  pour la connection par DB et la requite 
   if(mysqli_query($con,$requite)){
	   //si non
   echo "le personne est supprimer! ";
   }else{  // si oui
   echo "c'est pas supprimer essayer autre fois! ";
   }
   // fermer la connection.
   mysqli_close($con);
?>