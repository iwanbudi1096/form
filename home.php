<?php 
session_start();
 if (!isset($_SESSION['login'])){
   header ("location: login.php");
   exit;
 }
?>



<center><br><br><br><br><br><br><br><br>
<img src="assets/images/1.jpg" width="200px height="200px" /> <br>
<font Size="6" face="Helvetica">Form Pekerjaan Team Teknis</font> <br>
<font Size="6">Datautama Semarang</font>
</center>
