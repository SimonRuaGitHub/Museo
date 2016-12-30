<?php session_start(); ?>
<?php if(isset($_SESSION['user_name'])) { ?>  
<!DOCTYPE>
<html>
<head>
       <title>Restauracion</title>
</head>
<body>
       <a href= 'CerrarSesion.php'> <?php print $_SESSION['user_name'].' '; ?>  ¿desea cerrar cesion?</a>	
<body>
</html>
<?php                                   } ?>