<?php
//connection a la bases de données
   $conn=mysqli_connect("localhost","root","root","ciceron_base") or die('Bdd introuvable');   
   mysqli_set_charset( $conn, 'utf8' );

?>