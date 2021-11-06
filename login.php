<?php
    
    session_start();

    require 'connection.php';

    if (!empty($_POST['email']) && !empty($_POST['pw'])) {
        $records = $conn->prepare('SELECT id, email, pw FROM usuarios WHERE email = :email');
        $records->bindParam(':email', $_POST['email']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $message = '';

        if (count($results) > 0 && (md5($_POST['pw'])== $results['pw'])) {
        $_SESSION['user_id'] = $results['id'];
        header("Location: /phplogin");
        } else {
        $message = 'Correo o Contraseña Incorrectos';
        }
  }

    
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

                    <?php if(!empty($message)): ?>
                        <p> <?= $message ?></p>
                    <?php endif; ?>

			 		<h2>Login</h2>
			 		<form method="post" action="login.php">
                        <div class="inputBox">
                            <input type="text" name="email" placeholder="Email"></br>
                        </div>
                        <div class="inputBox">
                            <input type="password" name="pw" placeholder="Password"></br>
                        </div>
                        <div class="inputBox">
                            <input type="submit" value="Login">
                        </div>

                       <p><a href="signup.php">¿No tienes cuenta? Registrate</a> </p> 
                       <p> <a href="Logout.php">Logout</a> </p>
                        
                    </form>

			 	</div>
			 </div>
		</div>
	</section>
</body>
</html>

