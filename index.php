<?php

  session_start();

  require 'connection.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT nombre,apellido,email,pw FROM usuarios WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrate</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<section>
		<div class="color"></div>
		<div class="color"></div>
		<div class="color"></div>
		<div class="box">
			<div class="square" style="--i:0;"></div>
			<div class="square" style="--i:1;"></div>
			<div class="square" style="--i:2;"></div>
			<div class="square" style="--i:3;"></div>
			<div class="square" style="--i:4;"></div>
			 <div class="container">

			 	<div class="form">
                    <a href="login.php">Login</a>
                    <a href="signup.php">Sign Up</a>
                    <a href="logout.php">Logout</a>
                    <br>
                    <?php if(!empty($user)): ?>
                    <br> <h2>Bienvenid@ </h2>
                    <h2>
                    <?= $user['nombre']; ?>
                    <?= $user['apellido']; ?>
                    <?php else: ?>
                        <h2>Please Login or SignUp</h2>
                    <?php endif; ?>

			 	</div>
			 </div>
		</div>
	</section>
    
</body>
</html>