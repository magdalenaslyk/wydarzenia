<?php
  session_start();
  
  if (isset($_SESSION['log'])==true) 
  {
	unset($_SESSION['log']);
	header('location: index.php');
	}
?>